<?php
function is_username($username){
    $pattern="/^[A-Za-z0-9_\.]{6,32}$/";
    if(preg_match($pattern,$username,$maths)){
        return true;
    }
}

function is_password($password){
    $pattern="/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/";
    if(preg_match($pattern,$password,$maths)){
        return true;
    }
}
function form_error($label_field){
    global $error;
    if(!empty($error[$label_field])){
        return "<p class='error'>{$error[$label_field]}</p>";
    }
}
function set_value($label_field){
    global $$label_field;
    if (!empty($$label_field)) return $$label_field;
}

#. is_email
function is_email($email)
{
    $pattern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (preg_match($pattern, $email)){
        return true;
    }
}

?>