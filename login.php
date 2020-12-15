<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
	session_start();
	require_once "Dbcon.php";
	require_once "User.php";
	$db = new Dbcon();
	$user = new User();

	if (isset($_SESSION['userdata'])) {
		if ($_SESSION['userdata']['is_admin'] == '1') {
			header('location:admin/index.php');
		} else if ($_SESSION['userdata']['is_admin'] == '0') {
			header('location:index.php');
		}
	}

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$rows = $user->login($email, $password, $db->conn);

		foreach ($rows as $row) {
	
			if ($row['active'] == 1 && $row['is_admin'] == 0) {
				
				$_SESSION['userdata'] = array('id'=>$row['id'], 'email'=>$row['email'], 'name'=>$row['name'],
				'mobile'=>$row['mobile'], 'email_approved'=>$row['email_approved'], 
				'phone_approved'=>$row['phone_approved'],'active'=>$row['active'],
				 'is_admin'=>$row['is_admin'], 'sign_up_date'=>$row['sign_up_date'],
				 'security_question'=>$row['security_question'], 'security_answer'=>$row['security_answer']);

				 header('location: index.php');
	
			} else if ($row['active'] == 1 && $row['is_admin'] == 1){
				
				$_SESSION['userdata'] = array('id'=>$row['id'],
				'email'=>$row['email'], 'name'=>$row['name'],
				'mobile'=>$row['mobile'], 'email_approved'=>$row['email_approved'], 
				'phone_approved'=>$row['phone_approved'],'active'=>$row['active'],
				 'is_admin'=>$row['is_admin'], 'sign_up_date'=>$row['sign_up_date'],
				 'security_question'=>$row['security_question'], 'security_answer'=>$row['security_answer']);
	
				header('location: admin/');
				
			} else if ($row['active'] == 0){	
				$_SESSION['verify'] = array('id'=>$row['id'], 'name'=>$row['name'],
				'email'=>$row['email'], 'mobile'=>$row['mobile'], 'email_approved'=>$row['email_approved'], 
				'phone_approved'=>$row['phone_approved'],'active'=>$row['active']);

				header('Location: verification.php');
			}
		}
		if ($rows->num_rows == 0){
			echo '<script> alert("Invalid Login Details")</script>';
		}
	}
	include 'header.php';
?>
		<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form action="login.php" method="POST">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name="email" required> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password" name="password" required> 
									  </div>
									  <a class="forgot" href="#">Forgot Your Password?</a>
									  <input type="submit" name="submit" value="Login">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
			<?php include "footer.php"; ?>		
</body>
</html>