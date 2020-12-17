<?php
    session_start();
    unset($_SESSION['userdata']);
    unset($_SESSION['verify']);
    unset($_SESSION['cart']);
    header('Location:index.php');
    
?>