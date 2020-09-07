<?php
// 資料庫連線
require __DIR__ . '/parts/__.connect_db.php';

// 新增的時候不用給sid
// VALUE: 從外面來的用問號，NOW()是SQLfunction，用當下時間
$sql = "INSERT INTO `coupon_record`(
    `user_account`, `order_number`, `order_original_amount`, 
    `discount_type`, `order_final_amount`, `status`) VALUES (
    ?,?,?,?,?,?)";

// PREPARE準備
// 會拿到一個PDOstatement物件
$stmt = $pdo->prepare($sql);
// 執行
$stmt->execute([
    $_POST['user_account'],
    $_POST['order_number'],
    $_POST['order_original_amount'],
    $_POST['discount_type'],
    $_POST['order_final_amount'],
    $_POST['status'],
]);


// 算有幾個Row(輸入幾筆資料)
echo $stmt->rowCount();
echo 'ok';
