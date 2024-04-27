<?php

class Station {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all stations
    public function getAllStations() {
        $this->db->query('SELECT * FROM stations');
        return $this->db->resultSet();
    }

    // Get a specific station by ID
    public function getStationById($id) {
        $this->db->query('SELECT * FROM stations WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Add a new station
    public function addStation($data) {
        $this->db->query('INSERT INTO stations (station) VALUES (:station)');
        $this->db->bind(':station', $data['station']);
        return $this->db->execute();
    }

    // Update a station
    public function updateStation($data) {
        $this->db->query('UPDATE stations SET station = :station WHERE id = :id');
        $this->db->bind(':station', $data['station']);
        $this->db->bind(':id', $data['id']);
        return $this->db->execute();
    }

    // Delete a station
    public function deleteStation($id) {
        $this->db->query('DELETE FROM stations WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function getStationsWithSchedulers() {
        $this->db->query('SELECT stations.id AS station_id,
        stations.station,
        GROUP_CONCAT(schedulers.scheduler_id) AS scheduler_ids,
        GROUP_CONCAT(users.name) AS scheduler_names
        FROM users
        JOIN scheduler_details ON users.id = scheduler_details.user_id
        JOIN schedulers ON schedulers.scheduler_id = scheduler_details.id
        RIGHT JOIN stations ON schedulers.station_id = stations.id
        GROUP BY stations.id, stations.station;
 
        ');
        
        $result = $this->db->resultSet();

        return $result; 
    }

    public function updateSchedulersForStation($stationId, $schedulerIds) {
        // Delete all schedulers for the given station
        $this->db->query('DELETE FROM schedulers WHERE station_id = :station_id');
        $this->db->bind(':station_id', $stationId);
        $this->db->execute();

        // Insert the new schedulers
        $this->db->query('INSERT INTO schedulers (scheduler_id, station_id) VALUES (:scheduler_id, :station_id)');
        $this->db->bind(':station_id', $stationId);
        foreach($schedulerIds as $schedulerId){
            $this->db->bind(':scheduler_id', $schedulerId);
            $this->db->execute();
        }
    }

    public function getToStationsByScheduler($id){
        $this->db->query('SELECT DISTINCT station AS "Option" FROM stations
        JOIN routes ON (stations.id = routes.tostationid OR stations.id = routes.fromstationid)
        JOIN schedulers ON (schedulers.station_id = routes.fromstationid OR schedulers.station_id = routes.tostationid)
        JOIN scheduler_details ON schedulers.scheduler_id = scheduler_details.id 
        WHERE  scheduler_details.user_id= :id');

        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function getSchedulerStation($id){
        $this->db->query('SELECT station FROM stations
        JOIN schedulers ON schedulers.station_id = stations.id
        JOIN scheduler_details ON schedulers.scheduler_id = scheduler_details.id 
        WHERE  scheduler_details.user_id= :id');

        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;

    }
}
