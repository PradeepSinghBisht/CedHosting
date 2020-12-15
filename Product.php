<?php
    class Product{

        public function fetchcategory($id, $conn) {
            $sql = 'SELECT * FROM tbl_product WHERE `id`="'.$id.'"';
            $result = $conn->query($sql);
            return $result;

        }

        public function createcategory($subcategory, $link, $conn) {
            $sql = 'INSERT INTO tbl_product(`prod_parent_id`,`prod_name`,`html`,`prod_available`,`prod_launch_date`)
                 Values("1","'.$subcategory.'","'.$link.'","1",NOW())';

            return $sql;
        }

        public function deletecategory($id, $conn) {
            $sql = 'DELETE FROM tbl_product where `id`="'.$id.'"';
            return $sql;
        }

        public function gethosting($conn) {
            $sql = 'SELECT * FROM tbl_product WHERE `prod_parent_id`="0"';
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $host = $row['prod_name'];
            }
            return $host;
        }

        public function updatecategory($id, $subcategory, $link, $available, $conn) {
            $sql = 'UPDATE tbl_product SET `prod_name`="'.$subcategory.'", `html`="'.$link.'", `prod_available`="'.$available.'" WHERE `id`="'.$id.'"';
            return $sql;
        }

        public function fetchallcategory($conn) {
            $sql = 'SELECT * FROM tbl_product WHERE `prod_parent_id`="1" AND `prod_available`="1"';
            $result = $conn->query($sql);
            return $result;
        }

        public function insertproduct($category, $productname, $pageurl, $monthlyprice, $annualprice, $sku, $description, $conn) {
            $sql = "INSERT INTO tbl_product(`prod_parent_id`,`prod_name`,`html`,`prod_available`,`prod_launch_date`) VALUES('$category', '$productname', '$pageurl', 1, NOW())";
            $result = $conn->query($sql);
            
            $last_id = $conn->insert_id;

            $sql = "INSERT INTO tbl_product_description(`prod_id`,`description`,`mon_price`,`annual_price`,`sku`) VALUES('$last_id','$description','$monthlyprice','$annualprice','$sku')";
            
            return $sql;
        }

        public function viewproducts($conn) {
            $sql = "SELECT * FROM tbl_product_description INNER JOIN tbl_product on tbl_product_description.prod_id = tbl_product.id";
            $result = $conn->query($sql);
            return $result;
        }

        public function deleteproduct($id, $conn) {
            $sql = "DELETE FROM tbl_product WHERE `id`='".$id."'";
            $result = $conn->query($sql);

            $sql = "DELETE FROM tbl_product_description WHERE `prod_id`='".$id."'";
            return $sql;
        }

        public function editproducts($id, $conn) {
            $sql = "SELECT * FROM tbl_product_description INNER JOIN tbl_product on tbl_product_description.prod_id = tbl_product.id WHERE `prod_id`=".$id."";
            $result = $conn->query($sql);
            return $result;
        }

        public function updateproduct($id, $category, $productname, $pageurl, $available, $monthlyprice, $annualprice, $sku, $description, $conn) {
            
            $sql = "UPDATE tbl_product SET `prod_parent_id`='".$category."', `prod_name`='".$productname."', `html`='".$pageurl."', `prod_available`='".$available."', `prod_launch_date`=NOW() WHERE `id`='".$id."'" ;
            $result = $conn->query($sql);
            
            $sql = "UPDATE tbl_product_description SET `description`='".$description."',`mon_price`='".$monthlyprice."' ,`annual_price`='".$annualprice."' ,`sku`= '".$sku."' WHERE `prod_id`='".$id."'";
            
            return $sql;
        }

        public function catpage($id, $conn) {
            $sql = "SELECT * FROM tbl_product_description INNER JOIN tbl_product on tbl_product_description.prod_id = tbl_product.id WHERE `prod_parent_id`=$id AND `prod_available`='1'";
            $result = $conn->query($sql);
            return $result;
        }
    }
?>