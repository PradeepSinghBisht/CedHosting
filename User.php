<?php 
    require_once "Dbcon.php";
    class User {

        public function signup($name, $mobile, $email, $security, $answer, $password, $confirmpassword, $conn) {
            
            if ($password != $confirmpassword) {
                echo '<script>alert("Password Doesn\'t Match")</script>';
            } else {
                $sql = 'INSERT INTO tbl_user(`email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) 
                VALUES("'.$email.'","'.$name.'","'.$mobile.'","0","0","0","0",NOW(),"'.$password.'","'.$security.'","'.$answer.'")';
        
                if ($conn->query($sql) === true) {
                    echo '<script>alert("Registered Successfully")</script>';
                    echo '<script> window.location.href = "login.php" </script>';
        
                } else {
                    echo '<script>alert("'.$conn->error.'")</script>';
                }
            }
        }

        public function login($email, $password, $conn) {
            $sql = "SELECT * FROM tbl_user WHERE `email`='".$email."'
                    AND `password`='".$password."'";
            $result = $conn->query($sql);

            return $result;
        }
    }
?>