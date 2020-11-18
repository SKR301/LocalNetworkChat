<div class="mt-5">
	<p class="pl-5 display-3"> 
		<?php 
			echo $_SESSION['companionName'];
		?>
	</p>
	<div class="mt-5 p-3 border rounded border-success w-75 mx-auto">
		<div class="" style="width: 100%; height: 1000px; overflow-x: hidden; overflow-y: auto;">
			<?php
				$response=callGetChats($_SESSION['myUserId'],$_SESSION['companionUserId']);
				checkResponse($response);

				foreach ($response->chats as $chat) {
					if($chat->fromId==$_SESSION['myUserId']){
						include 'front/temp_viewChat_myChat.php';
					}else{
						include 'front/temp_viewChat_companionChat.php';
					}
				}
			?>
		</div>
	</div>
</div>