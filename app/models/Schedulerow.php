<?php

class Schedulerow {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSchedule(){
        $this->db->query('SELECT *,
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
    

}