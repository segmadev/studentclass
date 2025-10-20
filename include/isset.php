<?php 
    if(isset($_POST['register'])) {
        // call register function
        $auth = new Auth();
        $auth->registerUser();
        // print_r($_POST);
    }