<?php 
    session_start();
    include '../Product.php';
    include '../Dbcon.php';
    $prod = new Product();
    $db = new Dbcon();

    if (isset($_SESSION['userdata'])) {
      if ($_SESSION['userdata']['is_admin'] == '0') {
        header('location:../index.php');
      } 
    } else {
      header('location:../index.php');
    }

    if(isset($_POST['submit'])) {
        $category = $_POST['category'];
        $productname = $_POST['productname'];
        $pageurl = $_POST['pageurl'];
        $monthlyprice = $_POST['monthlyprice'];
        $annualprice = $_POST['annualprice'];
        $sku = $_POST['sku'];
        $webspaces = $_POST['webspaces'];
        $bandwidth = $_POST['bandwidth'];
        $domain = $_POST['domain'];
        $language = $_POST['language'];
        $mailbox = $_POST['mailbox'];
        $arr = array("webspaces"=>$webspaces, "bandwidth"=>$bandwidth, "domain"=>$domain, "language"=>$language, "mailbox"=>$mailbox);
        $description = json_encode($arr);

        $sql = $prod->insertproduct($category, $productname, $pageurl, $monthlyprice, $annualprice, $sku, $description, $db->conn);
        if ($db->conn->query($sql) === true) {
          echo '<script>alert("Product Added Successfully")</script>';
          echo '<script> window.location.href="viewproducts.php"</script>';

        } else {
            echo '<script>alert("'.$db->conn->error.'")</script>';
        }
    }
?>
  
  <?php include_once('header.php');?>
  
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Add Products</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Products</li>
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
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8">
          <div class="card">
            <div class="card-header bg-transparent">
              <h1 class="mb-0">Create New Product</h1>
            </div>
            <div class="card-body">
                <form action="addproduct.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category <span style="color:red">*</span></label>
                        <select class="form-control" name="category" id="category">
                            <option value="">Select Product Category</option>
                            <?php
                                $rows = $prod->fetchallcategory($db->conn);
                                foreach ($rows as $row) {
                                     echo '<option value="'.$row['id'].'">'.$row['prod_name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Product Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="productname" pattern='^([A-Za-z]+ )+[A-Za-z-0-9]+$|^[A-Za-z0-9]+$' id="productname" required placeholder="Add Product Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Page Url <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="pageurl" placeholder="Add Page Url">
                    </div>

                    <hr>

                    <div class="card-header bg-transparent">
                        <h2 class="mb-0">Product Description</h2>
                        <p>Enter Product Description Below</p>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Monthly Price <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="monthlyprice" id="monthlyprice" required placeholder="ex. 23">
                        <small>This would be monthly plan</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Annual Price <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="annualprice" id="annualprice" required placeholder="ex. 23">
                        <small>This would be Annual plan</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">SKU <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="sku" id="sku" required placeholder="">
                    </div>

                    <hr>

                    <div class="card-header bg-transparent">
                        <h2 class="mb-0">Features</h2>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Web Spaces(in GB) <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="webspaces">
                        <small>Enter 0.5 for 512 MB</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bandwidth (in GB) <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="bandwidth">
                        <small>Enter 0.5 for 512 MB</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Free Domain <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="domain">
                        <small>Enter 0 if no domain available in this service</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Language/Technology Supporty <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="language">
                        <small>Separate by (,) Ex: PHP, MySQL, MongoDB</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mailbox <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="mailbox">
                        <small>Enter Number of mailbox will be provided, enter 0 if none</small>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Product" name="submit">
                    </div>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-lg-2"></div>
        
      </div>
      <?php include 'footer.php';?>
    </div>
 </body>
</html>    
      