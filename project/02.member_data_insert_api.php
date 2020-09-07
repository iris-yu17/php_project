<?php
// 資料庫連線
require __DIR__ . '/parts/__.connect_db.php';

// 新增的時候不用給sid
// VALUE: 從外面來的用問號，NOW()是SQLfunction，用當下時間
$sql = "INSERT INTO `member_list`(
    `account`, `password`, `family_name`, `given_name`, `birthday`, `mobile`,
    `email`, `district`, `address`, 
    `created_at`, `activated`, `point`
    ) VALUES (?,?,?,?,?,?,?,?,?,NOW(),?,?)";

// PREPARE準備
// 會拿到一個PDOstatement物件
$stmt = $pdo->prepare($sql);
// 執行
$stmt->execute([
    $_POST['account'],
    $_POST['password'],
    $_POST['family_name'],
    $_POST['given_name'],
    $_POST['birthday'],
    $_POST['mobile'],
    $_POST['email'],
    $_POST['district'],
    $_POST['address'],
    $_POST['activated'],
    $_POST['point'],
]);


// 算有幾個Row(輸入幾筆資料)
echo $stmt->rowCount();
echo 'ok';
