<!-- 撈資料test -->

<?php
// require __.connect_db.php 就可以使用檔案裡的$pdo變數
require __DIR__ . '/parts/__.connect_db.php';


// ()內是mysql語法，LIMIT 5: 撈5筆
// 執行query(類似fetch)，去資料庫撈資料。會回傳一個PDOstatement，用$stmt變數(自訂)去接，必須使用fetch、fetcAll...等方式取得資料
$stmt = $pdo->query("SELECT * FROM `coupon_info` LIMIT 5");

// 用fetcAll取得所有5筆資料
// 轉為json格式
echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);
