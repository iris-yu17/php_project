<?php
// 資料庫連線
require __DIR__ . '/parts/__.connect_db.php';

// 新增的時候不用給sid
// VALUE: 從外面來的用問號，NOW()是SQLfunction，用當下時間
$sql = "INSERT INTO `coupon_info`(
    `coupon_no`, `coupon_type`, `coupon_issue`,
    `coupon_due`, `coupon_validity`, `user_account`) VALUES (
    ?,?,NOW(),NOW() + INTERVAL 1 MONTH,?,?)";

// PREPARE準備
// 會拿到一個PDOstatement物件
$stmt = $pdo->prepare($sql);
// 執行
$stmt->execute([
    $_POST['coupon_no'],
    $_POST['coupon_type'],
    $_POST['coupon_validity'],
    $_POST['user_account'],
]);


// 算有幾個Row(輸入幾筆資料)
echo $stmt->rowCount();
echo 'ok';
