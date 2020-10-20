<!DOCTYPE html>
<html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<link rel="shortcut icon" href="#">
	<title>Local Chat</title>
</head>
<body>
	<?php
		require "./api/callApi.php";

		session_start();
		$userId=$_SESSION['userId'];

		$response=callGetUser($userId);
		$status=$response->status;
		$msg=$response->msg;

		$userName='';
		if($status==301){
			echo $msg;
		}
		if($status==203){
			echo $msg;
		}
		if($status==200){
			$userName=$response->user->name;
		}

		echo $userName.'<br><br><br>';

		$response=callGetChats($userId);
		$status=$response->status;
		$msg=$response->msg;

		if($status==301){
			echo $msg;
		}
		if($status==203){
			echo $msg;
		}
		if($status==201){
			echo $msg;
		}
		if($status==200){
			$companions=$response->companions;
			
			echo '<form action="dashboard.php" method="GET">';
			foreach ($companions as $companion) {
				echo '<div style="border-style: solid; padding:5px;">';
				echo 	''.$companion->name.'';
				echo 	'<input type="submit" name="viewChatsBtn" value="View Chats">';
				echo 	'<input type="hidden" name="chatId" value='.$companion->id.'>';
				echo '</div>';
				echo '<br>';
			}
			echo '</form>';

			if(isset($_GET['viewChatsBtn'])){
				echo $_SESSION['userId'];
				echo $_GET['chatId'];
			}
		}
	?>
</body>
</html>