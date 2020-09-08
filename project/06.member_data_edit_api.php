<?php
// 資料庫連線
require __DIR__ . '/parts/__.connect_db.php';

// 檢查
// 如果沒有sid
if(empty($_POST['sid'])){
    $output['code'] = 405;
    $output['error'] = '沒有 sid';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


// sid不可改，用來判斷，放where
$sql = "UPDATE `member_list` SET 
`account`=?,
`password`=?,
`family_name`=?,
`given_name`=?,
`birthday`=?,
`mobile`=?,
`email`=?,
`district`=?,
`address`=?,
`activated`=?,
`point`=? 
WHERE `sid`=?";

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
    $_POST['sid'],
]);


// 算有幾個Row(輸入幾筆資料)
echo $stmt->rowCount();
echo 'ok';
