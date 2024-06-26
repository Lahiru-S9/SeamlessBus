<?php

    class Booking {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getSeats($schedule_id){
            $this->db->query('SELECT `seatno` FROM `bookings` WHERE `scheduleid` = :schedule_id AND `payment_status` = "accepted"');
            $this->db->bind(':schedule_id', $schedule_id);
        
            $results = $this->db->resultSet();
            return $results;
        }
       
        public function getBookingCount($schedule_id){
            $this->db->query('SELECT COUNT(`seatno`) AS count FROM `bookings` WHERE `scheduleid` = :schedule_id AND `payment_status` = "accepted"');
            $this->db->bind(':schedule_id', $schedule_id);
        
            $results = $this->db->resultSet();
            return $results;
        }

        public function getScheduleById($schedule_id){
            $this->db->query('SELECT 
            schedule.id,
            schedule.schedule_defId,
            schedule.date,
            schedule_def.day,
            schedule_def.route_id,
            schedule_def.arrival_time,
            schedule_def.departure_time,
            from_station.station AS from_station,
            to_station.station AS to_station,
            routes.route_num,
            routes.ticket_price,
            buses.bus_no,
            buses.bus_model,
            buses.seats,
            buses.seats_per_row
        FROM 
            schedule
        JOIN 
            schedule_def ON schedule.schedule_defId = schedule_def.id
        JOIN 
            routes ON schedule_def.route_id = routes.id
        JOIN 
            stations AS from_station ON routes.fromstationid = from_station.id
        JOIN 
            stations AS to_station ON routes.tostationid = to_station.id
        LEFT JOIN
            bus_assigned ON schedule.id = bus_assigned.schedule_id
        LEFT JOIN
            buses ON bus_assigned.bus_no = buses.bus_no
        WHERE 
            schedule.id = :schedule_id
            
         ');

            $this->db->bind(':schedule_id', $schedule_id);
        
            $results = $this->db->resultSet();
            return $results;
        }

        public function addBooking( $order_id, $schedule_id, $seatno, $user_id, $userType){
            $this->db->query('INSERT INTO `bookings` (`order_id`, `scheduleid`, `seatno`, `user_id`, `user_type`) VALUES (:order_id, :schedule_id, :seatno, :user_id, :user_type)');
            $this->db->bind(':order_id', $order_id);
            $this->db->bind(':schedule_id', $schedule_id);
            $this->db->bind(':seatno', $seatno);
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':user_type', $userType);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function updateBookingStatus($order_id, $status){
            $this->db->query('UPDATE `bookings` SET `payment status` = :status WHERE `order_id` = :order_id');
            $this->db->bind(':order_id', $order_id);
            $this->db->bind(':status', $status);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteBooking($order_id){
            $this->db->query('DELETE FROM `bookings` WHERE `order_id` = :order_id');
            $this->db->bind(':order_id', $order_id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getLastSeatByScheduleId($schedule_id){
            $this->db->query('SELECT `seatno` FROM `bookings` WHERE `scheduleid` = :schedule_id ORDER BY `seatno` DESC LIMIT 1');
            $this->db->bind(':schedule_id', $schedule_id);
        
            $results = $this->db->resultSet();
            return $results;
        }

        public function getBookingsByNIC($nice){
            $this->db->query("
                        SELECT s_from.station AS from_station,
                        s_to.station AS to_station,
                        schedule_def.arrival_time,
                        schedule_def.departure_time,
                        b.seatno
                FROM routes r
                JOIN stations s_from ON r.fromstationid = s_from.id
                JOIN stations s_to ON r.tostationid = s_to.id
                JOIN schedule_def ON schedule_def.route_id = r.id
                JOIN schedule sch ON schedule_def.id = sch.schedule_defId
                JOIN bookings b ON sch.id = b.scheduleid
                WHERE b.user_id = :nic
                AND b.payment_status = 'active';
            ");
            
            $this->db->bind(':nic', $nic);    

            $results = $this->db->resultSet();
            return $results;
        }
    }