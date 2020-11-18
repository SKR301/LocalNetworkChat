<div class="mt-5">
	<p class="pl-5 display-3">Welcome 
		<?php 
			echo $_SESSION['myName'];
		?>
	</p>
	<div class="mt-5 p-3 border rounded border-success w-75 mx-auto">
		<?php
			if($response->status==201){
				echo "NO CHATS</div>";
				return ;
			}else{
		?>
		<div class="" style="width: 100%; height: 750px; overflow-x: hidden; overflow-y: auto;">
			<?php
				foreach ($response->companions as $companion) {
						include 'front/temp_companions.php';
					}
				}
			?>
		</div>
	</div>
</div>