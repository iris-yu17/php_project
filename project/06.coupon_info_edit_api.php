<?php
// 06.coupon_info_edit_api
// 資料庫連線
require __DIR__ . '/parts/__.connect_db.php';
// 陣列裡放要送的資料
$output = [
    // 是否成功寫進去，預設沒有
    'success' => false,
    // 前端送甚麼資料來，就送甚麼回去。當作檢查
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

// 檢查
// 如果沒有sid
if(empty($_POST['sid'])){
    $output['code'] = 405;
    $output['error'] = '沒有 sid';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// 檢查格式
if(mb_strlen($_POST['user_account'])<8){
    $output['code'] = 410;
    $output['error'] = 'user account長度要大於8';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    //出錯了就不往下進行，EXIT
    exit;
}

/*
if(! preg_match('/^09\d{2}-?\d{3}-?\d{3}$/', $_POST['mobile'])){
    $output['code'] = 420;
    $output['error'] = '手機號碼格式錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
*/

// sid不可改，用來判斷，放where
$sql = "UPDATE `coupon_info` SET 
`coupon_no`=?,
`coupon_type`=?,
`coupon_validity`=?,
`user_account`=?
WHERE `sid`=?";

// PREPARE準備
// 會拿到一個PDOstatement物件
$stmt = $pdo->prepare($sql);
// 執行
$stmt->execute([
    $_POST['coupon_no'],
    $_POST['coupon_type'],
    $_POST['coupon_validity'],
    $_POST['user_account'],
    $_POST['sid'],
]);


// 算有幾個Row(輸入幾筆資料)
// echo $stmt->rowCount();
// echo 'ok';


// 如果有修改
if($stmt->rowCount()){
    $output['success'] = true;
}

// 把$output送出去，用JSON格式
echo json_encode($output, JSON_UNESCAPED_UNICODE);
