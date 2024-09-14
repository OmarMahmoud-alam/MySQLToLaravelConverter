
<?php

class RefinedMigrationGenerator
{
    public static function refineColumnDefinition($columnDef)
    {
        $refined = '';
        
        // Extract method and parameters
        if (preg_match('/\$table->(\w+)\(\'(\w+)\'(?:,\s*(.*))?\)(.*)/', $columnDef, $matches)) {
            $method = $matches[1];
            $columnName = $matches[2];
            $parameters = isset($matches[3]) ? $matches[3] : '';
            $modifiers = isset($matches[4]) ? $matches[4] : '';
            
            // Refine method
            switch ($method) {
                case 'integer':
                case 'bigInteger':
                    $refined = "\$table->{$method}('{$columnName}')";
                    break;
                case 'string':
                    $refined = "\$table->string('{$columnName}')";
                    break;
                default:
                    $refined = "\$table->{$method}('{$columnName}'{$parameters})";
            }
            
            // Add modifiers
            if (strpos($modifiers, '->unsigned()') !== false) {
                $refined .= '->unsigned()';
            }
            if (strpos($modifiers, '->nullable()') !== false) {
                $refined .= '->nullable()';
            }
            if (strpos($modifiers, '->autoIncrement()') !== false) {
                $refined .= '->autoIncrement()';
            }
            
            // Add default if present
            if (preg_match('/->default\((.*?)\)/', $modifiers, $defaultMatch)) {
                $refined .= "->default({$defaultMatch[1]})";
            }
        } else {
            // If the pattern doesn't match, return the original definition
            return $columnDef;
        }
        
        return $refined . ';';
    }

    public static function refineMigrationContent($content)
    {
        $lines = explode("\n", $content);
        $refinedLines = [];
        $inSchemaCreate = false;

        foreach ($lines as $line) {
            if (strpos($line, 'Schema::create') !== false) {
                $inSchemaCreate = true;
                $refinedLines[] = $line;
            } elseif (strpos($line, '});') !== false && $inSchemaCreate) {
                $inSchemaCreate = false;
                $refinedLines[] = $line;
            } elseif ($inSchemaCreate && strpos($line, '$table->') !== false) {
                $refinedLines[] = '            ' . self::refineColumnDefinition(trim($line));
            } else {
                $refinedLines[] = $line;
            }
        }

        return implode("\n", $refinedLines);
    }
}?>
<?php

class MySQLToLaravelConverter
{
    private $dumpFile;
    private $outputDir;
    private $logFile;

    public function __construct($dumpFile, $outputDir)
    {
        $this->dumpFile = $dumpFile;
        $this->outputDir = $outputDir;
        $this->logFile = $outputDir . '/conversion_log.txt';
    }

    private function log($message)
    {
        file_put_contents($this->logFile, date('[Y-m-d H:i:s] ') . $message . PHP_EOL, FILE_APPEND);
    }

