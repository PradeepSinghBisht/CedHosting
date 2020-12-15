<?php

    session_start();
    include_once 'Dbcon.php';
    include_once 'User.php';
    $user = new User();
    $db = new Dbcon();

    $id = $_SESSION['verify']['id'];

    $user->activate($id, $db->conn);
?>