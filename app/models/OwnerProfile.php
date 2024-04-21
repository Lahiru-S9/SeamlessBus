<?php

class OwnerProfile {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function profile($data){
        $this->db->query('INSERT INTO owner_profile (owner_name, owner_email, owner_password) VALUES (:owner_name, :owner_email, :owner_password)');

        $this->db->bind(':owner_name' , $data['owner_name']);
        $this->db->bind(':owner_email' , $data['owner_email']);
        $this->db->bind(':owner_password' , $data['owner_password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

}
?>
