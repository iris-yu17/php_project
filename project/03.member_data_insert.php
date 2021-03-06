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
    <div class="row justify-content-center">
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
                            <label for="account"><span class="red-stars">**</span>account</label>
                            <input type="text" class="form-control" id="account" name="account" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="password"><span class="red-stars">**</span>password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="family_name"><span class="red-stars">**</span>family_name</label>
                            <input type="text" class="form-control" id="family_name" name="family_name" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="given_name"><span class="red-stars">**</span>given_name</label>
                            <input type="text" class="form-control" id="given_name" name="given_name" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="birthday">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>

                        <div class="form-group">
                            <label for="mobile"><span class="red-stars">**</span>mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="district"><span class="red-stars">**</span>district</label>
                            <input type="text" class="form-control" id="district" name="district" required>
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>


                        <div class="form-group">
                            <label for="activated">activated</label>
                            <input type="text" class="form-control" id="activated" name="activated">
                        </div>

                        <div class="form-group">
                            <label for="point">point</label>
                            <input type="text" class="form-control" id="point" name="point">
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
    const mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $account = document.querySelector('#account');
    const $mobile = document.querySelector('#mobile');
    const r_fields = [$account, $mobile];
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
        if ($account.value.length < 8) {
            isPass = false;
            $account.style.borderColor = 'red';
            $account.nextElementSibling.innerHTML = '帳號需大於8碼';
        }

        if (!mobile_pattern.test($mobile.value)) {
            isPass = false;
            $mobile.style.borderColor = 'red';
            $mobile.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        }



        // 如果通過的話就發送
        if (isPass) {
            // Form: 表單，有外觀
            // FormData: 沒有外觀的表單
            // 找form1，把裡面的值塞到FormData
            const fd = new FormData(document.form1);

            // 發給02.member_data_insert_api.php
            fetch('02.member_data_insert_api.php', {
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
                        if (infobar.classList.contains('alert-danger')) {
                            infobar.classList.replace('alert-danger', 'alert-success')
                        }
                        setTimeout(() => {
                            location.href = '01.member_list.php';
                        }, 3000)
                    } else {
                        infobar.innerHTML = obj.error || '新增失敗';
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