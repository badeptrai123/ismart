<?php
session_start();
get_header();
?>
<?php
global $username,$password,$error;
if (isset($_POST['btn-submit'])) {
    $error = array();
    if (empty($_POST['pass-old'])) {
        $error['password-old'] = "Password không được để trống";
    } else {
        if (strlen($_POST['pass-old']) < 6 || strlen($_POST['pass-old']) > 32) {
            $error['password-old'] = 'Password số lượng kí tự từ 6 đến 32';
        } else {
            if (is_password($_POST['pass-old'])) {
                $password_old = md5($_POST['pass-old']);
            } else {
                $error['password-old'] = "Password không đúng định dạng";
            }
        }
    }
    if (empty($_POST['pass-new'])) {
        $error['password-new'] = "Password không được để trống";
    } else {
        if (strlen($_POST['pass-new']) < 6 || strlen($_POST['pass-new']) > 32) {
            $error['password-new'] = 'Password số lượng kí tự từ 6 đến 32';
        } else {
            if (is_password($_POST['pass-new'])) {
                $password_new = md5($_POST['pass-new']);
            } else {
                $error['password-new'] = "Password không đúng định dạng";
            }
        }
    }
   
    if (empty($_POST['confirm-pass'])) {
        $error['confirm-pass'] = "Password không được để trống";
    } else {
        if (strlen($_POST['confirm-pass']) < 6 || strlen($_POST['confirm-pass']) > 32) {
            $error['confirm-pass'] = 'Password số lượng kí tự từ 6 đến 32';
        } else {
            if (is_password($_POST['confirm-pass'])) {
                $password_confirm = md5($_POST['confirm-pass']);
            } else {
                $error['confirm-pass'] = "Password không đúng định dạng";
            }
        }
    }
    if (empty($error)) {
        if(check_pass_old($password_old)){
            if($password_new==$password_confirm){
                $data=array(
                    'password'=>$password_new
                );
                update_new_pass(user_login(),$data);
                $error['pass'] = "Cập nhật mật khẩu thành công";
            }
            else{
                $error['pass'] = "Mật khẩu mới không trùng khớp";
            }
        }
        else{
            $error['pass'] = "Mật khẩu cũ không đúng";
        }
    }
}

?>
<style>
    p.error{
        color:red;
    }
</style>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
        get_sidebar('users');
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                    <?php echo form_error('pass');  ?>
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass-old" id="pass-old">
                        <?php echo form_error('password-old');  ?>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass-new" id="pass-new">
                        <?php echo form_error('password-new');  ?>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-pass" id="confirm-pass">
                        <?php echo form_error('confirm-pass');  ?>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>