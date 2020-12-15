<?php
    session_start();
    unset($_SESSION['userdata']);
    unset($_SESSION['verify']);
    header('Location:index.php');
    
?>