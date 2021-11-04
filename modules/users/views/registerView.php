<?php
session_start();
global $email, $username, $password, $error, $fullname;

if (isset($_POST['btn-reg'])) {
    $error = array();
    if (empty($_POST['fullname'])) {
        $error['fullname'] = "Fullname không được để trống";
    } else {
        $fullname = $_POST['fullname'];
    }

    if (empty($_POST['email'])) {
        $error['email'] = "Email không được để trống";
    } else {
        if (is_email($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $error['email'] = "Email không đúng định dạng";
        }
    }

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
                $password = md5($_POST['password']);
            } else {
                $error['password'] = "Password không đúng định dạng";
            }
        }
    }
    if (empty($error)) {
        if (!user_exist($username, $email)) {
            $active_token=md5($username.time());
            $data = array(
                'username' => $username,
                'email' => $email,
                'fullname' => $fullname,
                'password' => $password,
                'active_token'=>$active_token
            );
            add_user($data);
            $link_active=base_url("?mod=users&action=active&active_token={$active_token}");
            $content="
            <p>Chào bạn {$fullname}</p>
            <p>Bạn vui lòng kích vào link này để kích hoạt tài khoản <a href='{$link_active}'>{$link_active}</a></p>
            <p>Nếu không phải bạn đăng kí tài khoản thì vui lòng bỏ qua email này.</p>
            <p>Team Support Đặng Đức Ba</p>
            ";
            $notify_email=send_mail('badang0509@gmail.com','Đức Ba Đặng','Kích hoạt tài khoản Php Master',$content);
            $error['account']=$notify_email;
        } else {
            $error['account'] = "Tên đăng nhập hoặc email đã tồn tại";
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
    <title>trang đăng kí</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/register.css">
</head>

<body>
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
    <div id="wp-form-reg">
    
        <h1>Đăng kí tài khoản</h1>
        <form action="" id="form-reg" method='post'>
            <input type="text" name="fullname" id="fullname" value="<?php echo set_value('fullname');  ?>" placeholder="fullname">
            <?php echo form_error('fullname');  ?>

            <input type="email" name='email' value="<?php echo set_value('email'); ?>" id="email" placeholder="email">
            <?php echo form_error('email'); ?>

            <input type="text" name="username" id="username" value="<?php echo set_value('username');  ?>" placeholder="username">
            <?php echo form_error('username');  ?>

            <input type="password" name="password" id="password" placeholder="password">
            <?php echo form_error('password');  ?>

            <input type="submit" id="reg" name="btn-reg" value="Đăng kí">
            <?php echo form_error('account');  ?>
        </form>
        <a href="?mod=users&action=login" name='login' id='login'>Đăng nhập</a>
    </div>
</body>

</html>