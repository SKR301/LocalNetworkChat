<?php
require "connect.php";
require "common.php";

$userId=$_POST['userId'];

if($userId==''){
	echo json_encode(array('status'=>203, 'msg'=>'Empty Fields'));
	return;
}

$sql="SELECT * FROM messages WHERE toId='$userId' OR fromId='$userId' ORDER BY messages.time DESC";
$query=mysqli_query($con,$sql);

if($query){
	if(mysqli_num_rows($query)){
		$companionIds=[];
		$companions=[];
		while($row=mysqli_fetch_assoc($query)){
			$companionIds[]=($row['toId']==$userId)?$row['fromId']:$row['toId'];
		}

		$companionIds=array_unique($companionIds);

		foreach ($companionIds as $companionId) {
			$companion['id']=$companionId;
			$companion['name']=getUser($con,$companionId);
			$companions[]=$companion;
		}

		echo json_encode(array('status'=>200, 'msg'=>'Chat Companions extracted', 'companions'=>$companions));
		return;
	}else{
		echo json_encode(array('status'=>201, 'msg'=>'No Chat Companion', 'companions'=>null));
		return;
	}
}else{
	echo json_encode(array('status'=>301, 'msg'=>'SERVER ERROR'));
	return;
}