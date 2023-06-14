<?php
    $host = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "vid_explorerDB";

    $dsn = "mysql:host=".$host.";dbname=".$dbName;

    $pdo = new PDO($dsn, $userName, $password);
?>