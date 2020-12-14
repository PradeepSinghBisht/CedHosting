<?php
    session_start();
    require_once "Dbcon.php";
	$db = new Dbcon();
    include 'header.php';
    include 'footer.php';
?>