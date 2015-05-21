<?php require ('core/init.php');  ?>
<?php
//Create Topic Object
$topic = new Topic;

if(isset($_POST['do_create'])){
   //Create Validator Object 
    $validate = new Validator;   
   
   //Create Data Array 
   $userData = getUser();
   $userId = $userData["user_id"];
   $data = array();
   
   $data['title'] = $_POST['title'];
   $data['body'] = $_POST['body'];
   $data['category_id'] = $_POST['category'];
   $data['user_id'] = $userId;
   $data['last_activity'] = date("Y-m-d H:i:s");
   
   //Requiered Fields
   $field_array = array('title','body','category');
   
   //Validating Requiered Fields
   if($validate->isRequired($field_array)){
       //Creating Topic
       if($topic->create($data)){
           redirect('index.php','Your topic has been posted','success');
       }else{
           redirect('topic.php?id='.$topic_id, ' Something Went wrong :( ');
       }
   }else{
       redirect('create.php', 'Please fill in all fields', 'error');
   }
   
}

//Get Template & Assign Vars
$template = new Template('templates/create.php');

// Display templaye
echo $template;

 ?>