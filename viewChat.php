<?php
	require 'api/callApi.php';

	include 'front/req_header.php';
	include 'front/temp_header.php';

	session_start();
	if(sizeof($_SESSION)==0){
		header('Location: '.'/LocalNetworkChat');
	}
	$_SESSION['companionUserId']=$_GET['companionId'];
	$response=callGetUserFromId($_SESSION['companionUserId']);
	checkResponse($response);
	$_SESSION['companionName']=$response->user->name;

	include 'front/temp_viewChat_main.php';
	include 'front/temp_newChat.php';

	if(isset($_POST['sendBtn'])){
		$response=callSendMsg($_SESSION['myUserId'],$_SESSION['companionUserId'],$_POST['msg']);
		checkResponse($response);
		echo json_encode($response);
		
		header('Location: '.'/LocalNetworkChat/viewChat.php?companionId='.$_SESSION['companionUserId']);
	}


