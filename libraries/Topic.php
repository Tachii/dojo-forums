<?php
class Topic{
    //Controller. Init DB variable.
    private $db;
    
    /*
     * Constructor
     */
     public function __construct(){
         $this -> db = new Database;
     }
     
     /*
      * Get All Topics
      */
     public function getAllTopics(){
         $this -> db -> query("SELECT forum_topics.*, forum_users.username, forum_users.avatar, forum_categories.name FROM forum_topics
                                            INNER JOIN forum_users 
                                            ON forum_topics.user_id = forum_users.id
                                            INNER JOIN forum_categories
                                            ON forum_topics.category_id = forum_categories.id
                                            ORDER BY create_date DESC
                                            ");
          //Assign Result Set
          $results = $this->db->resultset();
          
          return $results;
     }
     
     /* 
      * Get Topics By Category
     */
     public function getByCategory($category_id){
         $this -> db -> query("SELECT forum_topics.*, forum_users.username, forum_users.avatar, forum_categories.name FROM forum_topics
                                            INNER JOIN forum_categories
                                            ON forum_topics.category_id = forum_categories.id
                                            INNER JOIN forum_users
                                            ON forum_topics.user_id=forum_users.id
                                            WHERE forum_topics.category_id = :category_id");
         $this->db->bind(':category_id', $category_id);
         
         //Assign Result Set
         $results =$this->db->resultset();
          
          return $results;
     }
      
       /* 
      * Get Topics By User
     */
     public function getByUser($user_id){
         $this -> db -> query("SELECT forum_topics.*, forum_users.username, forum_users.avatar, forum_categories.name FROM forum_topics
                                            INNER JOIN forum_categories
                                            ON forum_topics.category_id = forum_categories.id
                                            INNER JOIN forum_users
                                            ON forum_topics.user_id=forum_users.id
                                            WHERE forum_topics.category_id = :user_id");
         $this->db->bind(':user_id', $user_id);
         
         //Assign Result Set
         $results =$this->db->resultset();
          
          return $results;
     }
     
     /*
      * Get Total # of Topics
      */
        public function getTotalTopics(){
            $this->db->query('SELECT * FROM forum_topics');
            $rows = $this->db->resultset();
            return $this->db->rowCount();
        }
        
    /*
     * Get Total # of Categories
     */
     public function getTotalCategories(){
            $this->db->query('SELECT * FROM forum_categories');
            $rows = $this->db->resultset();
            return $this->db->rowCount();
        }
        
   /*
    * Get Category By ID
    */
    public function getCategory($category_id){
        $this->db->query("SELECT * FROM forum_categories WHERE id = :category_id");
        $this->db->bind(':category_id', $category_id);
        
        //Assign Row
        $row = $this->db->single();
        
        return $row;
    }
     
    /*
     * Get Total # of Replies
     */
     public function getTotalReplies(){
            $this->db->query('SELECT * FROM forum_replies WHERE topic_id = '.$topic_id);
            $rows = $this->db->resultset();
            return $this->db->rowCount();
        }
     
     /*
      * Get Topic By ID
      */
     public function getTopic($id){
         $this->db->query("SELECT forum_topics.*, forum_users.username, forum_users.avatar FROM forum_topics
                                        INNER JOIN forum_users
                                        ON forum_topics.user_id = forum_users.id
                                        WHERE forum_topics.id = :id
         ");
         $this->db->bind(':id', $id);
         
         //Assign Row
         $row = $this->db->single();
         
         return $row;
     }

    /*
     * Get Topic Replies
     */
    public function getReplies($topic_id){
        $this -> db -> query("SELECT forum_replies.*, forum_users.* FROM forum_replies
                                            INNER JOIN forum_users
                                            ON forum_replies.user_id = forum_users.id
                                            WHERE forum_replies.topic_id = :topic_id
                                            ORDER BY create_date ASC
        ");
        $this -> db -> bind(':topic_id',$topic_id);
        
        //Assign Result Set
        $results = $this -> db -> resultset();
        
        return $results;
    }
    
    //
    //Create New Topic
    //
    public function create($data){
        //Insert Query
        $this->db->query("INSERT INTO forum_topics (category_id, user_id, title, body, last_activity)
                                                                    VALUES(:category_id, :user_id, :title, :body, :last_activity)");
        
        //Bind Values
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':last_activity', $data['last_activity']);
        
        //Execute Query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    //
    //Create New Reply
    //
    public function reply($data){
        //Insert Query
        $this->db->query("INSERT INTO forum_replies (topic_id, user_id, body)
                                                                    VALUES(:topic_id, :user_id, :body)");
        
        //Bind Values
        $this->db->bind(':topic_id', $data['topic_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);
        
        //Execute Query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}
?>