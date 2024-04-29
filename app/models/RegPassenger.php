<?php
    class RegPassenger{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getTotalBookingsCount($passenger_id){
            $this->db->query("SELECT COUNT(*) AS total_bookings FROM bookings WHERE (payment_status='finished' AND id = :passenger_id)");
            
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
                        schedule_def.arrival_time,
                        schedule_def.departure_time,
                        b.seatno
                FROM routes r
                JOIN stations s_from ON r.fromstationid = s_from.id
                JOIN stations s_to ON r.tostationid = s_to.id
                JOIN schedule_def ON schedule_def.route_id = r.id
                JOIN schedule sch ON schedule_def.id = sch.schedule_defId
                JOIN bookings b ON sch.id = b.scheduleid
                WHERE b.user_id = :passenger_id
                AND b.payment_status = 'active';
            ");
            
            $this->db->bind(':passenger_id', $passenger_id);    

            $results = $this->db->resultSet();
            return $results;
        }

        public function getFinishedBookings($passenger_id){
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
        WHERE b.user_id = :passenger_id
        AND b.payment_status = 'finished';
            ");
            
            $this->db->bind(':passenger_id', $passenger_id);    

            $results = $this->db->resultSet();
            return $results;
        }

        public function updateRegPassengerById($data){
            $this->db->query("UPDATE users u
            JOIN reg_passengers rp ON u.id = rp.user_id
            SET u.email = :email,
                rp.phone = :phone,
                rp.mobile = :mobile,
                rp.address = :address
            WHERE u.id = :id;");

            $this->db->bind(':id', $data['id'],);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':mobile', $data['mobile']); 
            $this->db->bind(':address', $data['address']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }