<?php 
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
    

    if (isset($_GET['action'])) {
        $id = $_GET['id'];

        $sql = $prod->deleteproduct($id, $db->conn);

        if ($db->conn->query($sql) === true) {
            echo '<script>alert("Product Deleted Successfully")</script>';

        } else {
            echo '<script>alert("'.$db->conn->error.'")</script>';
        }
    }

    include 'header.php';

?>

<div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">View Products</h3>
                </div>
                <div class="table-responsive text-dark">
                    <table class="table align-items-center table-dark table-flush text-center" id="subcat">
                        <thead>
                            <tr>
                                <th>Product_ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Page Url</th>
                                <th>Web Spaces</th>
                                <th>Bandwidth</th>
                                <th>Domain</th>
                                <th>Language</th>
                                <th>Mailbox</th>
                                <th>Monthly Price</th>
                                <th>Annual Price</th>
                                <th>SKU</th>
                                <th>Status</th>
                                <th>Launch Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class='text-dark'>

                            <?php 

                                $rows = $prod->viewproducts($db->conn);
                                
                                foreach($rows as $row) {

                                    $result = $prod->fetchcategory($row['prod_parent_id'], $db->conn);
                                    
                                    $r = $result->fetch_assoc();

                                    $category = $r['prod_name'];

                                    $data = json_decode($row['description']);

                                    if ($row['prod_available'] == '1'){
                                        $available = 'Available';
                                    } else if ($row['prod_available'] == '0'){
                                        $available = 'Unavailable';
                                    }

                                    echo '<tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['prod_name'].'</td>
                                        <td>'.$category.'</td>
                                        <td>'.$row['html'].'</td>
                                        <td>'.$data->webspaces.'</td>
                                        <td>'.$data->bandwidth.'</td>
                                        <td>'.$data->domain.'</td>
                                        <td>'.$data->language.'</td>
                                        <td>'.$data->mailbox.'</td>
                                        <td>'.$row['mon_price'].'</td>
                                        <td>'.$row['annual_price'].'</td>
                                        <td>'.$row['sku'].'</td>
                                        <td>'.$available.'</td>
                                        <td>'.$row['prod_launch_date'].'</td>
                                        <td><a onClick="javascript: return confirm(\'Are You Sure to Edit?\');" href="editproduct.php?action=edit&id='.$row['id'].'">Edit</a>
                                        <a onClick="javascript: return confirm(\'Are You Sure to delete?\');" href="viewproducts.php?action=delete&id='.$row['id'].'">Delete</a></td>
                                    </tr>';
                                }

                                ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
<link rel="stylesheet" href="style.css" type="text/css">