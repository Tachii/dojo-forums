<?php include 'core/init.php'; ?>

<?php

if(isset($_POST['do_login'])){
    //Get Vars
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    //Create User Object
    $user = new User;
    
    if($user->login($username, $password)){
        redirect('index.php','You have been logged in', 'success');
    } else {
           redirect('index.php','Login data provided is incorrect', 'error');
    }
    
}

?>