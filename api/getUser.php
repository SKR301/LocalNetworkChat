<?php
require "connect.php";

$userId=$_POST['userId'];

if($userId==''){
	echo response(203,'userId cannot Be Empty');
	return;
}

$sql="SELECT * FROM users WHERE id='$userId'";
$query=mysqli_query($con,$sql);

if($query){
	if(mysqli_num_rows($query)==0){
		echo json_encode(array('status'=>203, 'msg'=>'No such User Found', 'user'=>null));
		return;
	}else{
		$row=mysqli_fetch_assoc($query);
		echo json_encode(array('status'=>200,'msg'=>'User details extracted', 'user'=>$row));
		return;
	}
}else{
	echo json_encode(array('status'=>301, 'msg'=>'SERVER ERROR'));
	return;
}
