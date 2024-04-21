<?php

class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Register a new user
    public function register($data){
        // Prepare SQL statement
        $this->db->query('INSERT INTO users (owner_name, owner_email, owner_password) VALUES (:owner_name, :owner_email, :owner_password)');

        // Bind values
        $this->db->bind(':owner_name', $data['owner_name']);
        $this->db->bind(':owner_email', $data['owner_email']);
        $this->db->bind(':owner_password', $data['owner_password']); // Remember to hash the password before storing it in the database

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // Check if email is already registered
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :owner_email');
        $this->db->bind(':owner_email', $owner_email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
}
?>
