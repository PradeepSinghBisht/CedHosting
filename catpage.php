
<?php 
    if (isset($_SESSION['userdata'])) {
		if ($_SESSION['userdata']['is_admin'] == '1') {
			header('location:/admin/index.php');
		} 
	}
    include 'header.php'
?>
<?php include 'footer.php'?>