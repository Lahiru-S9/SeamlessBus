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

        public function getDetails($passenger_id){
            $this->db->query("SELECT * FROM reg_passengers WHERE user_id = :passenger_id");
            
            $this->db->bind(':passenger_id', $passenger_id);    

            $results = $this->db->resultSet();
            return $results;
        }
        
        public function getSavedRoutes($passenger_id){
            $this->db->query("
                SELECT 
                    from_station.station AS from_station_name,
                    to_station.station AS to_station_name
                FROM 
                    saved_routes sr
                JOIN 
                    routes r ON sr.route_id = r.id
                JOIN 
                    stations from_station ON r.fromstationid = from_station.id
                JOIN 
                    stations to_station ON r.tostationid = to_station.id
                WHERE 
                    sr.reg_passenger_id = :passenger_id
            ");
            
            $this->db->bind(':passenger_id', $passenger_id);    

            $results = $this->db->resultSet();
            return $results;
        }

        public function getActiveBookings($passenger_id){
            $this->db->query("
                        SELECT s_from.station AS from_station,
                        s_to.station AS to_station,
                        sch.arrival_time,
                        sch.departure_time,
                        b.seatno
                FROM saved_routes sr
                JOIN routes r ON sr.route_id = r.id
                JOIN stations s_from ON r.fromstationid = s_from.id
                JOIN stations s_to ON r.tostationid = s_to.id
                JOIN schedule sch ON r.id = sch.routeid
                JOIN bookings b ON sch.id = b.scheduleid
                JOIN booked_regpassengers br ON b.id = br.bookingid
                WHERE br.passengerid = :passenger_id
                AND br.status = 'active';
            ");
            
            $this->db->bind(':passenger_id', $passenger_id);    

            $results = $this->db->resultSet();
            return $results;
        }

        public function getFinishedBookings($passenger_id){
            $this->db->query("
                        SELECT s_from.station AS from_station,
                        s_to.station AS to_station,
                        sch.arrival_time,
                        sch.departure_time,
                        b.seatno
                FROM saved_routes sr
                JOIN routes r ON sr.route_id = r.id
                JOIN stations s_from ON r.fromstationid = s_from.id
                JOIN stations s_to ON r.tostationid = s_to.id
                JOIN schedule sch ON r.id = sch.routeid
                JOIN bookings b ON sch.id = b.scheduleid
                JOIN booked_regpassengers br ON b.id = br.bookingid
                WHERE br.passengerid = :passenger_id
                AND br.status = 'finished';
            ");
            
            $this->db->bind(':passenger_id', $passenger_id);    

            $results = $this->db->resultSet();
            return $results;
        }
    }