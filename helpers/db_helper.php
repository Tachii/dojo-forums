<?php
/*
 *  Get # of replies per topic
 */
 function replyCount($topic_id){
     $db = new Database;
     $db->query('SELECT * FROM forum_replies WHERE topic_id = :topic_id');
     $db->bind(':topic_id',$topic_id);
     //Assign Rows
     $rows = $db->resultset();
     //Get Count
     return $db->rowCount();
 }
 
 /*
  * Get Categories
  */
function getCategories(){
    $db = new Database;
    $db->query('SELECT * FROM forum_categories');
    
    //Assign Result Set
    $results = $db->resultset();
    
    return $results;
}

/*
 * Get Info about User (number of topics/posts)
 */
function userPostCount($user_id){
    $db = new Database;
    
    //Getting # of started topics
    $db -> query('SELECT * FROM forum_topics
                            WHERE user_id = :user_id
    ');
    $db -> bind(':user_id', $user_id);
    //Assign Rows
    $rows = $db->resultset();
    //Get Count
    $topic_count = $db->rowCount();
    
    //Getting # of Posts
    $db->query('SELECT * FROM forum_replies
                        WHERE user_id = :user_id
                        ');
    $db->bind(':user_id', $user_id);
    //Assign Rows
    $rows = $db->resultset();
    //Get Count
    $reply_count = $db->rowCount();
    return $topic_count + $reply_count;
    
    
}
  
 
 ?>