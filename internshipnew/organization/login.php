<?php 
	include_once 'header.php';
 ?>
     <section class="main-container">
		<div class="main-wrapper">
			<h2>LOGIN</h2>
			<form class="signup-form" action="includes/login.inc.php" method="POST">
            <input type="text" name="user_email" placeholder="e-mail">
            <input type="password" name="user_pwd" placeholder="password">
            <button type="submit" name="submit">Login</button>
            </form>
            </br></br>
            <p style="color:black; line-height: 100%;text-align: center;text-decoration: none;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;">Don't have an account?</p>
<div class="signup-form button ">
            <button onclick="window.location.href = 'https://fsocietyservices.xyz/internshipnew/organization/signup.php';">SignUp as Organization</button></br>
   <p style="color:black; line-height: 100%;text-align: center;text-decoration: none;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;">OR</p></br>
   <button  onclick="window.location.href = 'https://fsocietyservices.xyz/internshipnew/employee/signup.php';">SignUp as Employee</button>
		</div>
        </div>
        </div>
	</section>

<?php 
	include_once 'footer.php';
?>
