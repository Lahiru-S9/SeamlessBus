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
        $this->db->query('SELECT stations.id AS station_id, stations.station, schedulers.id AS scheduler_id, users.name AS scheduler_name
        FROM stations
        LEFT JOIN schedulers ON stations.id = schedulers.station_id
        LEFT JOIN users ON schedulers.user_id = users.id;
        ');
        
        $result = $this->db->resultSet();

        return $result;
    }
}
