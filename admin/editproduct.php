<?php 
    include '../Product.php';
    include '../Dbcon.php';
    $prod = new Product();
    $db = new Dbcon();

    if (isset($_GET['action'])) {
        $id = $_GET['id'];

        $rs = $prod->editproducts($id, $db->conn);
        $r = $rs->fetch_assoc();    
        
        $data = json_decode($r['description']);
    }

    if(isset($_POST['submit'])) {

        $id = $_GET['id'];
        $category = $_POST['category'];
        $productname = $_POST['productname'];
        $pageurl = $_POST['pageurl'];
        $available = $_POST['available'];
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

        $sql = $prod->updateproduct($id, $category, $productname, $pageurl, $available, $monthlyprice, $annualprice, $sku, $description, $db->conn);
        
        if ($db->conn->query($sql) === true) {
            echo '<script>alert("Product Updated Successfully")</script>';
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
              <h6 class="h2 text-white d-inline-block mb-0">Edit Product</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
              <h1 class="mb-0">Edit Product</h1>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category <span style="color:red">*</span></label>
                        <select class="form-control" name="category" id="category">
                            
                            <?php
                                $rows = $prod->fetchallcategory($db->conn);
                                foreach ($rows as $row) {?>
                                    <option <?php if($r['prod_parent_id'] == $row['id']){ echo 'selected';} ?> value=<?php echo $row['id'] ?>><?php echo $row['prod_name'] ?></option>
                                <?php } ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Product Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="productname" pattern='^([A-Za-z]+ )+[A-Za-z-0-9]+$|^[A-Za-z0-9]+$' id="productname" required placeholder="Add Product Name" value="<?php echo $r['prod_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Page Url <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="pageurl" placeholder="Add Page Url" value="<?php echo $r['html']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Is Available <span style="color:red">*</span></label>
                        <select class="form-control" name="available" id="available">
                            <option <?php if($r['prod_available'] == "1"){echo 'selected';}?> value="1">Available</option>
                            <option <?php if($r['prod_available'] == "0"){echo 'selected';}?> value="0">Unavailable</option>
                        </select>
                    </div>

                    <hr>

                    <div class="card-header bg-transparent">
                        <h2 class="mb-0">Product Description</h2>
                        <p>Enter Product Description Below</p>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Monthly Price <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="monthlyprice" id="monthlyprice" required placeholder="ex. 23" value="<?php echo $r['mon_price']?>">
                        <small>This would be monthly plan</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Annual Price <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="annualprice" id="annualprice" required placeholder="ex. 23" value="<?php echo $r['annual_price']?>">
                        <small>This would be Annual plan</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">SKU <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="sku" id="sku" required placeholder="" value="<?php echo $r['sku']?>">
                    </div>

                    <hr>

                    <div class="card-header bg-transparent">
                        <h2 class="mb-0">Features</h2>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Web Spaces(in GB) <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="webspaces" value="<?php echo $data->webspaces?>">
                        <small>Enter 0.5 for 512 MB</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bandwidth (in GB) <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="bandwidth" value="<?php echo $data->bandwidth?>">
                        <small>Enter 0.5 for 512 MB</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Free Domain <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="domain" value="<?php echo $data->domain?>">
                        <small>Enter 0 if no domain available in this service</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Language/Technology Supporty <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="language" value="<?php echo $data->language?>">
                        <small>Separate by (,) Ex: PHP, MySQL, MongoDB</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mailbox <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="mailbox" value="<?php echo $data->mailbox?>">
                        <small>Enter Number of mailbox will be provided, enter 0 if none</small>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update Product" name="submit">
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
      