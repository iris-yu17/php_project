<?php
require __DIR__ . '/parts/__.connect_db.php';

// 有Referer就到referer，沒有就到01.member_list.php
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '01.member_list.php';

// 如果沒給sid就不做，回01.member_list.php
// 點刪除->F12 Network headers有referer秀剛剛是從哪邊連過來的
if (empty($_GET['sid'])) {
    header('Location:' . $referer);
    exit;
};

// 有sid，把它轉成數值，沒有就給0(sid沒有0，仍會執行但不會有資料被刪掉)
$sid = intval($_GET['sid']) ?? 0;

// sid已轉換成數值，可直接塞進去
$pdo->query("DELETE FROM `member_list` WHERE sid=$sid");
// 返回
header('Location:' . $referer);
