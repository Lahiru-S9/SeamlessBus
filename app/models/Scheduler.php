<?php

class Scheduler {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSchedulers(){
        $this->db->query('SELECT schedulers.id, users.name AS scheduler_name, stations.id AS station_id, stations.station
        FROM users
        LEFT JOIN schedulers ON users.id = schedulers.user_id
        LEFT JOIN stations ON schedulers.station_id = stations.id
        WHERE users.usertype = 6');
        
        $results = $this->db->resultSet();
    
        return $results;
    }

    
    
    

}