<?php
session_start();
include("include/connection.php");

// ✅ Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit;
}
$u_uname = $_COOKIE['auth_token'];

// ✅ Backup logic (run before any HTML output)
if (isset($_POST['backup'])) {
    // File name
    $backup_file = $db . "_backup_" . date("Y-m-d_H-i-s") . ".sql";
    $backup_path = __DIR__ . "/cron/" . $backup_file;
    $sql_script = "";

    // ✅ Get all tables
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
            for ($i=0; $i < $column_count; $i++) {
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

    // ✅ Save to file
    file_put_contents($backup_path, $sql_script);

    // ✅ Insert into backup table
    $stmt = $link->prepare("INSERT INTO backup (sql_name) VALUES (?)");
    $stmt->bind_param("s", $backup_file);
    $stmt->execute();
    $stmt->close();

    // ✅ Force download (no echo/HTML before this)
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($backup_file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($backup_path));
    readfile($backup_path);
    exit;
}

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <h2>Database Backup</h2>
        <form method="post">
            <button type="submit" name="backup" style="padding:10px 20px; font-size:16px;">
                🔄 Create Backup
            </button>
        </form>
    </div>
</div>

<?php include 'include/footer.php'; ?>
