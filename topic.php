<?php require ('core/init.php');  ?>
<?php
//Create Topic Object
$topic = new Topic;

//Get Topic ID
$topic_id = $_GET['id'];

//Process Reply
if(isset($_POST['do_reply'])){
    //Create Data Array
    $data = array();
    
    //Getting User_id
        $userData = getUser();
        $userId = $userData["user_id"];
    //
    
    $data['topic_id'] = $_GET['id'];
    $data['body'] = $_POST['body'];
    $data['user_id'] = $userId;     
    
    //Create Validator Object
    $validate = new Validator;
    
    //Requiered Fields
    $field_array=array('body');
    
    if($validate->isRequired($field_array)){
        //Creting Reply
        if($topic->reply($data)){
            redirect('topic.php?id='.$topic_id, 'Your reply has been added', 'success');
        }else{
            redirect('topic.php?id='.$topic_id, 'Something went wrong :(', 'error');
        }
    }
    
}


//Get Template 
$template = new Template('templates/topic.php');

//Assign Vars
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
//$template->title = $topic -> getTopic($topic_id);

// Display templaye
echo $template;
 ?>