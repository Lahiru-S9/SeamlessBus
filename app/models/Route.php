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

    public function getRoutesbyScheduler($id){
        $this->db->query('SELECT DISTINCT route_num AS "Option" FROM routes JOIN schedulers ON (schedulers.station_id = routes.tostationid OR schedulers.station_id = routes.fromstationid)
        JOIN scheduler_details ON schedulers.scheduler_id = scheduler_details.id 
        WHERE  scheduler_details.user_id= :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }
}