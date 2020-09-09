<?php
$page_title = '編輯資料';
$page_name = "data_edit";
require __DIR__ . '/parts/__.connect_db.php';


// 前面會傳sid值過來(01.member_list.php line119)，判斷有沒有這個值
// 有的話就用sid，沒有就給0
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

// 如果是0就不做了，轉到01.member_list.php
// empty()，若是0,"",[],會拿到true
if (empty($sid)) {
    header('Location: 01.member_list.php');
    exit;
}

// 直接把$sid值放進來(前面intval已轉成數字)
$sql = "SELECT * FROM member_list WHERE sid=$sid";

$row = $pdo->query($sql)->fetch();

// 如果是空的就不做了，轉到01.member_list.php
if (empty($row)) {
    header('Location: 01.member_list.php');
    exit;
}


?>

<?php include __DIR__ . '/parts/__html_head.php' ?>
<?php include __DIR__ . '/parts/__navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯資料</h5>


                    <form name="form1" onsubmit="checkForm(); return false;" novalidate>
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
    function checkForm() {

        const fd = new FormData(document.form1);

        fetch('02.member_data_insert_api.php', {
                method: 'POST',

                body: fd
            })

            /*
                        .then(r => r.text())
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
</script>

<?php include __DIR__ . '/parts/__html_foot.php' ?>