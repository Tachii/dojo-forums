<?php 
    class Validator{
        //
        //Chech Requiered Fields
        //
        public function isRequired($field_array){
            foreach ($field_array as $field) {
                if($_POST[''.$field.''] == ''){
                    return false;
                }
            }
            return true;
        }
        
        //
        //Validate Email Field
        //
        public function isValidEmail($email){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;
            }else{
                return false;
            }
        }
        
        //
        //Check Password Match
        //
        public function passwordsMatch($password,$rpassword){
            if($password == $rpassword){
                return true;
            }else {
                return false;
            }
        }
        
    }
?>