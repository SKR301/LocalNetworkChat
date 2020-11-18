<form action="" method="POST">
	<?php
		if($_SESSION['companionUserId']==''){
			echo '<div class="input-group mt-5 w-75 mx-auto">';
			echo	'<input style="font-size: 50px;" type="text" class="form-control" name="companionUserName" id="companionUserName" placeholder="Recipient\'s name">';
			echo '</div>';
		}
	?>
	<div class="input-group mt-1 w-75 mx-auto">
	  <textarea style="font-size: 30px;" class="form-control" name="msg" id="msg" placeholder="Message..."></textarea>
	</div>
	<div class="input-group mt-2 w-75 mx-auto">
	  <button style="font-size: 50px; height: 75px; width: 75px;" class="btn btn-primary rounded-circle" id='sendBtn' name='sendBtn'> > </button>
	</div>
</form>