    private function parseAlterStatements($sql)
{
   
        $alterStatements = [];
        $pattern = '/ALTER TABLE `(\w+)`\s+(.+?);/s';
        preg_match_all($pattern, $sql, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $tableName = $match[1];
            $alterations = $match[2];

            if (!isset($alterStatements[$tableName])) {
                $alterStatements[$tableName] = [
                    'primary' => [],
                    'unique' => [],
                    'index' => [],
                    'foreign' => [],
                    'autoincrement' => []  // Add this line
                ];
            }

            // ... (existing code for PRIMARY KEY, UNIQUE keys, and regular indexes)

            // Parse AUTO_INCREMENT
            $autoIncrementPattern = '/MODIFY `(\w+)` (\w+\(\d+\))? ?(UNSIGNED)? ?NOT NULL AUTO_INCREMENT/i';
            if (preg_match($autoIncrementPattern, $alterations, $aiMatch)) {
                $alterStatements[$tableName]['autoincrement'][] = $aiMatch[1];
            }

        // Parse PRIMARY KEY
        if (preg_match('/ADD PRIMARY KEY \(`(.+?)`\)/', $alterations, $pkMatch)) {
            $alterStatements[$tableName]['primary'] = explode('`,`', $pkMatch[1]);
        }

        // Parse UNIQUE keys
        preg_match_all('/ADD UNIQUE KEY `\w+` \(`(.+?)`\)/', $alterations, $uniqueMatches);
        foreach ($uniqueMatches[1] as $uniqueKey) {
            $alterStatements[$tableName]['unique'][] = explode('`,`', $uniqueKey);
        }
     
        // Parse regular indexes
        preg_match_all('/ADD KEY `\w+` \(`(.+?)`\)/', $alterations, $indexMatches);
        foreach ($indexMatches[1] as $index) {
            $alterStatements[$tableName]['index'][] = explode('`,`', $index);
        }

        // Parse FOREIGN KEYs
        preg_match_all('/ADD CONSTRAINT `\w+` FOREIGN KEY \(`(.+?)`\) REFERENCES `(\w+)` \(`(.+?)`\)(?: ON DELETE (CASCADE|SET NULL|RESTRICT))?/', $alterations, $fkMatches, PREG_SET_ORDER);
        foreach ($fkMatches as $fkMatch) {
            $alterStatements[$tableName]['foreign'][] = [
                'column' => $fkMatch[1],
                'referenced_table' => $fkMatch[2],
                'referenced_column' => $fkMatch[3],
                'on_delete' => $fkMatch[4] ?? 'NO ACTION' // Handle ON DELETE clause
            ];
        }
    }

    return $alterStatements;
}
    public function convert()
    {
        $this->log("Starting conversion process");
        $sql = file_get_contents($this->dumpFile);
        $tables = $this->parseTables($sql);
        $alterStatements = $this->parseAlterStatements($sql);

        foreach ($tables as $tableName => $tableData) {
           if (isset($alterStatements[$tableName])) {
                $tableData['indexes'] = array_merge($tableData['indexes'] ?? [], $alterStatements[$tableName]);
            }
           
            $this->createMigration($tableName, $tableData['structure'], $tableData['foreign_keys']??[], $tableData['indexes'] ?? []);
            if (!empty($tableData['data'])) {
                $this->createSeeder($tableName, $tableData['data']);
            } else {
                $this->log("No data found for table '{$tableName}'. Skipping seeder creation.");
            }
        }
        $this->log("Conversion process completed");
    }
    private function parseTables($sql)
    {
        $tables = [];
        $tablePattern = '/CREATE TABLE `(\w+)` \((.*?)\)(?: ENGINE=\w+ DEFAULT CHARSET=\w+ COLLATE=\w+)?;/s';
        $insertPattern = '/INSERT INTO `(\w+)` \((.*?)\) VALUES\s+(.*?);/s';


        // Parse table structures
        preg_match_all($tablePattern, $sql, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $tableName = $match[1];
            $columnsString = $match[2];
            
          //  echo "Parsing table: $tableName\n";
         //   echo "Columns string: $columnsString\n";
            
            $columns = $this->parseColumns($columnsString);
            
        //    echo "Parsed columns: " . print_r($columns, true) . "\n";
            
            if (!empty($columns)) {
                $tables[$tableName]['structure'] = $columns;
                $tables[$tableName]['foreign_keys'] = $this->parseForeignKeys($columnsString);
                $tables[$tableName]['indexes'] = $this->parseIndexes($columnsString);
            } else {
                echo "Warning: No columns parsed for table $tableName\n";
            }
        }
// Parse insert statements
preg_match_all($insertPattern, $sql, $matches, PREG_SET_ORDER);
foreach ($matches as $match) {
    $tableName = $match[1];
    $columns = array_map('trim', explode(',', str_replace('`', '', $match[2])));
    $valuesList = $this->parseMultipleInsertValues($match[3]);

    foreach ($valuesList as $values) {
        if (count($columns) !== count($values)) {
            $this->log("Mismatch in column count for table '{$tableName}'. Columns: " . count($columns) . ", Values: " . count($values));
            continue;
        }
        $tables[$tableName]['data'][] = array_combine($columns, $values);
    }
}
        return $tables;
    }
    private function parseColumns($columnsString)
    {
        $columns = [];
        $columnPattern = '/`(\w+)`\s+([\w\(\)]+)(\s+UNSIGNED)?(\s+NOT NULL)?(\s+AUTO_INCREMENT)?(\s+DEFAULT\s+(?:NULL|\'[^\']*\'|\w+))?/i';
        preg_match_all($columnPattern, $columnsString, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $name = $match[1];
            $type = $match[2];
            $length = null;
            
            // Handle ENUM type
            if (strpos($type, 'enum(') === 0) {
                preg_match('/enum\((.*?)\)/', $type, $enumMatch);
                $type = 'enum';
                $length = $enumMatch[1];
            } elseif (preg_match('/(\w+)\((\d+)\)/', $type, $typeMatch)) {
                $type = $typeMatch[1];
                $length = $typeMatch[2];
            }

            $columns[] = [
                'name' => $name,
                'type' => strtolower($type),
                'length' => $length,
                'unsigned' => isset($match[3]),
                'nullable' => !isset($match[4]),
                'auto_increment' => isset($match[5]),
                'default' => isset($match[6]) ? trim(str_replace('DEFAULT ', '', $match[6])) : null
            ];
        }

        return $columns;
    }


