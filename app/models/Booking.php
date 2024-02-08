<?php

    class Booking {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getSeats($schedule_id){
            $this->db->query('SELECT `seatno` FROM `bookings` WHERE `scheduleid` = :schedule_id');
            $this->db->bind(':schedule_id', $schedule_id);
        
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function getScheduleById($schedule_id){
            $this->db->query("SELECT 
            sch.id AS schedule_id,
            from_station.station AS from_station_name,
            to_station.station AS to_station_name,
            sch.arrival_time,
            sch.departure_time,
            route.ticket_price,
            bus.bus_no,
            bus.bus_model,
            bus.seats,
            bus.seats_per_row
        FROM 
            schedule AS sch
        JOIN 
            routes AS route ON sch.routeid = route.id
        JOIN 
            stations AS from_station ON route.fromstationid = from_station.id
        JOIN 
            stations AS to_station ON route.tostationid = to_station.id
        JOIN
            buses AS bus ON sch.bus_no = bus.bus_no
        WHERE 
            sch.id = :schedule_id;
        
                ");

            $this->db->bind(':schedule_id', $schedule_id);
        
            $results = $this->db->resultSet();
            return $results;
        }
    }