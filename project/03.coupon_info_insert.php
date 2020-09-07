<?php
$page_title = '新增資料';
$page_name = "data_insert";
require __DIR__ . '/parts/__.connect_db.php';
?>

<?php include __DIR__ . '/parts/__html_head.php' ?>
<?php include __DIR__ . '/parts/__navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>

                    <!-- return flase送不出去 -->
                    <form name="form1" onsubmit="checkForm();">
                        <div class="form-group">
                            <!-- label的for是對應input的id -->
                            <!-- 沒有name就不會送出 -->
                            <label for="coupon_no">coupon_no</label>
                            <input type="text" class="form-control" id="coupon_no" name="coupon_no">
                        </div>

                        <div class="form-group">
                            <label for="coupon_type">coupon_type</label>
                            <input type="text" class="form-control" id="coupon_type" name="coupon_type">
                        </div>

                        <div class="form-group">
                            <label for="coupon_validity">coupon_validity</label>
                            <input type="text" class="form-control" id="coupon_validity" name="coupon_validity">
                        </div>

                        <div class="form-group">
                            <label for="user_account">user_account</label>
                            <input type="text" class="form-control" id="user_account" name="user_account">
                        </div>





                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>





</div>
<?php include __DIR__ . '/parts/__scripts.php' ?>
<script>
    // checkform檢查資料格式
    function checkForm() {

        // Form: 表單，有外觀
        // FormData: 沒有外觀的表單
        // 找form1，把裡面的值塞到FormData
        const fd = new FormData(document.form1);

        // 發給03.coupon_info_insert_api.php
        fetch('02.coupon_info_insert_api.php', {
                method: 'POST',
                // body是要送的資料
                body: fd
            })
            // 傳字串用text
            .then(r => r.text())
            // 
            .then(str => {
                console.log(str);
            });

        return false;
    }
</script>

<?php include __DIR__ . '/parts/__html_foot.php' ?>