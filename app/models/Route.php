<?php

class Route {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getRoutes(){
        $this->db->query('SELECT DISTINCT route_num AS "Route Number" FROM routes');
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

    public function getRoutesbySchedulerWithDetails($id){
        $this->db->query('SELECT 
        routes.route_num,
        routes.ticket_price,
        tostation.station AS tostation,
        fromstation.station AS fromstation,
        COUNT(buses.bus_no) AS bus_count
    FROM 
        routes 
    JOIN 
        schedulers ON schedulers.station_id = routes.tostationid
    JOIN 
        stations AS tostation ON routes.tostationid = tostation.id
    JOIN 
        stations AS fromstation ON routes.fromstationid = fromstation.id
    JOIN 
        scheduler_details ON schedulers.scheduler_id = scheduler_details.id 
    LEFT JOIN 
        buses ON routes.route_num = buses.route_num
    WHERE 
        scheduler_details.user_id = :id
    GROUP BY 
        routes.route_num, tostation, fromstation;
    ');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getRouteByRouteNumber($routeNumber){
        $this->db->query('SELECT * FROM routes WHERE route_num = :route_num');
        $this->db->bind(':route_num', $routeNumber);
        $result = $this->db->single();
        return $result;
    }

    public function addRoute($data) {
        $this->db->query('INSERT INTO routes (route_num, tostationid, fromstationid) VALUES (:route_num, :to, :from)');
        $this->db->bind(':route_num', $data['routeNumber']);
        $this->db->bind(':to', $data['to']);
        $this->db->bind(':from', $data['from']);
    
        // Insert the first record with tostationid:to and fromstationid:from
        if ($this->db->execute()) {
            // Swap the values for the second record
            $this->db->bind(':to', $data['from']);
            $this->db->bind(':from', $data['to']);
    
            // Insert the second record with fromstationid:from and tostationid:to
            if ($this->db->execute()) {
                return true;
            }
        }
    
        return false;
    }

    public function deleteRoute($routeNumber) {
        $this->db->query('DELETE FROM routes WHERE route_num = :route_num');
        $this->db->bind(':route_num', $routeNumber);
        return $this->db->execute();
    }
    
    public function updateTicketPrice($data) {
        $this->db->query('UPDATE routes SET ticket_price = :ticket_price WHERE route_num = :route_num');
        $this->db->bind(':ticket_price', $data['ticketPrice']);
        $this->db->bind(':route_num', $data['route_num']);
        return $this->db->execute();
    }
    
}