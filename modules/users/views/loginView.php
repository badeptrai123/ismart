<?php
session_start();
global $username,$password,$error;
if (isset($_POST['btn-login'])) {
    $error = array();
    if (empty($_POST['username'])) {
        $error['username'] = "Username không được để trống";
    } else {
        if (strlen($_POST['username']) < 6 || strlen($_POST['username']) > 32) {
            $error['username'] = 'Username số lựợng kí tự từ 6 đến 32';
        } else {
            if (is_username($_POST['username'])) {
                $username = $_POST['username'];
            } else {
                $error['username'] = "Username không đúng định dạng";
            }
        }
    }
    if (empty($_POST['password'])) {
        $error['password'] = "Password không được để trống";
    } else {
        if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 32) {
            $error['password'] = 'Password số lượng kí tự từ 6 đến 32';
        } else {
            if (is_password($_POST['password'])) {
                $password = $_POST['password'];
            } else {
                $error['password'] = "Password không đúng định dạng";
            }
        }
    }
    if (empty($error)) {
        if (check_login($username, $password)) {
            if (isset($_POST['remember_me'])) {
                setcookie('is_login', true, time() + 3600);
                setcookie('user_login', $username, time() + 3600);
            } 
            $_SESSION['is_login'] = true;
            $_SESSION['user_login'] = $username;
            redirect_to("?mod=home");
        } else {
            $error['account'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trang đăng nhập</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
</head>

<body>
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
    <div id="wp-form-login">
        <h1>Đăng nhập</h1>
        <form action="" id="form-login" method='post'>
            <input type="text" name="username" id="username" value="<?php echo set_value('username');  ?>" placeholder="username">
            <?php echo form_error('username');  ?>
            <input type="password" name="password" id="password" placeholder="password">
            <?php echo form_error('password');  ?>
            <input type="checkbox" class="remember_me" name="remember_me" id="remember_me">
            <label for="remember_me">Remember me</label>
            <input type="submit" id="login" name="btn-login" value="Đăng nhập">
            <?php echo form_error('account');  ?>
        </form>
        <a href="?mod=users&action=loss_pass" id="lost-pass">Quên mật khẩu</a>
        <a href="?mod=users&action=register" id="creat-account">Đăng kí</a>
    </div>
</body>

</html>