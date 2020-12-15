<?php 
    session_start();
    include '../Dbcon.php';
    include '../Product.php';
    $db = new Dbcon();
    $prod = new Product();

  if (isset($_SESSION['userdata'])) {
		if ($_SESSION['userdata']['is_admin'] == '0') {
			header('location:../index.php');
		} 
	} else {
    header('location:../index.php');
  }

    if(isset($_POST['submit'])){
        $subcategory=$_POST['sub_category_name'];
        $link=$_POST['link'];

        $sql = $prod->createcategory($subcategory, $link, $db->conn);

        if ($db->conn->query($sql) === true) {
            echo '<script>alert("Sub Category Added Successfully")</script>';

        } else {
            echo '<script>alert("'.$db->conn->error.'")</script>';
        }
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $id = $_GET['id'];

        $sql = $prod->deletecategory($id, $db->conn);

        if ($db->conn->query($sql) === true) {
            echo '<script>alert("Sub Category Deleted Successfully")</script>';

        } else {
            echo '<script>alert("'.$db->conn->error.'")</script>';
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
                    <h6 class="h2 text-white d-inline-block mb-0">Create Category</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
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
                    <h3 class="mb-0">Add Category</h3>
                </div>
                <form class='mx-auto col-md-12 text-dark' action="createcategory.php" method='POST'>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Parent Category</label>
                        <select class="form-control text-dark" name='parent_category' id="exampleFormControlSelect1"
                            required>
                            <?php 
                                $host = $prod->gethosting($db->conn);
                                
                                echo "<option value=".$host.">$host</option>";
                                      
                             ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Sub Category Name</label>
                        <input type='text' class="form-control text-dark" placeholder='Enter category'
                            pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" name='sub_category_name' required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Page Url</label>
                        <input type='text' class="form-control text-dark" placeholder="Enter page link" name='link'
                            required>
                    </div>
                    <input type='submit' value='Submit' name='submit' class='btn btn-success mb-4'>
                  
                </form>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">View Category</h3>
                </div>
                <div class="table-responsive text-dark">
                    <table class="table align-items-center table-dark table-flush text-center" id="subcat">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Subcategory Id</th>
                                <th>Name</th>
                                <th>Available/UnAvailable</th>
                                <th>Launch Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class='text-dark'>

                            <?php 
                                $sql = 'SELECT * FROM tbl_product WHERE `prod_parent_id`="0"';
                                $result = $db->conn->query($sql);

                                while($row = $result->fetch_assoc()) {
                                    $category = $row['prod_name'];  
                                }

                                $sql = 'SELECT * FROM tbl_product WHERE `prod_parent_id`="1"';
                                $result = $db->conn->query($sql);

                                while($row = $result->fetch_assoc()) {
                                    if ($row['prod_available'] == '1') {
                                        $html = 'Available';
                                    } else {
                                        $html = 'Unavailable';
                                    }
                                    echo '<tr>
                                          <td>'.$category.'</td>
                                          <td>'.$row['id'].'</td>
                                          <td>'.$row['prod_name'].'</td>
                                          <td>'.$html.'</td> 
                                          <td>'.$row['prod_launch_date'].'</td>
                                          <td><a onClick="javascript: return confirm(\'Are You Sure to Edit?\');" href="updatecategory.php?action=edit&id='.$row['id'].'">Edit</a>
                                          <a onClick="javascript: return confirm(\'Are You Sure to delete?\');" href="createcategory.php?action=delete&id='.$row['id'].'">Delete</a></td>
                                          </tr>';
                                }

                                ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include './footer.php'; ?>
    <link rel="stylesheet" href="style.css" type="text/css">

    </body>

    </html>