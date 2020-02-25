<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $type = 'org';
	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($email) || empty($pwd)) {
		header ("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first)) {
			header ("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header ("Location: ../signup.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE org_name='$first'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header ("Location: ../signup.php?signup=nametaken");
					exit();
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users ( org_name, user_type, user_email, user_pwd) VALUES ('$first', '$type', '$email', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header ("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}


} else {
	header ("Location: ../signup.php");
	exit();
}