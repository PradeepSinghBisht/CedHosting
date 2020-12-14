<?php 

  session_start();
  if (isset($_SESSION['userdata'])) {
    if ($_SESSION['userdata']['is_admin'] == '0') {
      header('location:../index.php');
    } 
  } else {
    header('location:../index.php');
  }
  include 'header.php';
?>
<?php include 'footer.php'; ?>