    private function parseForeignKeys($columnsString)
    {
        $foreignKeys = [];
        $foreignKeyPattern = '/ADD CONSTRAINT `(\w+)` FOREIGN KEY \(`(\w+)`\) REFERENCES `(\w+)` \(`(\w+)`\)(?: ON DELETE (CASCADE|SET NULL|RESTRICT|NO ACTION))?/i';
        preg_match_all($foreignKeyPattern, $columnsString, $matches, PREG_SET_ORDER);
    
        foreach ($matches as $match) {
            $foreignKeys[] = [
                'column' => $match[1],
                'referenced_table' => $match[2],
                'referenced_column' => $match[3],
            ];
        }
        return $foreignKeys;
    }

    private function parseIndexes($columnsString)
    {
        $indexes = [];
        $primaryKeyPattern = '/PRIMARY KEY \(`([^`]+)`\)/';
        if (preg_match($primaryKeyPattern, $columnsString, $match)) {
            $indexes['primary'] = $match[1];
        }
        $uniqueIndexPattern = '/UNIQUE KEY `[^`]+` \(`([^`]+)`\)/';
        preg_match_all($uniqueIndexPattern, $columnsString, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $indexes['unique'][] = $match[1];
        }
        $indexPattern = '/KEY `[^`]+` \(`([^`]+)`\)/';
        preg_match_all($indexPattern, $columnsString, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $indexes['index'][] = $match[1];
        }
        return $indexes;
    }

    private function parseMultipleInsertValues($valuesString)
    {
        $valuesList = [];
        $pattern = '/\((.*?)\)(?:,|$)/';
        preg_match_all($pattern, $valuesString, $matches);
        
        foreach ($matches[1] as $values) {
            $valuesList[] = $this->parseValues($values);
        } 
        return $valuesList;
    }

    private function parseValues($valuesString)
    {
        $values = [];
        $valuePattern = '/\'(?:\\\\.|[^\'\\\\])*\'|[^,]+/';
        preg_match_all($valuePattern, $valuesString, $matches);
        foreach ($matches[0] as $value) {
            $values[] = trim($value, "'");
        }
        return $values;
    }

    private function createMigration($tableName, $columns, $foreignKeys, $indexes)
    {
        $migrationName = 'create_' . $tableName . '_table';
        $filename = date('Y_m_d_His') . '_' . $migrationName . '.php';
        $content = $this->getMigrationContent($tableName, $columns, $migrationName, $foreignKeys, $indexes);
        file_put_contents($this->outputDir . '/' .'migrate'. '/' . $filename, $content);
        $this->log("Created migration for table '{$tableName}'");
    }
    
