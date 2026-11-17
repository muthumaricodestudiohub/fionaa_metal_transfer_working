<?php
include("connection.php");

$backup_file = $DB_NAME . "_backup_" . date("Y-m-d_H-i-s") . ".sql";
$backup_path = __DIR__ . "/../jfdkgSD__UUECV_PIOU123/cron/" . $backup_file; // ? local server path
$sql_script  = "";

// ? Get all tables
$tables = [];
$result = $link->query("SHOW TABLES");
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

foreach ($tables as $table) {
    // Table structure
    $res = $link->query("SHOW CREATE TABLE $table");
    $row = $res->fetch_row();
    $sql_script .= "\n\n" . $row[1] . ";\n\n";

    // Table data
    $res = $link->query("SELECT * FROM $table");
    $column_count = $res->field_count;

    while ($row = $res->fetch_row()) {
        $sql_script .= "INSERT INTO $table VALUES(";
        for ($i = 0; $i < $column_count; $i++) {
            $row[$i] = $row[$i] ? addslashes($row[$i]) : '';
            $row[$i] = str_replace("\n", "\\n", $row[$i]);
            $sql_script .= "'" . $row[$i] . "'";
            if ($i < ($column_count - 1)) {
                $sql_script .= ",";
            }
        }
        $sql_script .= ");\n";
    }
    $sql_script .= "\n";
}

// ? Save to server path
file_put_contents($backup_path, $sql_script);

// ? Insert log in DB
$stmt = $link->prepare("INSERT INTO backup (sql_name) VALUES (?)");
$stmt->bind_param("s", $backup_file);
$stmt->execute();
$stmt->close();

echo "Backup created successfully: $backup_file\n";
?>
