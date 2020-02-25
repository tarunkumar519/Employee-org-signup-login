<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';
    $org_name = mysqli_real_escape_string($mysqli, $_POST['org_name1']);
    $type = 'employee';
	$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
	$user_pwd = mysqli_real_escape_string($conn, $_POST['user_pwd']);
	//Error handlers
	//Check for empty fields
	if (empty($user_email) || empty($user_pwd)) {
		header ("Location: ../signup.php?signup=empty");
		exit();
	} else {
			//Check if email is valid
			if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
				header ("Location: ../signup.php?signup=email");
				exit();
			} else {
					//Hashing the password
					$hashedPwd = password_hash($user_pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (org_name, user_type, user_email, user_pwd) VALUES ('$org_name', $type', '$user_email', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header ("Location: ../signup.php?signup=success");
					exit();
				}
			}
		
}	 else {
	header ("Location: ../signup.php");
	exit();
}