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
                            <label for="account">account</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>

                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="family_name">family_name</label>
                            <input type="text" class="form-control" id="family_name" name="family_name">
                        </div>

                        <div class="form-group">
                            <label for="given_name">given_name</label>
                            <input type="text" class="form-control" id="given_name" name="given_name">
                        </div>

                        <div class="form-group">
                            <label for="birthday">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>

                        <div class="form-group">
                            <label for="mobile">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="district">district</label>
                            <input type="text" class="form-control" id="district" name="district">
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
    // checkform檢查資料格式
    function checkForm() {

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