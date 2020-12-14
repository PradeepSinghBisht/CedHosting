<?php 
    session_start();
    include '../Dbcon.php';
    include '../Product.php';
    $db = new Dbcon();
    $prod = new Product();

    session_start();
  if (isset($_SESSION['userdata'])) {
		if ($_SESSION['userdata']['is_admin'] == '0') {
			header('location:../index.php');
		} 
	} else {
    header('location:../index.php');
  }
    

    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $subcategory = $_POST['sub_category_name'];
        $link = $_POST['link'];
        $available = $_POST['available'];

        $sql = $prod->updatecategory($id, $subcategory, $link, $available, $db->conn);

        if ($db->conn->query($sql) === true) {
            echo '<script> alert("Sub Category Updated Successfully")</script>';
            echo '<script> window.location.href = "createcategory.php" </script>';

        } else {
            echo '<script>'.$db->conn->error.'</script>';
        }

    }

    include 'header.php';
    
?>

<!-- Header -->
<!-- Header -->

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Update Category</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Category</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class=" col ">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Update Category</h3>
                </div>

                <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $rows = $prod->fetchcategory($id, $db->conn);

                        $host = $prod->gethosting($db->conn);
                        
                        foreach ($rows as $row) {
                            echo '<form class="mx-auto col-md-12 text-dark" action="#" method="POST">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Parent Category</label>
                                        <select class="form-control text-dark" name="parent_category" id="exampleFormControlSelect1"
                                        required disabled>
                                        <option value="'.$host.'">'.$host.'</option>
                                        </select>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Sub Category Name</label>
                                        <input type="text" class="form-control text-dark" placeholder="Enter category"
                                            pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" name="sub_category_name" value="'.$row['prod_name'].'"required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Page Url</label>
                                        <input type="text" class="form-control text-dark" placeholder="Enter page link" name="link" value="'.$row['html'].'"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="available">Is Available</label>
                                        <select class="form-control" id="available" name="available">
                                            
                                            <option value="1">Available</option>
                                            <option value="0">Unavailable</option>
                                        </select>
                                    </div>
                                    <input type="submit" value="Submit" name="submit" class="btn btn-success mb-4">
                                
                                </form>';
                        }
                    }
                ?>
                

            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include './footer.php'; ?>
    <link rel="stylesheet" href="style.css" type="text/css">

    </body>

    </html>