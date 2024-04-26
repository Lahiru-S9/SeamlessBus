<?php
class Feedback{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addFeedback($data){
        $this->db->query('INSERT INTO feedback(user_id, rating, category, messages) VALUES (:user_id, :rating, :category, :messages)');

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':rating' , $data['feedbackType']);
        $this->db->bind(':category', $data['feedbackCategory']);
        $this->db->bind(':messages', $data['feedbackText']);
    
    //Execute function
    if($this->db->execute()){
        return true;
    } else {
        return false;
    }
    }
    // Method to fetch all feedback
    public function getAllFeedback() {
        $this->db->query('SELECT * FROM feedback');
        return $this->db->resultSet();
    }

}