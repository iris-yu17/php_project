<?php
$page_title = '資料列表';
require __DIR__ . '/parts/__.connect_db.php';

$perPage = 5; //每頁有幾筆

// 用戶要看第幾頁
// 有設定就用，沒有設定就用1(第一頁)
// intval轉為整數
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// 總筆數
$t_sql = "SELECT COUNT(*) FROM `coupon_info`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 總頁數
// ceil無條件進位
$totalPages = ceil($totalRows / $perPage);

$rows = [];
// 有資料(($totalRows > 0)才做裡面事情
if ($totalRows > 0) {
    // 如果page<1，設定成1，否則不做事情
    $page < 1 ? ($page = 1) : '';
    // 如果page>總頁數，設定最大頁碼
    $page > $totalPages ? ($page = $totalPages) : '';

    // %s(從第幾筆)，%s(取幾筆)
    // 第一頁從0-4，第二頁5-9，第三頁10-14...
    $sql = sprintf("SELECT * FROM `coupon_info` LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    // 執行
    $stmt = $pdo->query($sql);
    // 拿出來
    $rows = $stmt->fetchAll();
}
?>

<?php include __DIR__ . '/parts/__html_head.php' ?>
<style>
    .col_pagination {
        flex-grow: 0;

    }
</style>
<?php include __DIR__ . '/parts/__navbar.php' ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col_pagination">
            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    <!-- class="disabled" 按鈕不能按 -->
                    <!-- page=1時，秀disabled -->
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>

                    <!-- 分頁只秀前後3頁 -->
                    <?php for ($i = $page - 3; $i <= $page + 3; $i++) :
                        // 若i<1: 跳過  i>1: 離開
                        if ($i < 1) continue;
                        if ($i > $totalPages) break;
                    ?>

                        <!-- class="active" 會反白 -->
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <!-- href給問號，代表是同一頁面，給不同參數 -->
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- page= $totalPages時，秀disabled -->
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><i class="fas fa-trash-alt"></i></th>
                <th scope="col">#</th>
                <th scope="col">coupon_no</th>
                <th scope="col">coupon_type</th>
                <th scope="col">coupon_issue</th>
                <th scope="col">coupon_due</th>
                <th scope="col">coupon_validity</th>
                <th scope="col">user_account</th>
                <th scope="col"><i class="fas fa-edit"></i></th>
            </tr>
        </thead>
        <tbody>
            <!-- foreach(要查看的對象 as $key => $value) -->
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <!-- 按刪除連到04.data_delete.php -->
                    <td><a href="04.coupon_info_delete.php?sid=<?= $r['sid']  ?>"><i class="fas fa-trash-alt"></i></a></td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['coupon_no'] ?></td>
                    <td><?= $r['coupon_type'] ?></td>
                    <td><?= $r['coupon_issue'] ?></td>
                    <td><?= $r['coupon_due'] ?></td>
                    <td><?= $r['coupon_validity'] ?></td>
                    <td><?= $r['user_account'] ?></td>
                    <!-- edit: 給primary值 -->
                    <td><a href="05.coupon_info_edit.php?sid=<?= $r['sid']  ?>"><i class="fas fa-edit"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
<?php include __DIR__ . '/parts/__scripts.php' ?>
<?php include __DIR__ . '/parts/__html_foot.php' ?>