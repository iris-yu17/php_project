<?php
$page_title = '新增資料';
$page_name = "data_insert";
require __DIR__ . '/parts/__.connect_db.php';
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
                    <h5 class="card-title">新增資料</h5>

                    <!-- return flase送不出去 -->
                    <form name="form1" onsubmit="checkForm(); return false;">
                        <div class="form-group">
                            <!-- label的for是對應input的id -->
                            <!-- 沒有name就不會送出 -->
                            <label for="coupon_no"><span class="red-stars">**</span>coupon_no</label>
                            <input type="text" class="form-control" id="coupon_no" name="coupon_no" required>
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
                            <label for="user_account"><span class="red-stars">**</span>user_account</label>
                            <input type="text" class="form-control" id="user_account" name="user_account" required>
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
    // const mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $user_account = document.querySelector('#user_account');
    // const $mobile = document.querySelector('#mobile');
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
            $user_account.nextElementSibling.innerHTML = 'user account需大於8碼';
        }

/*
        if (!mobile_pattern.test($mobile.value)) {
            isPass = false;
            $mobile.style.borderColor = 'red';
            $mobile.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        }
*/



        // 如果通過的話就發送
        if (isPass) {

            // Form: 表單，有外觀
            // FormData: 沒有外觀的表單
            // 找form1，把裡面的值塞到FormData
            const fd = new FormData(document.form1);

            // 發給02.coupon_info_insert_api.php
            fetch('02.coupon_info_insert_api.php', {
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
                        infobar.innerHTML = '新增成功';
                        if(infobar.classList.contains('alert-danger')){
                            infobar.classList.replace('alert-danger', 'alert-success')
                        }
                        setTimeout(() => {
                            location.href = '01.coupon_info.php';
                        }, 3000)
                    } else {
                        infobar.innerHTML = obj.error || '新增失敗';
                        if(infobar.classList.contains('alert-success')){
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