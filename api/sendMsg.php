<?php
require "connect.php";

$fromId=$_POST['fromId'];
$toId=$_POST['toId'];
$msg=$_POST['msg'];

if($fromId==''||$toId==''||$msg==''){
	echo json_encode(array('status'=>203, 'msg'=>'Empty Fields'));
	return;
}

$sql="INSERT INTO messages(fromId,toId,msg) VALUES('$fromId', '$toId', '$msg')";
$query=mysqli_query($con,$sql);
if($query){
	echo json_encode(array('status'=>200,'msg'=>'Message Sent'));
	return;
}else{
	echo json_encode(array('status'=>203,'msg'=>'Couldn\'t send message'));
	return;
}
