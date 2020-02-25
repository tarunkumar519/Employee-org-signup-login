<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee signup</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header id="header" class="">
		<nav>
			<div class="main-wrapper">
				<ul>
					<li><a href="https://fsocietyservices.xyz/internshipnew/index.php" style="color:white"title="Home page">Home</a></li>
				</ul>
				<div class="nav-login">
					<?php
						if (isset($_SESSION['org_id'])) {
							echo '<form action="includes/logout.inc.php" method="POST">
								<button type="submit" name = "submit">Logout</button>
								</form>';
						}
					?>
				</div>
			</div>
		</nav>
	</header>