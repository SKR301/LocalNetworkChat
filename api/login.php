<?php
require "connect.php";

$name=$_POST['name'];

if($name==''){
	echo response(203,'Name cannot Be Empty');
	return;
}

$sql="SELECT * FROM users WHERE name='$name'";
$query=mysqli_query($con,$sql);

if($query){
	if(mysqli_num_rows($query)==0){
		echo json_encode(array('status'=>201, 'msg'=>'New User', 'userId'=>null));
		return;
	}else{
		$row=mysqli_fetch_assoc($query);
		echo json_encode(array('status'=>200,'msg'=>'Existing User', 'userId'=>$row['id']));
		return;
	}
}else{
	echo json_encode(array('status'=>301, 'msg'=>'SERVER ERROR'));
	return;
}