    private function getMigrationContent($tableName, $columns, $migrationName, $foreignKeys, $indexes)
    {
        $columnDefinitions = [];
        $hasCreatedAt = false;
        $hasUpdatedAt = false;
        $hasautoincrement=false;

        foreach ($columns as $column) {
            // Check for created_at and updated_at
            if ($column['type'] === 'timestamp' && $column['nullable']) {
                if ($column['name'] === 'created_at') {
                    $hasCreatedAt = true;
                    continue;
                } elseif ($column['name'] === 'updated_at') {
                    $hasUpdatedAt = true;
                    continue;
                }
            }

            $def = "\$table->{$this->mapColumnType($column['type'])}('{$column['name']}'";
            if ($column['type'] === 'enum') {
                $def .= ", [{$column['length']}]";
            } elseif ($column['length'] !== null) {
                $def .= ", {$column['length']}";
            }
           
            $def .= ")";
            if ($column['unsigned']) {
                $def .= "->unsigned()";
            }
            if ($column['nullable']) {
                $def .= "->nullable()";
            }
            if ($column['auto_increment'] || (isset($indexes['autoincrement']) && in_array($column['name'], $indexes['autoincrement']))) {
                $hasautoincrement=true;
                $def .= "->autoIncrement()";
            }
            if ($column['default'] !== null) {
                if ($column['default'] === 'NULL') {
                    $def .= "->default(null)";
                } else {
                    $def .= "->default({$column['default']})";
                }
            }
            $columnDefinitions[] = $def . ";";
        }

      
        // Add timestamps() if both created_at and updated_at are present
        if ($hasCreatedAt && $hasUpdatedAt) {
            $columnDefinitions[] = "\$table->timestamps();";
        }
         // Add indexes
         if (!empty($indexes['primary']&& !$hasautoincrement)) {
            if(count($indexes['primary'])>0){
                $primaryColumns = implode("', '", $indexes['primary']);
                $columnDefinitions[] = "\$table->primary('{$primaryColumns}');";
            }
            else{
                  $primaryColumns = implode("', '", $indexes['primary']);
            $columnDefinitions[] = "\$table->primary(['{$primaryColumns}']);";
            }
          
        }
        if (!empty($indexes['unique'])) {
            foreach ($indexes['unique'] as $uniqueIndex) {
                $uniqueColumns = implode("', '", $uniqueIndex);
                $columnDefinitions[] = "\$table->unique(['{$uniqueColumns}']);";
            }
        }
        if (!empty($indexes['index'])) {
            foreach ($indexes['index'] as $index) {
                $indexColumns = implode("', '", $index);
                $columnDefinitions[] = "\$table->index(['{$indexColumns}']);";
            }
        }
        if (!empty($indexes['foreign']) ) {
            foreach ($indexes['foreign'] as $foreignKey) {
                $onDelete = $foreignKey['on_delete'] === 'NO ACTION' ? '' : "->onDelete('{$foreignKey['on_delete']}')";
            $columnDefinitions[] = "\$table->foreign('{$foreignKey['column']}')->references('{$foreignKey['referenced_column']}')->on('{$foreignKey['referenced_table']}'){$onDelete};";
            }
        }

        return "<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('{$tableName}', function (Blueprint \$table) {
            " . implode("\n            ", $columnDefinitions) . "
        });
    }

    public function down()
    {
        Schema::dropIfExists('{$tableName}');
    }
};";

        // Refine the migration content
        return RefinedMigrationGenerator::refineMigrationContent($migrationContent);
    }
    private function createSeeder($tableName, $data)
    {
        $seederName = $this->studlyCase($tableName) . 'TableSeeder';
        $filename = $seederName . '.php';
        $content = $this->getSeederContent($tableName, $data, $seederName);
        file_put_contents($this->outputDir . '/' .'seeds'. '/' . $filename, $content);
        $this->log("Created seeder for table '{$tableName}'");
    }

    private function getSeederContent($tableName, $data, $seederName)
    {
        $insertStatements = [];
        foreach ($data as $row) {
            $values = array_map(function ($value) {
                return var_export($value, true);
            }, $row);
            $insertStatements[] = "            " . var_export($row, true) . ",";
        }

        return "<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class {$seederName} extends Seeder
{
    public function run()
    {
        DB::table('{$tableName}')->insert([
" . implode("\n", $insertStatements) . "
        ]);
    }
}";
    }

    private function studlyCase($value)
    {
        $value = ucwords(str_replace(['-', '_'], ' ', $value));
        return str_replace(' ', '', $value);
    }

    private function mapColumnType($mysqlType)
    {
        $typeMap = [
            'int' => 'integer',
            'varchar' => 'string',
            'text' => 'text',
            'datetime' => 'dateTime',
            'timestamp' => 'timestamp',
            'bigint' => 'bigInteger',
            'float' => 'float',
            'double' => 'double',
            'decimal' => 'decimal',
            'boolean' => 'boolean',
            'date' => 'date',
            'time' => 'time',
        ];
        return $typeMap[$mysqlType] ?? 'string';
    }
}

$converter = new MySQLToLaravelConverter('D:/everyThing/alifilm/omarcourse/flutter/script/booksell.sql', 'D:/everyThing/alifilm/omarcourse/flutter/script/output');
$converter->convert();
