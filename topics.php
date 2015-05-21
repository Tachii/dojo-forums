<?php require ('core/init.php');  ?>
<?php
//Create new Topics Object 
$topic = new Topic;

//Get Category from URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get User from URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

//Get Template
$template = new Template('templates/topics.php');

//Assign Template Vars
if(isset($category)){
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Posts In "'.$topic->getCategory($category)->name.'"';
}

//Check For User Filter
if(isset($user_id)){
    $template->topics = $topic->getByUser($user_id);
    //$template->title = 'Posts By "'.$user->getUser($user_id)->username.'"';
}

//Check For Category Filter
if(!isset($category) && !isset($user_id)){
    $template->topics = $topic->getAllTopics();
}

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

// Display templaye
echo $template;

 ?>