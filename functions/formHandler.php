<?php 
    class formHandler {
        public $isError = false;
        public $formData = [];
        public $data = [];
        function validate(array $formData = []){
            if(count($formData) == 0) $formData = $this->formData;
            if(count($formData) == 0) return null;
                // ["email", "full_name", "password"]
               foreach($formData as $form){
                    if(!isset($_POST[$form]) || empty($_POST[$form])){
                        echo "<div class='alert alert-danger'>".ucfirst(str_replace("_", " ", $form))." is required.</div>";
                        $this->isError = true;
                        continue;
                    }
                    
                    if($form == "password"){
                        if(isset($_POST['confirm_password'])) {
                             if($_POST['password'] !== $_POST['confirm_password']) {
                                echo "<div class='alert alert-danger'>Passwords do not match.</div>";
                                $this->isError = true;
                                continue;
                            }
                        }

                         if(strlen($_POST['password']) < 6) {
                                echo "<div class='alert alert-danger'>Password must be at least 6 characters long.</div>";
                                $this->isError = true;
                                continue;
                        }
                    
                    }
                    // if($form == "password") {
                    //     $this->data[$form] = password_hash(htmlspecialchars($_POST[$form]), PASSWORD_DEFAULT);
                    // }else{
                    //     $this->data[$form] = htmlspecialchars($_POST[$form]);
                    // }
                    if($form == "confirm_password") continue;
                    $this->data[$form] = ($form == "password") ? password_hash(htmlspecialchars($_POST[$form]), PASSWORD_DEFAULT) : htmlspecialchars($_POST[$form]);
                    
               }  
               if(!$this->isError) {
                   return $this->data;
               }
               return false;
        }
    }