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

}