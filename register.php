<?php require ('core/init.php');  ?>
<?php
//Create Topic Object (for sidebar display in this case)
$topic = new Topic;

//Create User Object
$user = new User;

//Create Validator Object
$validate = new Validator;

if(isset($_POST['register'])){
    //Create Data Array
    $data = array();
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['name'];
    $data['password'] = md5($_POST['password']);
    $data['rpassword'] = md5($_POST['rpassword']);
    $data['about'] = $_POST['about'];
    $data['last_activity'] = date("Y-m-d H:i:s");
    
    //Requiered Fields Array
    $field_array = array('name', 'email', 'username', 'password', 'rpassword');
    
    if($validate->isRequired($field_array)){
        if($validate->isValidEmail($data['email'])){
            if($validate->passwordsMatch($data['password'],$data['rpassword'])){
                //Upload Avatar Image
                if($user->uploadAvatar()){
                    $data['avatar'] = $_FILES["avatar"]["name"];
                }else{
                    $data['avatar'] = 'avatar1.jpg';
                }
            
                //Register User
                if ($user->register($data)) {
                    redirect('index.php', 'You are registered and can now log in', 'success');
                }else{
                    redirect('index.php', 'Something went wrong with registration', 'error');
                }
            }else{
                redirect('register.php','Your passwords did not match', 'error');
            }
        }else{
            redirect('register.php', 'Please use a valid email address', 'error');
        }
    }else{
        redirect('register.php','Please fill in all required fields','error');
    }
    
}

//Get Template 
$template = new Template('templates/register.php');

// Display templaye
echo $template;

 ?>