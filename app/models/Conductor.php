<?php

class Bus {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getConductor(){
        $this->db->query('SELECT *
        FROM users
        JOIN conductors ON users.id = conductors.user_id
        WHERE users.user_type = 4;
        ');
        $results = $this->db->resultSet();

        return $results;
    }

}