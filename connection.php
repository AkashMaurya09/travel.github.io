<?php
	
	$con=mysqli_connect('localhost','root','','usersystem');
	if (!$con) 
	{
		die('Connection Error'.mysqli_error());
	}
?>