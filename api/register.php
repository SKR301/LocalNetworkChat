<?php
require "connect.php";

$name=$_POST['name'];

if($name==''){
	echo json_encode(array('status'=>203, 'msg'=>'Empty Fields'));
	return;
}

$sql="INSERT INTO users(name) VALUES('$name')";
$query=mysqli_query($con,$sql);
if($query){
	$userId=mysqli_insert_id($con);
	echo json_encode(array('status'=>200,'msg'=>'User Registered', 'userId'=>$userId));
	return;
}else{
	echo json_encode(array('status'=>301,'msg'=>'SERVER ERROR'));
	return;
}