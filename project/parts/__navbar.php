<?php
// 如果page_name沒設定，用空字串
if (!isset($page_name)) $page_name = '';
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- page_name=data_list的時候active，否則空字串 -->
                <li class="nav-item <?= $page_name == 'data_list' ? 'active' : '' ?>">
                    <!-- link to data_list -->
                    <a class="nav-link" href="<?= WEB_ROOT ?>/project/01.member_list.php">會員資料 <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item <?= $page_name == 'data_insert' ? 'active' : '' ?>">
                    <!-- link to data_insert -->
                    <a class="nav-link" href="<?= WEB_ROOT ?>/project/03.member_data_insert.php">新增會員資料</a>
                </li>

                <li class="nav-item <?= $page_name == 'data_list' ? 'active' : '' ?>">
                    <!-- link to data_list -->
                    <a class="nav-link" href="<?= WEB_ROOT ?>/project/01.coupon_info.php">折價券資料 <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item <?= $page_name == 'data_insert' ? 'active' : '' ?>">
                    <!-- link to data_insert -->
                    <a class="nav-link" href="<?= WEB_ROOT ?>/project/03.coupon_info_insert.php">新增折價券</a>
                </li>

                <li class="nav-item <?= $page_name == 'data_list' ? 'active' : '' ?>">
                    <!-- link to data_list -->
                    <a class="nav-link" href="<?= WEB_ROOT ?>/project/01.coupon_record.php">折價券紀錄 <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item <?= $page_name == 'data_insert' ? 'active' : '' ?>">
                    <!-- link to data_insert -->
                    <a class="nav-link" href="<?= WEB_ROOT ?>/project/03.coupon_record_insert.php">新增折價券紀錄</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<style>
    /* .navbar .nav-item.active {
        background-color: #7abaff;
        border-radius: 10px;
    } */
</style>