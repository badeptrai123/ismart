<?php

use Aws\GlobalAccelerator\GlobalAcceleratorClient;

function check_login($username,$password){
    $md5_password=md5($password);
   $row=db_fetch_row("SELECT *FROM `tbl_users` WHERE `username`='{$username}' AND `password`='{$md5_password}'");
   if($row>0){
       return true;
   }
   return false;
}
function is_login(){
    if(isset($_SESSION['is_login'])){
        return true;
    }
    return false;
}
function user_login(){
    if(!empty($_SESSION['user_login'])){
        return $_SESSION['user_login'];
    }
    return false;
}
function info_user($filed='username'){
    if(isset($_SESSION['is_login'])){
        $mysqli_result = db_query("SELECT * FROM `tbl_users`");
        while ($row = mysqli_fetch_assoc($mysqli_result)) {
            if($_SESSION['user_login']==$row['username']){
                if(array_key_exists($filed,$row)){
                    return $row[$filed];
                }
            }
        }
    }
    return false;
}
