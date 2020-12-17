<?php
    session_start();
    require_once "Dbcon.php";
    $db = new Dbcon();
    if (isset($_SESSION['userdata'])) {
		if ($_SESSION['userdata']['is_admin'] == '1') {
			header('location:admin/index.php');
		} 
    }
    
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $id = $_GET['id'];
            unset($_SESSION['cart'][$id]);
        }
    }
    include 'header.php';
?>
        <div class="content">
            <div class="about-section">
                <div class="container">
                    <h2>Cart</h2>
                    <div class="about-grids">
                        <table style="width:100%">
                            <tr>
                                <th>S.No.</th>
                                <th>Product SKU</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Billing Cycle</th>
                                <th>Action</th>
                            </tr>
                            <?php $count = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach($_SESSION['cart'] as $key=>$value) {
                                    $count++;
                                    echo '<tr>
                                            <td>'.$count.'</td>
                                            <td>'.$_SESSION['cart'][$key]['sku'].'</td>
                                            <td>'.$_SESSION['cart'][$key]['name'].'</td>
                                            <td>'.$_SESSION['cart'][$key]['quantity'].'</td>
                                            <td>'.$_SESSION['cart'][$key]['price'].'</td>
                                            <td>'.$_SESSION['cart'][$key]['billing'].'</td>
                                            <td><a>Edit</a>
                                            <a onClick="javascript: return confirm(\'Are You Sure to delete?\');" href="cart.php?id='.$_SESSION['cart'][$key]['id'].'&action=delete">Delete</a></td>
                                        </tr>';
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

<?php
    include 'footer.php';
?>