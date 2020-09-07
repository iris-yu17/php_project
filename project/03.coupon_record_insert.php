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
                            <label for="user_account">user_account</label>
                            <input type="text" class="form-control" id="user_account" name="user_account">
                        </div>

                        <div class="form-group">
                            <label for="order_number">order_number</label>
                            <input type="text" class="form-control" id="order_number" name="order_number">
                        </div>

                        <div class="form-group">
                            <label for="order_original_amount">order_original_amount</label>
                            <input type="text" class="form-control" id="order_original_amount" name="order_original_amount">
                        </div>

                        <div class="form-group">
                            <label for="discount_type">discount_type</label>
                            <input type="text" class="form-control" id="discount_type" name="discount_type">
                        </div>

                        <div class="form-group">
                            <label for="order_final_amount">order_final_amount</label>
                            <input type="text" class="form-control" id="order_final_amount" name="order_final_amount">
                        </div>

                        <div class="form-group">
                            <label for="status">status</label>
                            <input type="text" class="form-control" id="status" name="status">
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

        // 發給02.coupon_record_insert_api.php
        fetch('02.coupon_record_insert_api.php', {
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