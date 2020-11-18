<?php
	require 'api/callApi.php';

	include 'front/req_header.php';
	include 'front/temp_header.php';
	include 'front/form_login.php';
	include 'front/temp_footer.php';

	if(isset($_POST['loginBtn'])){
		$username = $_POST['username'];
		$response=callLogin($username);

		checkResponse($response);

		if($response->status==201){
			$response=callRegister($username);
			checkResponse($response);
		}
		
		$myUserId=$response->userId;
		$response=callGetUserFromId($myUserId);

		checkResponse($response);

		session_start();
		$_SESSION['myUserId']=$response->user->id;
		$_SESSION['myName']=$response->user->name;

		header('Location: '.'/LocalNetworkChat/dashboard.php');
	}
?>