<?php 
	include_once 'header.php';
 ?>
     <section class="main-container">
		<div class="main-wrapper">
			<h2>Employee Signup</h2>
            <?php
             if (isset($_GET['signup'])){
                if ($_GET['signup'] == "empty") {
                  echo '<p style="color:red;text-align:center">Fill in all fields!</p>';
                }
                 else if ($_GET['signup'] == "email") {
                  echo '<p style="color:red;text-align:center">Enter a valid email!</p>';
                 }
              }
             if ($_GET["signup"] == "success")  {
                  echo '<p style="color:green;text-align:center">Signup success!</p>';
              }
            ?>
			<form class="signup-form" action="includes/signup.inc.php" method="POST">
            <?php
            $mysqli = NEW MYSQLi('sql110.byetcluster.com', 'epiz_24189730', 'AarWC1qF0J', 'epiz_24189730_userregistration');
            $resultSet = $mysqli->query("SELECT org_name FROM users");
            ?>
            &nbsp&nbsp&nbsp<select name="users">
            <?php
            while($rows = $resultSet->fetch_assoc())
            {
                $org_name = $rows['org_name'];
                echo "<option value='$org_name'>$org_name</option>";
            }
            ?>
            </select>
                <input type="text" name="user_email" placeholder="E-mail">
				<input type="password" name="user_pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password" >
                <button type="submit" name="submit">Sign up</button>
			</form>
            <?php
             if (isset($_GET['newpwd'])){
                if ($_GET['newpwd'] == "passwordupdated") {
                  echo '<p style="color:green;text-align:center">Your password has benn reset!</p>';
                } 
             }
             ?>
            </br></br><a href="https://fsocietyservices.xyz/internshipnew/organization/login.php" style="color:black; line-height: 100%;text-align: center;text-decoration: none;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;">Already have an account? Login</a>
		</div>
        </div>
	</section>

<?php 
	include_once 'footer.php';
?>
