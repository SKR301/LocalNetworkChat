<?php

function callLogin($name){
    $url = "http://localhost/LocalNetworkChat/api/login.php";
    $data = array('name'=>$name);
    
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);


    return json_decode($result);
}

function callRegister($name){
    $url = "http://localhost/LocalNetworkChat/api/register.php";
    $data = array('name'=>$name);
    
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);


    return json_decode($result);
}

function callGetUser($userId){
    $url = "http://localhost/LocalNetworkChat/api/getUser.php";
    $data = array('userId'=>$userId);
    
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);


    return json_decode($result);
}

function callGetChats($userId){
    $url = "http://localhost/LocalNetworkChat/api/getChats.php";
    $data = array('userId'=>$userId);
    
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);


    return json_decode($result);
}