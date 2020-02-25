<?php 

session_start();

if (isset($_POST['submit'])) {
	include 'dbh.inc.php';

	$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
	$user_pwd = mysqli_real_escape_string($conn, $_POST['user_pwd']);

	//Error handlers
	//Check if inputs are empty
	if (empty($user_email) || empty($user_pwd)) {
			header("Location: ../index.php?login=empty");
			exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_email='$user_email'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error1");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the paswrd
				$hashedPwdCheck = password_verify($user_pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error2");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['org_name'] = $row['org_name'];
					$_SESSION['user_email'] = $row['user_email'];
					header("Location: ../orghome.php");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error3");
	exit();
}