<?php
    session_start();
    require_once "Dbcon.php";
    $db = new Dbcon();
    if (isset($_SESSION['userdata'])) {
		if ($_SESSION['userdata']['is_admin'] == '1') {
			header('location:admin/index.php');
		} 
	}
    include 'header.php';
    include 'footer.php';
?>