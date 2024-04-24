<?php

class Conductor {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getConductors(){
        $this->db->query('SELECT *
        FROM users
        WHERE users.usertype = 4;
        ');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getConductorById($id){
        $this->db->query('SELECT * FROM users
        JOIN conductors ON users.id = conductors.user_id
        JOIN Stations ON conductors.station_id = stations.id
         WHERE users.id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updateConductorInfo($id, $address, $mobile, $station){
        $this->db->query('UPDATE conductors
        SET address = :address, mobile = :mobile, station_id = :station
        WHERE user_id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':address', $address);
        $this->db->bind(':mobile', $mobile);
        $this->db->bind(':station', $station);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getConductorsWithDetails(){
        $this->db->query('SELECT * FROM users
        JOIN conductors ON users.id = conductors.user_id');
        $results = $this->db->resultSet();

        return $results;
    }

}