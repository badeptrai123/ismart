<?php
function construct()
{
    
}
function indexAction()
{
}

function category_productAction()
{
    load_view('category_product');
}
function detail_productAction()
{
    load('lib','product');
    load_view('detail_product');
}
