<?php
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


// 檢查格式
if(mb_strlen($_POST['user_account'])<8){
    $output['code'] = 410;
    $output['error'] = '帳號長度要大於8';
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
// 新增的時候不用給sid
// VALUE: 從外面來的用問號，NOW()是SQLfunction，用當下時間
$sql = "INSERT INTO `coupon_record`(
    `coupon_no`,`user_account`, `order_number`, 
    `order_original_amount`, `discount_type`, `order_final_amount`, 
    `status`) VALUES (
    ?,?,?,?,?,?,?)";

// PREPARE準備
// 會拿到一個PDOstatement物件
$stmt = $pdo->prepare($sql);
// 執行
$stmt->execute([
    $_POST['coupon_no'],
    $_POST['user_account'],
    $_POST['order_number'],
    $_POST['order_original_amount'],
    $_POST['discount_type'],
    $_POST['order_final_amount'],
    $_POST['status'],
]);


// 算有幾個Row(輸入幾筆資料)
// echo $stmt->rowCount();
// echo 'ok';


// 如果有新增成功
if($stmt->rowCount()){
    $output['success'] = true;
}

// 把$output送出去，用JSON格式
echo json_encode($output, JSON_UNESCAPED_UNICODE);