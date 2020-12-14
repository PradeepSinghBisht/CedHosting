<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
	require_once "Dbcon.php";
	require_once "User.php";
	$db = new Dbcon();
	$user = new User();
	include "header.php"; 

	if (isset($_POST['signup'])) {
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$security = $_POST['security'];
		$answer = $_POST['answer'];
		$password = md5($_POST['password']);
		$confirmpassword = md5($_POST['confirmpassword']);

		$sql = $user->signup($name, $mobile, $email, $security, $answer, $password, $confirmpassword, $db->conn);

	}
?>
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
				<form action="account.php" method="POST">
					<div class="register-top-grid">
						<h3>personal information</h3>
						<div>
							<span>Full Name<label>*</label></span>
							<input type="text" name='name' maxlength="32"
								title="First name contain letter only without space and special character"
								pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" id='fname'
								placeholder="Firstname" required>
						</div>
						<div>
							<span>Phone Number<label>*</label></span>
							<input type="text" name='mobile'
								pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$"
								title="if 0 then it will be 11 digit else 10 digit"
								placeholder="mobile Number must be 10 digit" required>
						</div>
						<div>
							<span>Email Address<label>*</label></span>
							<input type="text" name='email'
								pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$"
								title="valid@email.com" placeholder="valid@mail.com" required>


						</div>
						<select name="security" style='margin-top:35px;padding:5px;' required>
							<option>Select Your Security Question</option>
							<option value="What Was The First Book You Ever Read">What is you nick name?
							</option>
							<option value="What is Your Best Friend Name">What is Your Pet name?</option>
							<option value="What is Your Dream Job">What is Your Best friend name?</option>
							<option value="Your Favorite Food">Your Favorite Book?</option>
							<option value="Your Favorite Movie">Your Favorite Movie?</option>
							<input type="text" name='answer' maxlength="32"
								pattern='^([A-Za-z0-9]+ )+[A-Za-z0-9]+$|^[A-Za-z0-9]+$'
								style='width:270px;margin:10px;' required>

						</select>

						<div class="clearfix"> </div>

						<a class="news-letter" href="#">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i>
								</i>Sign Up for Newsletter</label>
						</a>
					</div>
					<div class="register-bottom-grid">
						<h3>login information</h3>
						<div>

							<span>Password<label>*</label></span>
							<input type="password" name='password'
								pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$"
								required>
							<small id="passwordHelpBlock" class="form-text text-muted">
								Your password must be 8-20 characters long, contain letters and numbers, and
								must not contain spaces, special characters, or emoji.
							</small>
						</div>
						<div>
							<span>Confirm Password<label>*</label></span>
							<input type="password" name='confirmpassword'
								pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$"
								required>
							<small id="passwordHelpBlock" class="form-text text-muted">
								Your password must be 8-20 characters long, contain letters and numbers, and
								must not contain spaces, special characters, or emoji.
							</small>
						</div>
					</div>
				
				<div class="clearfix"> </div>
				<div class="register-but">

					<input type="submit" name='signup' value="Submit">
					<div class="clearfix"> </div>
				</div>
				</form>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
<?php include "footer.php"; ?>
</body>
</html>