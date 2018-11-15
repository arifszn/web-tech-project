<?php
	
	// CONNECT
	$con = mysqli_connect('127.0.0.1', 'root', '');
	if($con == null)
	{
		die('error connecting database');
	}
	mysqli_select_db($con, 'onlineeducationsystem');
?>