<?php
$active_token=$_GET['active_token'];
$link_login=base_url("?mod=users&action=login");
if(check_active_token($active_token)){
    active_users($active_token);
    echo "Bạn đã kích hoạt thành công.Nhấn vào link này để đăng nhập <a href='{$link_login}'>Đăng nhập</a>";
}
else{
    echo "Kích hoạt không hợp lệ hoặc tài khoản đã được kích hoạt.Nhấn vào link này để đăng nhập <a href='{$link_login}'>Đăng nhập</a>";
}