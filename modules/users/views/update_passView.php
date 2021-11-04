
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

        <h1>Cập nhật mật khẩu</h1>
        <form action="" id="form-reg" method='post'>
            <input type="password" name="password" id="password" placeholder="password">
            <?php echo form_error('password');  ?>
            <input type="submit" id="update_new_pass" name="btn-update" value="Lưu">
            <?php echo form_error('account');  ?>
        </form>
        <a href="?mod=users&action=login" name='login' id='login'>Đăng nhập</a>
        <a href="?mod=users&action=register" id="creat-account">Đăng kí</a>
    </div>
</body>

</html>