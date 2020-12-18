
<?php 
	session_start();
	include_once 'Dbcon.php';
	include_once 'Product.php';
	$db = new Dbcon();
	$prod = new Product();

    if (isset($_SESSION['userdata'])) {
		if ($_SESSION['userdata']['is_admin'] == '1') {
			header('location:admin/index.php');
		} 
	}
	include 'header.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$rows = $prod->fetchcategory($id, $db->conn);
		$row = $rows->fetch_assoc();
	}

	if (isset($_GET['pid'])) {
		
		$pid = $_GET['pid'];
		$r = $prod->cartpage($pid, $db->conn);
		
		$cart = array('id'=>$r['id'], 'name'=>$r['prod_name'], 'category'=>$row['prod_name'], 'sku'=>$r['sku'], 'price'=>$r['mon_price'], 'billing'=>'Monthly');
		
		$_SESSION['cart'][$pid] = $cart;

		echo '<script>window.location.href="cart.php"</script>';
	}
?>

	<!---singleblog--->
	<div class="content">
		<?php echo $row['html'];?>
		<div class="tab-prices" id="product">
			<div class="container">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
						<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
						</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="linux-prices">
								<?php 
									$rows = $prod->catpage($id, $db->conn);
									foreach($rows as $row) {
										$data = json_decode($row['description']);

										echo '<div class="col-md-3 linux-price">
												
													<div class="linux-top">
														<h4>'.$row['prod_name'].'</h4>
													</div>
													<div class="linux-bottom">
														<h5> Rs. '.$row['mon_price'].' <span class="month">per month</span></h5>
														<h3> Rs. '.$row['annual_price'].' <span class="month">per Year</span></h3>
														<h6>'.$data->domain.' Domain</h6>
														<ul>
															<li><strong>'.$data->webspaces.'</strong> GB Disk Space</li>
															<li><strong>'.$data->bandwidth.'</strong> GB Data Transfer</li>
															<li><strong>'.$data->mailbox.'</strong> Email Accounts</li>
															<li><strong>'.$data->language.'</strong>  Language Support</li>
															<li><strong>location</strong> : <img src="images/india.png"></li>
														</ul>
													</div>
													
													<a href="catpage.php?id='.$id.'&pid='.$row['id'].'">buy now</a>
												
											</div>';
									}
								?>
								
								<div class="clearfix"></div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
							<div class="linux-prices">
								<!-- <div class="col-md-3 linux-price">
									<div class="linux-top us-top">
									<h4>Standard</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$259 <span class="month">per month</span></h5>
										<h6>Single Domain</h6>
										<ul>
										<li><strong>Unlimited</strong> Disk Space</li>
										<li><strong>Unlimited</strong> Data Transfer</li>
										<li><strong>Unlimited</strong> Email Accounts</li>
										<li><strong>Includes </strong>  Global CDN</li>
										<li><strong>High Performance</strong>  Servers</li>
										<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
									<h4>Advanced</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$359 <span class="month">per month</span></h5>
										<h6>2 Domains</h6>
										<ul>
										<li><strong>Unlimited</strong> Disk Space</li>
										<li><strong>Unlimited</strong> Data Transfer</li>
										<li><strong>Unlimited</strong> Email Accounts</li>
										<li><strong>Includes </strong>  Global CDN</li>
										<li><strong>High Performance</strong>  Servers</li>
										<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
									<h4>Business</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$539 <span class="month">per month</span></h5>
										<h6>3 Domains</h6>
										<ul>
										<li><strong>Unlimited</strong> Disk Space</li>
										<li><strong>Unlimited</strong> Data Transfer</li>
										<li><strong>Unlimited</strong> Email Accounts</li>
										<li><strong>Includes </strong>  Global CDN</li>
										<li><strong>High Performance</strong>  Servers</li>
										<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
									<h4>Pro</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$639 <span class="month">per month</span></h5>
										<h6>Unlimited Domains</h6>
										<ul>
										<li><strong>Unlimited</strong> Disk Space</li>
										<li><strong>Unlimited</strong> Data Transfer</li>
										<li><strong>Unlimited</strong> Email Accounts</li>
										<li><strong>Includes </strong>  Global CDN</li>
										<li><strong>High Performance</strong>  Servers</li>
										<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div> -->
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- clients -->
	<div class="clients">
		<div class="container">
			<h3>Some of our satisfied clients include...</h3>
			<ul>
				<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
				<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
				<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
				<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
				<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
				<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
			</ul>
		</div>
	</div>
<!-- clients -->
		<div class="whatdo">
			<div class="container">
				<h3>Features</h3>
				<div class="what-grids">
					<div class="col-md-4 what-grid">
						<div class="what-left">
						<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
						<i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
						<i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="what-grids">
					<div class="col-md-4 what-grid">
						<div class="what-left">
						<i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
						<i class="glyphicon glyphicon-move" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
						<i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

				</div>
<?php include 'footer.php'?>