<?php

class Schedulerow {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSchedule(){
        $this->db->query('SELECT * FROM schedule');

        $results = $this->db->resultSet();

        return $results;
    }
}