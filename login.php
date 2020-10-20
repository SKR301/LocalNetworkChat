<?php
require "./api/callApi.php";

$name=$_POST['name'];
if(!isset($_POST["submitBtn"])){
	header('Location: index.php');
}

$response=callLogin($name);
$status=$response->status;
$msg=$response->msg;

session_start();

if($status==301){
	echo $msg;
}
if($status==200){
	$userId=$response->userId;
	$_SESSION['userId']=$userId;
	header('Location: dashboard.php');
}
if($status==201){
	$response=callRegister($name);
	$status=$response->status;
	$msg=$response->msg;
	$userId=$response->userId;

	if($status==200){
		$_SESSION['userId']=$userId;
		header('Location: dashboard.php');
	}
	if($status==301){
		echo $msg;
	}
}
if($status==203){
	echo $msg;
}