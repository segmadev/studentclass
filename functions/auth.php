<?php 
            // $_POST = "post office";
            $_POST['remember'] = true;
            if(isset($_GET['register'])) {
                print_r($_GET['fullname']);
            }

            if(isset($_POST['register'])) {
                print_r($_POST);
            }


        ?>