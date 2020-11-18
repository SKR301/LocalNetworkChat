<?php

function checkResponse($response){
    if($response->status==301||$response->status==203){
        exit($response->msg);
    }
}

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

function callGetUserFromId($userId){
    $url = "http://localhost/LocalNetworkChat/api/getUserFromId.php";
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

function callGetUserFromName($userName){
    $url = "http://localhost/LocalNetworkChat/api/getUserFromName.php";
    $data = array('userName'=>$userName);
    
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

function callGetCompanions($userId){
    $url = "http://localhost/LocalNetworkChat/api/getCompanions.php";
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

function callGetChats($myUserId,$companionUserId){
    $url = "http://localhost/LocalNetworkChat/api/getChats.php";
    $data = array('myUserId'=>$myUserId, 'companionUserId'=>$companionUserId);
    
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

function callSendMsg($myUserId,$companionUserId,$msg){
    $url = "http://localhost/LocalNetworkChat/api/sendMsg.php";
    $data = array('fromId'=>$myUserId, 'toId'=>$companionUserId, 'msg'=>$msg);
    
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