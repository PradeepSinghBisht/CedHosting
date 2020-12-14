<?php
	session_start();
	require_once "Dbcon.php";
	$db = new Dbcon();
    include 'header.php';
?>
    <div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
                                <h3>Email Verification</h3>
                                    <form action="verification.php" method="POST">
									  <div>
										<span>Email<label>*</label></span>
										<input type="text" name='email'
                                        pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$"
                                        title="valid@email.com" placeholder="valid@mail.com" required>
									  </div>
									  <input type="submit" name="submit" value="Verify">
									</form>
								</div>
								<div class="col-md-6 login-right">
									<h3>Email Verification</h3>
                                    <form action="verification.php" method="POST">
									  <div>
										<span>Email<label>*</label></span>
										<input type="text" name='email'
                                        pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$"
                                        title="valid@email.com" placeholder="valid@mail.com" required>
									  </div>
									  <input type="submit" name="submit" value="Verify">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>

    <?php include 'footer.php'; ?>
?>