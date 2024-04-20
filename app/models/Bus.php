<?php

class Bus {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addBus($data){
        $this->db->query('INSERT INTO buses (bus_no, bus_model, seats, permitid, ownerid, seats_per_row, route_num) VALUES (:bus_number, :bus_model, :bus_seat, :permit_id, :owner_id, :seats_per_row, :route_num)');
        //Bind values
        $this->db->bind(':bus_number', $data['bus_number']);
        $this->db->bind(':bus_model', $data['bus_model']);
        $this->db->bind(':bus_seat', $data['bus_seat']);
        $this->db->bind(':permit_id', $data['permit_id']);
        $this->db->bind(':owner_id', $_SESSION['user_id']);
        $this->db->bind(':seats_per_row', $data['seats_per_row']);
        $this->db->bind(':route_num', $data['request_a_route']);

        //Execute function
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function findBusByBusNo($bus_no){
        $this->db->query('SELECT * FROM buses WHERE bus_no = :bus_no');
        //Bind value
        $this->db->bind(':bus_no', $bus_no);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function getBusesByOwnerId($owner_id){
        $this->db->query('SELECT * FROM buses WHERE ownerid = :owner_id');
        //Bind value
        $this->db->bind(':owner_id', $owner_id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getRequestedBusesBySchdeuler($scheduler_id){
        $this->db->query("SELECT 
        buses.bus_no,
        buses.bus_model,
        buses.permitid,
        buses.ownerid,
        users.name AS owner_name,
        users.email AS owner_email,
        MAX(routes.route_num) AS route_num,
        MAX(schedulers.station_id) AS station_id,
        MAX(scheduler_details.id) AS scheduler_id,
        MAX(scheduler_details.user_id) AS user_id
    FROM 
        buses
    JOIN 
        routes ON buses.route_num = routes.route_num
    JOIN 
        schedulers ON (routes.fromstationid = schedulers.station_id OR routes.tostationid = schedulers.station_id)
    JOIN 
        scheduler_details ON scheduler_details.id = schedulers.scheduler_id
    JOIN
        users ON buses.ownerid = users.id
    WHERE 
        buses.status = 'Requested' AND scheduler_details.user_id = :scheduler_id
    GROUP BY 
        buses.bus_no;
        ");
        $this->db->bind(':scheduler_id', $scheduler_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function updateBusStatus($bus_no, $status){
        $this->db->query('UPDATE buses SET status = :status, status_updated_on = CURRENT_TIMESTAMP WHERE bus_no = :bus_no');
        //Bind values
        $this->db->bind(':bus_no', $bus_no);
        $this->db->bind(':status', $status);

        //Execute function
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}