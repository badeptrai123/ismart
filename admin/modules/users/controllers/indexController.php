<?php
function construct(){
    // echo "Load dau tien";
    load_model('index');
    load('lib','validation');
}
function info_accountAction(){
    load_view('info_account');
}
function change_passAction(){
    load_view('change_pass');
}
function updateAction(){
    load_view('update');
}
function loginAction(){
    load_view('login');
}
function logoutAction(){
    load_view('logout');
}