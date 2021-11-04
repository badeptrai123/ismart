<?php

function base_url($url = "") {
    global $config;
    return $config['base_url'].$url;
}
function redirect_to($url=''){
    if(!empty($url)){
        global $config;
        $path=$config['base_url'].$url;
        header("location:{$path}");
    }
}
