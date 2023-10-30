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
}
