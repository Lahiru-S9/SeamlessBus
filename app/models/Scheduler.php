<?php

class Bus {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getScheduler(){
        $this->db->query('SELECT *
        FROM users
        JOIN schedulers ON users.id = schedulers.user_id
        WHERE users.user_type = 6;
        ');
        $results = $this->db->resultSet();

        return $results;
    }

}