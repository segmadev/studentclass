<?php 
    class formHandler {
        public $isError = false;
        public $formData = [];
        function validate(array $formData = []){
            if(count($formData) == 0) $formData = $this->formData;
            if(count($formData) == 0) return null;
                // ["email", "full_name", "password"]
               foreach($formData as $form){
                    if(!isset($_POST[$form]) || empty($_POST[$form])){
                        echo "<div class='alert alert-danger'>$form is required.</div>";
                        $this->isError = true;
                        return;
                    }
               }
               
        }
    }