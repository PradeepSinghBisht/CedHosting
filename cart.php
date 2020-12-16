<?php
    session_start();
    require_once "Dbcon.php";
    $db = new Dbcon();
    if (isset($_SESSION['userdata'])) {
		if ($_SESSION['userdata']['is_admin'] == '1') {
			header('location:admin/index.php');
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
                                <th>Product SKU</th>
                                <th>Product Name</th>
                                <th>Monthly Price</th>
                                <th>Annual Price</th>
                                <th>Disk Space</th>
                                <th>Domain</th>
                                <th>Bandwidth</th>
                                <th>Language</th>
                                <th>MailBox</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                               <td></td> 
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

<?php
    include 'footer.php';
?>