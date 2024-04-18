<?php

class Route {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getRoutes(){
        $this->db->query('SELECT route_num AS "Route Number" FROM routes');
        $results = $this->db->resultSet();
        return $results;
    }
}