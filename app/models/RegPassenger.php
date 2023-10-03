<?php
    class RegPassenger {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        //Find regPassenger by email
        public function findRegPassengerByEmail($email){
            $this->db->query('SELECT * FROM regPassengers WHERE email = :email');
            //Bind value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

    }