<?php
function getUser($con,$userId){
	$sql="SELECT * FROM users WHERE id='$userId'";
	$query=mysqli_query($con,$sql);

	if($query){
		if(mysqli_num_rows($query)){
			$row=mysqli_fetch_assoc($query);
			return $row['name'];
		}
	}
}
