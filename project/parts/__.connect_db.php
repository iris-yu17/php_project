

<?php

//先定義資料庫相關存取資料
$db_host = "localhost";
$db_name = "php_project";
$db_user = "root";
$db_pass = "";

//使用PDO存取資料庫時，需要將資料庫依下列格式撰寫，讓程式讀取資料庫
$dsn = "mysql:host={$db_host};dbname={$db_name}";

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);

# $pdo->query("use mytest;"); // 萬一出現 no databases selected 的錯誤

define('WEB_ROOT', '/php_project');
