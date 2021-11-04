<?php
session_start();
$reset_pass_token = $_GET['reset_pass_token'];
if (check_pass_token($reset_pass_token)) {
    load_view('update_pass');
    global $password, $error;
    if (isset($_POST['btn-update'])) {
        $error = array();

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
            $data = array(
                'password' => md5($password)
            );
            update_pass($data, $reset_pass_token);
            redirect_to("?mod=users&action=reset_success");
        }
    }
} else {
    echo "Yêu cầu lấy lại mật khẩu không hợp lệ. Quay về trang đăng nhập <a href='?mod=users&action=login'>Đăng nhập</a>";
}
