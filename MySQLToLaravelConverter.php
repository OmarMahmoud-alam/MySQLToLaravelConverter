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

   /* public function convert()
    {
        $this->log("Starting conversion process");
        $sql = file_get_contents($this->dumpFile);
        $tables = $this->parseTables($sql);
        $alterStatements = $this->parseAlterStatements($sql);

        foreach ($tables as $tableName => $tableData) {
            if (isset($alterStatements[$tableName])) {
                $tableData['indexes'] = array_merge($tableData['indexes'], $alterStatements[$tableName]);
            }
            $this->createMigration($tableName, $tableData['structure'], $tableData['foreign_keys'], $tableData['indexes']);
            if (!empty($tableData['data'])) {
                $this->createSeeder($tableName, $tableData['data']);
            } else {
                $this->log("No data found for table '{$tableName}'. Skipping seeder creation.");
            }
        }
        $this->log("Conversion process completed");
    }*/
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
                    'foreign' => []
                ];
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
            preg_match_all('/ADD CONSTRAINT `\w+` FOREIGN KEY \(`(.+?)`\) REFERENCES `(\w+)` \(`(.+?)`\)/', $alterations, $fkMatches, PREG_SET_ORDER);
            foreach ($fkMatches as $fkMatch) {
                $alterStatements[$tableName]['foreign'][] = [
                    'column' => $fkMatch[1],
                    'referenced_table' => $fkMatch[2],
                    'referenced_column' => $fkMatch[3]
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
            $this->createMigration($tableName, $tableData['structure'], $tableData['foreign_keys'], $tableData['indexes'] ?? []);
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
        $tablePattern = '/CREATE TABLE `(\w+)` \((.*?)\);/s';
        $insertPattern = '/INSERT INTO `(\w+)` \((.*?)\) VALUES\s+(.*?);/s';

        // Parse table structures
        preg_match_all($tablePattern, $sql, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $tableName = $match[1];
            $tables[$tableName]['structure'] = $this->parseColumns($match[2]);
            $tables[$tableName]['foreign_keys'] = $this->parseForeignKeys($match[2]);
            $tables[$tableName]['indexes'] = $this->parseIndexes($match[2]);
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
        $columnPattern = '/`(\w+)`\s+(\w+)(\(\d+\))?(\s+UNSIGNED)?(\s+DEFAULT\s+(NULL|\'[^\']*\'))?(\s+NOT\s+NULL)?(\s+AUTO_INCREMENT)?/';
        preg_match_all($columnPattern, $columnsString, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $columns[] = [
                'name' => $match[1],
                'type' => $match[2],
                'length' => isset($match[3]) ? trim($match[3], '()') : null,
                'unsigned' => isset($match[4]) ? true : false,
                'default' => isset($match[5]) ? $match[6] : null,
                'nullable' => isset($match[7]) ? false : true,
                'auto_increment' => isset($match[8]) ? true : false
            ];
        }
        return $columns;
    }

    private function parseForeignKeys($columnsString)
    {
        $foreignKeys = [];
        $foreignKeyPattern = '/CONSTRAINT `[^`]+` FOREIGN KEY \(`([^`]+)`\) REFERENCES `([^`]+)` \(`([^`]+)`\)/';
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
        file_put_contents($this->outputDir . '/' . $filename, $content);
        $this->log("Created migration for table '{$tableName}'");
    }
    
    private function getMigrationContent($tableName, $columns, $migrationName, $foreignKeys, $indexes)
    {
        $columnDefinitions = [];
        
        foreach ($columns as $column) {
            $def = "\$table->{$this->mapColumnType($column['type'])}('{$column['name']}'";
            if ($column['length']) {
                $def .= ", {$column['length']}";
            }
            $def .= ")";
            if ($column['unsigned']) {
                $def .= "->unsigned()";
            }
            if ($column['nullable']) {
                $def .= "->nullable()";
            }
            if ($column['auto_increment']) {
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

        // Add indexes
        if (!empty($indexes['primary'])) {
            $primaryColumns = implode("', '", $indexes['primary']);
            $columnDefinitions[] = "\$table->primary(['{$primaryColumns}']);";
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

        // Add foreign keys
        foreach ($foreignKeys as $foreignKey) {
            $columnDefinitions[] = "\$table->foreign('{$foreignKey['column']}')->references('{$foreignKey['referenced_column']}')->on('{$foreignKey['referenced_table']}')->onDelete('cascade');";
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
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('{$tableName}');
    }
};";
    }
    private function createSeeder($tableName, $data)
    {
        $seederName = $this->studlyCase($tableName) . 'TableSeeder';
        $filename = $seederName . '.php';
        $content = $this->getSeederContent($tableName, $data, $seederName);
        file_put_contents($this->outputDir . '/' . $filename, $content);
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
