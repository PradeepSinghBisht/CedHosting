<?php 
	$base = basename($_SERVER['REQUEST_URI']);
	include_once 'Product.php';
	$prod = new Product();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<!--script-->
<script src="js/modernizr.custom.97074.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<!--lightboxfiles-->
<script type="text/javascript">
	$(function() {
	$('.team a').Chocolat();
	});
</script>	
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
						<script type="text/javascript">
							$(function() {
							
								$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

							});
						</script>						
<!--script-->
</head>
<body>
	<!---header--->
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand">
								<h1><a href="index.php"><img src="CedHosting.png" style="height:95px; width:100px; margin-top:-18px" alt=""></a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li <?php if ($base == 'index.php') {echo 'class="active"';}?>><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li <?php if ($base == 'about.php') {echo 'class="active"';}?>><a href="about.php">About</a></li>
								<li <?php if ($base == 'services.php') {echo 'class="active"';}?>><a href="services.php">Services</a></li>
								<li class="dropdown <?php if ($base == 'linuxhosting.php' || $base == 'wordpresshosting.php' || $base == 'windowshosting.php' || $base == 'cmshosting.php') {echo 'active';}?>">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">
										<?php 
											$rows = $prod->fetchallcategory($db->conn);
											foreach ($rows as $row) {
												echo '<li><a href="catpage.php?id='.$row['id'].'">'.$row['prod_name'].'</a></li>';
											}
										?>
									</ul>			
								</li>
								<li <?php if ($base == 'pricing.php') {echo 'class="active"';}?>><a href="pricing.php">Pricing</a></li>
								<li <?php if ($base == 'blog.php') {echo 'class="active"';}?>><a href="blog.php">Blog</a></li>
								<li <?php if ($base == 'contact.php') {echo 'class="active"';}?>><a href="contact.php">Contact</a></li>
								<li <?php if ($base == 'cart.php') {echo 'class="active"';}?>><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
								<?php if (isset($_SESSION['userdata'])) {
                                        ?> <li <?php if ($base == 'logout.php'){ ?> class="active" <?php } ?>><a href="logout.php">Logout</a></li>
                                        <?php
									} else {
										?> <li <?php if ($base == 'login.php'){ ?> class="active" <?php } ?>><a href="login.php">Login</a></li> <?php
									}
								?>
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	<!---header--->