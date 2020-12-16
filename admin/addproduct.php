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
                        <input type="text" class="form-control" id="input1" name="productname" pattern='^([A-Za-z]+ )+[A-Za-z-0-9]+$|^[A-Za-z0-9]+$' id="productname" required placeholder="Add Product Name">
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
                        <input type="text" class="form-control" id="input3" name="monthlyprice" id="monthlyprice" required placeholder="ex. 23">
                        <small>This would be monthly plan</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Annual Price <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="input4" name="annualprice" id="annualprice" required placeholder="ex. 23">
                        <small>This would be Annual plan</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">SKU <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="input5" name="sku" id="sku" required placeholder="">
                    </div>

                    <hr>

                    <div class="card-header bg-transparent">
                        <h2 class="mb-0">Features</h2>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Web Spaces(in GB) <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="input6" name="webspaces">
                        <small>Enter 0.5 for 512 MB</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bandwidth (in GB) <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="input7" name="bandwidth">
                        <small>Enter 0.5 for 512 MB</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Free Domain <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="input8" name="domain">
                        <small>Enter 0 if no domain available in this service</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Language/Technology Supporty <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="input9" name="language">
                        <small>Separate by (,) Ex: PHP, MySQL, MongoDB</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mailbox <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="input10" name="mailbox">
                        <small>Enter Number of mailbox will be provided, enter 0 if none</small>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Product" id="submit" name="submit">
                    </div>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-lg-2"></div>
        
      </div>
      <?php include 'footer.php';?>
    </div>

    <script>
        $(document).ready(function() {
        $('#submit').attr('disabled', 'disabled');
        $('.inputVal').keyup(function() {
            var val = $(this).val();
            if (isNaN(val)) {
                val = val.replace(/[^0-9\.]/g, '');
                if (val.split('.').length > 2)
                    val = val.replace(/\.+$/, "");
            }
            $(this).val(val);
        });

    $('select').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb1').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb1').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input1').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb2').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /^\d*?[a-zA-Z][a-zA-Z0-9\-]{1,}\d*$/i.test($("#input1").val());
            if (!pat) {
                $('#eb2').html("*Required");
                $(this).focus();
                $(this).css("border", "2px solid red");
                $('#submit').attr('disabled', 'disabled');
            } else {
                $(this).css("border", "2px solid green");
                $('#eb2').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });

    $('#input3').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb4').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb4').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input4').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb5').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb5').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input5').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb6').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /^\d?[a-zA-Z0-9#-]+?[a-zA-Z0-9][a-zA-Z0-9\-#]{1,}\d*$/i.test($("#input5").val());
            if (!pat) {
                $('#eb6').html("Only #,- allowed. Must contain 2 non-special characters !!");
                $(this).focus();
                $(this).css("border", "2px solid red");
                $('#submit').attr('disabled', 'disabled');
            } else {
                $(this).css("border", "2px solid green");
                $('#eb6').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });

    $('#input6').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb7').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb7').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input7').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb8').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb8').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input8').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb9').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#input8").val());
            if (!pat) {
                $('#eb9').html("Only alphabetic/numeric values allowed.");
                $(this).focus();
                $(this).css("border", "2px solid red");
                $('#submit').attr('disabled', 'disabled');
            } else {
                $(this).css("border", "2px solid green");
                $('#eb9').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });

    $('#input9').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb10').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$/i.test($("#input9").val());
            if (!pat) {
                $('#eb10').html("Only alphabetic/numeric values allowed.");
                $(this).focus();
                $(this).css("border", "2px Product solid green");
                $('#eb10').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });

    $('#input10').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb11').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#input10").val());
            if (!pat) {
                $('#eb11').html("Only alphabetic/numeric values allowed.");
                $(this).focus();
                $(this).css("border", "2px solid red");
                $('#submit').attr('disabled', 'disabled');
            } else {
                $(this).css("border", "2px solid green");
                $('#eb11').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });
});
    </script>

</html>    
      