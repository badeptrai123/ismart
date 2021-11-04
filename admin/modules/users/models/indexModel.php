<?php
function update_new_pass($username,$data){
    return db_update("tbl_users",$data,"`username`='{$username}'");
}
function check_pass_old($password_old){
    $row=db_num_rows("SELECT * FROM `tbl_users` WHERE `password`='{$password_old}'");
    if ($row > 0) {
        return true;
    }
    return false;
}
function update_info($data,$username){
    return db_update('tbl_users',$data,"`username`='{$username}'");
}
function get_user_by_username($username){
    $user = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username`='{$username}'");
    return $user;
}
function update_pass($data,$reset_pass_token){
    return db_update('tbl_users',$data,"`reset_pass_token`='{$reset_pass_token}'");
}
function check_pass_token($reset_pass_token){
    $row = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_pass_token`='{$reset_pass_token}'");
    if ($row > 0) {
        return true;
    }
    return false;
}
function insert_pass_token($email,$data){
    return db_update('tbl_users',$data,"`email`='{$email}'");
}
function add_user($data)
{
    return db_insert('tbl_users', $data);
}
function email_exist($email)
{
    $row = db_num_rows("SELECT * FROM `tbl_users` WHERE `email`='{$email}'");
    if ($row > 0) {
        return true;
    }
    return false;
}
function user_exist($username, $email)
{
    $row = db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' OR `email`='{$email}'");
    if ($row > 0) {
        return true;
    }
    return false;
}
function active_users($active_token)
{
    return db_update('tbl_users', array('is_active' => '1'), "`active_token`='{$active_token}'");
}
function check_active_token($active_token){
    $row = db_num_rows("SELECT * FROM `tbl_users` WHERE `active_token`='{$active_token}' AND `is_active`='0'");
    if ($row > 0) {
        return true;
    }
    return false;
}

function get_list_users()
{
    $list_user = db_fetch_array("SELECT * FROM `tbl_users`");
    return $list_user;
}
function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id`={$id}");
    return $item;
}
