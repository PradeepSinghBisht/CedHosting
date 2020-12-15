<?php 

    class Dbcon {
        function __construct() {
            $this->conn=new mysqli("localhost","root","root","CedHosting");

            if($this->conn->connect_error){
                die ($this->conn->connect_error);
            }
        }
    } 

?>
