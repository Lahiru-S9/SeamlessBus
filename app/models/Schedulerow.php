<?php

class Schedulerow {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSchedule(){
        $this->db->query('SELECT sc.id, sc.arrival_time, sc.departure_time, 
        stations.station AS from_station, 
        s.station AS to_station
        FROM schedule AS sc
        JOIN routes AS r ON sc.routeid = r.id
        JOIN stations AS stations ON r.fromstationid = stations.id
        JOIN stations AS s ON r.tostationid = s.id
     ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getScheduleByStation($from, $to) {
        $this->db->query('SELECT *,
                            stations.station AS from_station, 
                            s.station AS to_station
                            FROM schedule AS sc
                            JOIN routes AS r ON sc.routeid = r.id
                            JOIN stations AS stations ON r.fromstationid = stations.id
                            JOIN stations AS s ON r.tostationid = s.id
                            WHERE stations.id = :from AND s.id = :to
                         ');

        $this->db->bind(':from', $from); // Bind the value for :from
        $this->db->bind(':to', $to);     // Bind the value for :to

        $results = $this->db->resultSet();

        return $results;
    }

    public function getScheduleByDay($day) {
        $this->db->query('SELECT sc.id, sc.arrival_time, sc.departure_time, sc.route_num,
                            stations.station AS from_station, 
                            s.station AS to_station
                            FROM schedule_def AS sc
                            JOIN routes AS r ON sc.route_id = r.id
                            JOIN stations AS stations ON r.fromstationid = stations.id
                            JOIN stations AS s ON r.tostationid = s.id
                            WHERE sc.day = :day
                         ');

        $this->db->bind(':day', $day); // Bind the value for :day

        $results = $this->db->resultSet();

        return $results;
    }

    public function getStationsByRouteNum($route_num) {
        $this->db->query('SELECT stations.station AS from_station, 
                            s.station AS to_station
                            FROM routes AS r
                            JOIN stations AS stations ON r.fromstationid = stations.id
                            JOIN stations AS s ON r.tostationid = s.id
                            WHERE r.route_num = :route_num
                         ');

        $this->db->bind(':route_num', $route_num); // Bind the value for :route_num

        $results = $this->db->resultSet();

        return $results;
    }

    public function getRouteNumbers() {
        $this->db->query('SELECT route_num FROM routes');

        $results = $this->db->resultSet();

        return $results;
    }
    

}