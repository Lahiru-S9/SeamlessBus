<?php

class Scheduler {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSchedulers(){
        // $this->db->query('SELECT schedulers.id AS scheduler_id,
        // users.name AS scheduler_name,
        // GROUP_CONCAT(schedulers.station_id) AS station_ids,
        // GROUP_CONCAT(stations.station) AS station_names
        // FROM users
        // JOIN schedulers ON scheduler_details.id = schedulers.scheduler_id
        // JOIN scheduler_details ON scheduler_details.id = users.id
        // JOIN stations ON schedulers.station_id = stations.id
        // GROUP BY schedulers.scheduler_id;
        // ');

        $this->db->query('SELECT users.name, scheduler_details.id AS scheduler_id,
        GROUP_CONCAT(schedulers.station_id) AS station_ids,
        GROUP_CONCAT(stations.station) AS station_names
        FROM users
        JOIN scheduler_details ON users.id = scheduler_details.user_id
        LEFT JOIN schedulers ON schedulers.scheduler_id = scheduler_details.id
        LEFT JOIN stations ON schedulers.station_id = stations.id
        GROUP BY scheduler_details.id;');
        
        
        $results = $this->db->resultSet();
        return $results;
    
        
        
    }

    public function updateStationsForScheduler($schedulerId, $stationIds) {
        // Delete all stations for the given scheduler
        $this->db->query('DELETE FROM schedulers WHERE scheduler_id = :scheduler_id');
        $this->db->bind(':scheduler_id', $schedulerId);
        $this->db->execute();

        // Insert the new stations
        $this->db->query('INSERT INTO schedulers (scheduler_id, station_id) VALUES (:scheduler_id, :station_id)');
        $this->db->bind(':scheduler_id', $schedulerId);
        foreach($stationIds as $stationId){
            $this->db->bind(':station_id', $stationId);
            $this->db->execute();
        }
    }

   

    
    
    

}