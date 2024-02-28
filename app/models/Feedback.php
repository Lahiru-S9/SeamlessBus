<?php
class feedback{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addFeedback($data){
        $this->db->query('INSERT INTO feedbacks(user_id, rating, category, messages) VALUES (:user_id, :rating, :category, :messages)');

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':rating' , $_SESSION['rating']);
        $this->db->bind('category', $_SESSION['category']);
        $this->db->bind('messages', $_SESSION['messages']);
    
 //Execute function
if($this->db->execute()){
    return true;
} else {
    return false;
}
    }

}