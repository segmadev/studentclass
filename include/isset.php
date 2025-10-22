<?php 
    if(isset($_POST['register'])) {
        // call register function
        $auth = new Auth();
        $auth->registerUser();
        // print_r($_POST);
    }

    if(isset($_POST['login'])) {
        // call login function
        $auth = new Auth();
        $auth->signin();
        // print_r($_POST);
    }