<?php
function construct(){
    load_model('index');
}
function indexAction(){
   load_view('index');
}
function addAction(){
    echo "Them du lieu";
}
function editAction(){
    
}
function updateAction(){
    $id=$_POST['id'];
    echo $id;
}