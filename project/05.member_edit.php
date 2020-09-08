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


                    <form name="form1" onsubmit="checkForm();">
                        <div class="form-group">
                            <!-- htmlentities跳脫 -->
                            <label for="account">account</label>
                            <input type="text" class="form-control" id="account" name="account" value="<?= htmlentities($row['account']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= htmlentities($row['password']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="family_name">family_name</label>
                            <input type="text" class="form-control" id="family_name" name="family_name" value="<?= htmlentities($row['family_name']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="given_name">given_name</label>
                            <input type="text" class="form-control" id="given_name" name="given_name" value="<?= htmlentities($row['given_name']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="birthday">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= htmlentities($row['birthday']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="mobile">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?= htmlentities($row['mobile']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= htmlentities($row['email']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="district">district</label>
                            <input type="text" class="form-control" id="district" name="district" value="<?= htmlentities($row['district']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?= htmlentities($row['address']) ?>">
                        </div>


                        <div class="form-group">
                            <label for="activated">activated</label>
                            <input type="text" class="form-control" id="activated" name="activated" value="<?= htmlentities($row['activated']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="point">point</label>
                            <input type="text" class="form-control" id="point" name="point" value="<?= htmlentities($row['point']) ?>">
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

            .then(r => r.text())

            .then(str => {
                console.log(str);
            });

        return false;
    }
</script>

<?php include __DIR__ . '/parts/__html_foot.php' ?>