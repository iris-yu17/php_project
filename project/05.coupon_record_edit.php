<?php
$page_title = '編輯折價券紀錄';
$page_name = 'coupon_record_edit';
require __DIR__ . '/parts/__.connect_db.php';

// 前面會傳sid值過來(01.member_list.php line119)，判斷有沒有這個值
// 有的話就用sid，沒有就給0
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

// 如果是0就不做了，轉到01.member_list.php
// empty()，若是0,"",[],會拿到true
if (empty($sid)) {
    header('Location: 01.coupon_record.php');
    exit;
}

// 直接把$sid值放進來(前面intval已轉成數字)
$sql = "SELECT * FROM coupon_record WHERE sid=$sid";

$row = $pdo->query($sql)->fetch();

// 如果是空的就不做了，轉到01.member_list.php
if (empty($row)) {
    header('Location: 01.coupon_record.php');
    exit;
}


?>

<?php include __DIR__ . '/parts/__html_head.php' ?>
<style>
    span.red-stars {
        color: red;
    }

    small.error-msg {
        color: red;
    }
</style>

<?php include __DIR__ . '/parts/__navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">

            <!-- 增新成功/失敗alert -->
            <div id="infobar" class="alert alert-success" role="alert" style="display: none">
                A simple success alert—check it out!
            </div>


            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯折價券紀錄</h5>

                    <!-- return flase送不出去 -->
                    <form name="form1" onsubmit="checkForm(); return false;" novalidate>
                    <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                        <div class="form-group">
                            <!-- label的for是對應input的id -->
                            <!-- 沒有name就不會送出 -->
                            <label for="user_account"><span class="red-stars">**</span>user_account</label>
                            <input type="text" class="form-control" id="user_account" name="user_account" required value="<?= htmlentities($row['user_account']) ?>">
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="order_number"><span class="red-stars">**</span>order_number</label>
                            <input type="text" class="form-control" id="order_number" name="order_number" required value="<?= htmlentities($row['order_number']) ?>">
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="order_original_amount">order_original_amount</label>
                            <input type="text" class="form-control" id="order_original_amount" name="order_original_amount" value="<?= htmlentities($row['order_original_amount']) ?>">
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="discount_type">discount_type</label>
                            <input type="text" class="form-control" id="discount_type" name="discount_type" value="<?= htmlentities($row['discount_type']) ?>">
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="order_final_amount">order_final_amount</label>
                            <input type="text" class="form-control" id="order_final_amount" name="order_final_amount" value="<?= htmlentities($row['order_final_amount']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="status">status</label>
                            <input type="text" class="form-control" id="status" name="status" value="<?= htmlentities($row['status']) ?>">
                            <small class="form-text error-msg"></small>
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
    // 正確格式
    // const discount_type_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $user_account = document.querySelector('#user_account');
    // const $discount_type = document.querySelector('#discount_type');
    const r_fields = [$user_account];
    const infobar = document.querySelector('#infobar');


    function checkForm() {
        // 檢查:預設true，只要1個欄位沒通過檢查，就變false
        let isPass = true;

        // 回復原來的狀態
        r_fields.forEach(el => {
            el.style.borderColor = '#CCCCCC';
            el.nextElementSibling.innerHTML = '';
        });

        // 檢查資料格式
        if ($user_account.value.length < 8) {
            isPass = false;
            $user_account.style.borderColor = 'red';
            $user_account.nextElementSibling.innerHTML = 'user account大於8碼';
        }
/*
        if (!discount_type_pattern.test($discount_type.value)) {
            isPass = false;
            $discount_type.style.borderColor = 'red';
            $discount_type.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        }
*/



        // 如果通過的話就發送
        if (isPass) {
            // 找form1，把裡面的值塞到FormData
            const fd = new FormData(document.form1);

            // 發給02.member_data_insert_api.php
            fetch('06.coupon_record_edit_api.php', {
                    method: 'POST',
                    // body是要送的資料
                    body: fd
                })

                /*
                                // 傳字串用text
                                .then(r => r.text())
                                // 
                                .then(str => {
                                    console.log(str);
                                });
                */


                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        infobar.innerHTML = '編輯成功';
                        if (infobar.classList.contains('alert-danger')) {
                            infobar.classList.replace('alert-danger', 'alert-success')
                        }
                        setTimeout(() => {
                            location.href = '01.coupon_record.php';
                        }, 3000)
                    } else {
                        infobar.innerHTML = obj.error || '編輯失敗';
                        if (infobar.classList.contains('alert-success')) {
                            infobar.classList.replace('alert-success', 'alert-danger')
                        }
                        submitBtn.style.display = 'block';
                    }
                    infobar.style.display = 'block';
                });
        }


    }
</script>

<?php include __DIR__ . '/parts/__html_foot.php' ?>