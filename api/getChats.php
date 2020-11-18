<?php
require "connect.php";
require "common.php";

$myUserId=$_POST['myUserId'];
$companionUserId = $_POST['companionUserId'];

if($myUserId==''|| $companionUserId==''){
	echo json_encode(array('status'=>203, 'msg'=>'Empty Fields'));
	return;
}

$sql="SELECT * FROM messages WHERE (toId='$myUserId' AND fromId='$companionUserId') OR (fromId='$myUserId' AND toId='$companionUserId') ORDER BY id DESC";
$query=mysqli_query($con,$sql);

if($query){
	if(mysqli_num_rows($query)){
		$chats=[];
		while($row=mysqli_fetch_assoc($query)){
			$chats[]=$row;
		}

		echo json_encode(array('status'=>200, 'msg'=>'Chats extracted', 'chats'=>$chats));
		return;
	}else{
		echo json_encode(array('status'=>203, 'msg'=>'No Chats', 'chats'=>null));
		return;
	}
}else{
	echo json_encode(array('status'=>301, 'msg'=>'SERVER ERROR'));
	return;
}