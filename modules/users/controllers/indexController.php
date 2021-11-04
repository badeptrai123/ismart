<?php
function construct(){
    // echo "Load dau tien";
    load_model('index');
    load('lib','validation');
}
function indexAction(){
    $list_users=get_list_users();
    // show_array($list_users);
    $data['list_users']=$list_users;
    load_view('index',$data);
}
function registerAction(){
    load('lib','email');
 
    load_view('register');
}
function loginAction(){
    load_view('login');
}
function logoutAction(){
    load_view('logout');
} 
function activeAction(){
    load_view('active');
}
function loss_passAction(){
    load('lib','email');
    load_view('loss_pass');
}
function resetAction(){
    load_view('reset');
}
function reset_successAction(){
    load_view('reset_success');
}
function update_passAction(){
    load_view('update_pass');
}
function editAction(){
    $id=(int)$_GET['id'];
    $item=get_user_by_id($id);
    show_array($item);
}