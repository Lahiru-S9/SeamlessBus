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

        public function getBookingsByRoute($user_id){
            $this->db->query("SELECT COUNT(bookings.id) AS bookings,routes.route_num FROM bookings JOIN schedule ON schedule.id = bookings.scheduleid JOIN schedule_def ON schedule_def.id=schedule.schedule_defId JOIN routes ON schedule_def.route_id=routes.id JOIN bus_assigned ON bus_assigned.schedule_id = schedule.id JOIN buses ON bus_assigned.bus_no=buses.bus_no JOIN users ON users.id= buses.ownerid WHERE users.id= :id;");
            
            $this->db->bind(':id', $user_id);    

            $results = $this->db->resultSet();
            return $results;
        }
    }