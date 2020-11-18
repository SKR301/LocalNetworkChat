<?php
	require 'api/callApi.php';

	include 'front/req_header.php';
	include 'front/temp_header.php';

	session_start();
	$_SESSION['companionName']='';
	$_SESSION['companionUserId']='';

	if(sizeof($_SESSION)==0){
		header('Location: '.'/LocalNetworkChat');
	}
	$response=callGetCompanions($_SESSION['myUserId']);
	checkResponse($response);

	include 'front/temp_dashboard_main.php';
	include 'front/temp_newChat.php';
	include 'front/temp_footer.php';

	if(isset($_POST['sendBtn'])){
		$response=callGetUserFromName($_POST['companionUserName']);
		checkResponse($response);
		$response=callSendMsg($_SESSION['myUserId'],$response->user->id,$_POST['msg']);
		checkResponse($response);
		header('Location: '.'/LocalNetworkChat/dashboard.php');
	}
