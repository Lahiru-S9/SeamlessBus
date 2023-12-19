<?php
    class RegPassenger{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getTotalBookingsCount($passenger_id){
            $this->db->query("SELECT COUNT(*) AS total_bookings FROM booked_regpassengers WHERE passengerid = :passenger_id");
            
            $this->db->bind(':passenger_id', $passenger_id);    

            $results = $this->db->resultSet();
            return $results;
        }
        
    }