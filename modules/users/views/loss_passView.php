<?php
session_start();
global $email, $username, $password, $error, $fullname;

if (isset($_POST['btn-restore'])) {
    $error = array();

    if (empty($_POST['email'])) {
        $error['email'] = "Email không được để trống";
    } else {
        if (is_email($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $error['email'] = "Email không đúng định dạng";
        }
    }
    if (empty($error)) {
        if (email_exist($email)) {
            $reset_pass_token=md5($email.time());
            $data = array(
                'reset_pass_token'=>$reset_pass_token
            );
            insert_pass_token($email,$data);
            $link_reset=base_url("?mod=users&action=reset&reset_pass_token={$reset_pass_token}");
            $content="
            <p>Bạn vui lòng kích vào link này để cập nhật mật khẩu mới <a href='{$link_reset}'>{$link_reset}</a></p>
            <p>Nếu không phải bạn yeu cau thì vui lòng bỏ qua email này.</p>
            <p>Team Support Đặng Đức Ba</p>
            ";
            $notify_email=send_mail('badang0509@gmail.com','Đức Ba Đặng','Cap nhat mat khau',$content);
            $error['account']=$notify_email;
        } else {
            $error['account'] = "Email không tồn tại trong hệ thống";
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
    
        <h1>Khôi phục mật khẩu</h1>
        <form action="" id="form-reg" method='post'>
            <input type="email" name='email' value="<?php echo set_value('email'); ?>" id="email" placeholder="email">
            <?php echo form_error('email'); ?>
            <input type="submit" id="restore" name="btn-restore" value="Gửi yêu cầu">
            <?php echo form_error('account');  ?>
        </form>
        <a href="?mod=users&action=login" name='login' id='login'>Đăng nhập</a>
        <a href="?mod=users&action=register" id="creat-account">Đăng kí</a>
    </div>
</body>

</html>