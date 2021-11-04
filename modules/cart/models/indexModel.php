<?php
function get_list_users(){
    $list_user=db_fetch_array("SELECT * FROM `tbl_users`");
    return $list_user;
}
function get_user_by_id($id){
    $item=db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id`={$id}");
    return $item;

}