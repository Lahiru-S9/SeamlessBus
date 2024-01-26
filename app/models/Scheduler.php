<?php

class Scheduler {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSchedulers(){
        $this->db->query('SELECT users.id AS user_id,
        users.name AS scheduler_name,
        GROUP_CONCAT(schedulers.station_id) AS station_ids,
        GROUP_CONCAT(stations.station) AS station_names
        FROM users
        LEFT JOIN schedulers ON users.id = schedulers.user_id
        LEFT JOIN stations ON schedulers.station_id = stations.id
        WHERE users.usertype = 6
        GROUP BY users.id, users.name;
        ');
        
        $results = $this->db->resultSet();
        return $results;
    
        
        
    }

    
    
    

}