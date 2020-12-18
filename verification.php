<?php 
	session_start();
	require_once "Dbcon.php";
	require_once "User.php";
	$db = new Dbcon();
	$user = new User();
	require "vendor/autoload.php";
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	if (isset($_SESSION['userdata'])) {
		if ($_SESSION['userdata']['is_admin'] == '1') {
			header('location: admin/index.php');
		} else {
			header('location:index.php');
		}
	} 
	if (!isset($_SESSION['verify'])) {
		header('location:index.php');
	}
	include('header.php');

	if (isset($_POST['submit'])) {
		$_SESSION['mobile']=$_POST['number'];
		$number= $_POST['number'];
		
		$otp = rand(100000, 999999);
		$_SESSION['session_otp'] = $otp;
		$message = rawurlencode("Your One Time Password is ".$otp);
		$fields = array(
			"sender_id" => "FSTSMS",
			"message" => ".$message.",
			"language" => "english",
			"route" => "p",
			"numbers" => "$number",
			"flash" => "1"
		);
	
		$curl = curl_init();
	
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($fields),
			CURLOPT_HTTPHEADER => array(
				"authorization: hmB9Qpj8ACTMuEeqk4sDPwFZRUtcGL2lb5dSJyN7v0YzKa63oIxRaiqAkPDtQ3uHz28mJbgyVCTEplfs",
				"accept: */*",
				"cache-control: no-cache",
				"content-type: application/json"
			),
		));
	
		$response = curl_exec($curl);
		$err = curl_error($curl);
	
		curl_close($curl);
	
		if ($err) {
		
		} else {
		
		} 
		
	}

	if (isset($_POST['verify'])) {
		$number= $_POST['otp'];
		if ($_SESSION['session_otp']==$number) {
			$id = $_SESSION['verify']['id'];
			$user->updateuser($id, $db->conn);
			
		} else {
			echo "<script type='text/javascript'>alert('OTP Dosen't Match');</script>";
			unset($_SESSION['mobile']);
		}
	}

	if (isset($_POST['verify_email'])) {
		$email_verify = $_POST['email_verify'];
		if (isset($_SESSION['verify'])) {
			$id = $_SESSION['verify']['id'];
			$name = $_SESSION['verify']['name'];
			$email = $_SESSION['verify']['email'];
		}
		$encrypt_id = (($id*123456789*5678)/956783);
		if ($email != $email_verify) {
			$msg = "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
			$msgType = "danger";
		} else{
			$link = "http://localhost/training/CedHosting/activate.php?id=".urlencode(base64_encode($encrypt_id));
			$mail_body = "<p>Hi ".$name.",</p>
			<p>Thanks for Registration.</p>
			<p><a style='background:#0087ff;color:white;padding:5px;text-decoration:none;' href='".$link."'>CLICK TO ACTIVATE YOUR ACCOUNT</a></p>";
		
			$robo = '#email'; // email
			$developmentMode = true;
			$mailer = new PHPMailer($developmentMode);
			try {
				$mailer->SMTPDebug = 0;
				$mailer->isSMTP();
				if ($developmentMode) {
				$mailer->SMTPOptions = [
					'ssl'=> [
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					]
				];
				}
				$mailer->Host = 'ssl://smtp.gmail.com';
				$mailer->SMTPAuth = true;
				$mailer->Username = '#email'; //email
				$mailer->Password = '#password'; //password
				$mailer->SMTPSecure = 'tls';
				$mailer->Port = 465;
				$mailer->setfrom('#email', '#name'); //email
				$mailer->addAddress($email, $name);
				$mailer->isHTML(true);
				$mailer->Subject = 'Email Verifcation';
				$mailer->Body = $mail_body;
				$mailer->send();
				$mailer->ClearAllRecipients();
				$msg = "MAIL HAS BEEN SENT SUCCESSFULLY TO YOUR EMAIL ID";
				$msgType = "success";
			} catch (Exception $e) {
				$msg = "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
				$msgType = "danger";
			}
		}
	} 
	

?>
		<!---login--->
		<div class="content">
			<!-- registration -->
				<div class="main-1 about-section verify">
					<div class="container">
						<h2>Verify Your Account</h2>
						<p>Please verify your account by either approving your email id or your contact number.</p>
						
						
						<div class="row mb-4">
							<div class="col-lg-6 col-sm-12">
								<form method="post" class="d-inline">
									<input type="email" name="email_verify" pattern="^(?!\s)[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$" value="<?php echo $_SESSION['verify']['email']?>" placeholder="Enter your email address" disabled/>
									<input type="hidden" name="email_verify" value="<?php echo $_SESSION['verify']['email'];?>">
									<button type="submit" name="verify_email" class="acount-btn" >Verify Your Email</button>
								</form>
							</div>
							<div class="col-lg-6 col-sm-12">
							<form action="verification.php" method="POST" class="login-form" >
                
								<div class="form-input-material">
									<input type="number" name="number" id="mobile" maxlength = "10" minlength = "10" value="<?php echo $_SESSION['verify']['mobile']?>" placeholder="Please Enter your Mobile Number" autocomplete="off" disabled />
									<input type="hidden" name="number" value="<?php echo $_SESSION['verify']['mobile'];?>">
									<button type="submit" name="submit" id="sign-up" class="acount-btn">Verify Your Mobile</button>
								</div>
								
								<div id="val" class="pt-3 cyan-text">
								
							</form>
							<?php if (isset($_POST['submit'])) {?>
							<form action="verification.php" method="POST" class="login-form1" >
								<p>
									<h3><sign-up>Enter OTP HERE</sign-up></h3>
								</p>
								<div class="form-input-material">
										<input type="number" name="otp" id="mobile" maxlength = "10" minlength = "10" placeholder="OTP" autocomplete="off"  />
										<button type="submit" name="verify" id="sign-up" class="acount-btn">Enter OTP</button>
								</div>
								
							</form> 
							<?php } ?>
							</div>
						</div>
						<br/><br/>
					</div>
				</div>
			
			<!-- registration -->

		</div>
		<style>
			.verify {
				font-size:16px;
				text-align:center;
			}
			.verify p {
				margin-top:20px;
				margin-bottom: 40px;
			}
			.verify button {
				margin-right:10px;
				border:none;
			}
			.d-inline {
				display: inline!important;
			}
		</style>
		<?php include('footer.php'); ?>

