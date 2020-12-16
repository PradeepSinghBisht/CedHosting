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
    

    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $subcategory = $_POST['sub_category_name'];
        $available = $_POST['available'];
        $html = $_POST['html'];
        $sql = $prod->updatecategory($id, $subcategory, $available, $html, $db->conn);

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
                        
                        foreach ($rows as $row) { ?>
                                <form class="mx-auto col-md-12 text-dark" action="#" method="POST">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Parent Category</label>
                                        <select class="form-control text-dark" name="parent_category" id="exampleFormControlSelect1"
                                        required disabled>
                                        <option value="<?php echo $host; ?>"><?php echo $host; ?></option>
                                        </select>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Sub Category Name</label>
                                        <input type="text" class="form-control text-dark" placeholder="Enter category"
                                            pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" name="sub_category_name" value="<?php echo $row['prod_name']; ?>"required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Html</label>
                                        <div class="row justify-content-md-center">
                                            <div class="col-md-12 col-lg-8">
                                                <div class="form-group">
                                                    <textarea id="editor" name="html"><?php echo $row['html']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="available">Is Available</label>
                                        <select class="form-control" id="available" name="available">
                                            
                                            <option <?php if ($row['prod_available'] == "1") {echo "selected";} ?> value="1">Available</option>
                                            <option <?php if ($row['prod_available'] == "0") {echo "selected";} ?> value="0">Unavailable</option>
                                        </select>
                                    </div>
                                    <input type="submit" value="Submit" name="submit" class="btn btn-success mb-4">
                                
                                </form>
                    <?php   }
                    }
                ?>
                

            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/prhu8vmekb53uh6bd9qmwt92jmfep8sor7waatdov6jtjzk0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea#editor',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste image table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
    <!-- Footer -->
    <?php include './footer.php'; ?>
    <link rel="stylesheet" href="style.css" type="text/css">

    </body>

    </html>