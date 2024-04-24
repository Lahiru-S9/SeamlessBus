<?php
    class Owner{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getDetails($user_id){
            $this->db->query("SELECT * FROM owner_profile WHERE user_id = :user_id");
            
            $this->db->bind(':user_id', $user_id);    

            $results = $this->db->resultSet();
            return $results;
        }
    }