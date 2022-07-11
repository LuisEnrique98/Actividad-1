<?php
include('backup.php');

echo backupDatabaseTables('localhost','Luis','Autonoma','bdcrud');

$fecha=date("Y-m-d");
header("Content-disposition: attachment; filename=db-backup-".$fecha.".sql");
header("Content-type: MIME");
readfile("backups/db-backup-".$fecha.".sql");