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

    // public function getBusesByOwnerId($owner_id){
    //     $this->db->query('SELECT * FROM buses LEFT JOIN conductors ON buses.bus_no=conductors.assigned_to LEFT JOIN users ON users.id = conductors.user_id WHERE ownerid = :owner_id');
    //     //Bind value
    //     $this->db->bind(':owner_id', $owner_id);

    //     $results = $this->db->resultSet();

    //     return $results;
    // }

    public function getBusesByOwnerId($owner_id){
        $this->db->query('SELECT buses.*, conductors.id AS conductorId, users.* FROM buses LEFT JOIN conductors ON buses.bus_no=conductors.assigned_to LEFT JOIN users ON users.id = conductors.user_id WHERE buses.ownerid = :owner_id');
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
        buses.status = 'requested' AND scheduler_details.user_id = :scheduler_id
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

    public function requestRoute($busId,$route){
        $this->db->query('UPDATE buses SET route_num = :route, status ="requested", status_updated_on = CURRENT_TIMESTAMP WHERE bus_no = :busId');
        //Bind values
        $this->db->bind(':busId', $busId);
        $this->db->bind(':route', $route);

        //Execute function
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getBusesBySchedulerId($id){
        $this->db->query('SELECT 
        buses.bus_no,
        buses.bus_model,
        buses.permitid,
        buses.route_num,
        buses.status,
        users.name,
        to_station.station AS to_station,
        from_station.station AS from_station
    FROM 
        buses
    JOIN 
        users ON buses.ownerid = users.id
    JOIN 
        routes ON buses.route_num = routes.route_num
    JOIN 
        stations AS to_station ON routes.tostationid = to_station.id 
    JOIN
        stations AS from_station ON routes.fromstationid = from_station.id 
    WHERE 
        status IN ("accepted", "paused") AND 
        (routes.fromstationid = (SELECT station_id FROM schedulers JOIN scheduler_details ON scheduler_details.id = schedulers.scheduler_id WHERE scheduler_details.user_id = :id) OR 
         routes.tostationid = (SELECT station_id FROM schedulers JOIN scheduler_details ON scheduler_details.id = schedulers.scheduler_id WHERE scheduler_details.user_id = :id))
    ');


        //Bind value
        $this->db->bind(':id', $id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getFilteredBuses($sql,$id,$filter_value){
        $this->db->query($sql); //This parameter represents the SQL query to be executed for fetching the filtered buses. It is a dynamic query that may contain placeholders for bind parameters.
        $this->db->bind(':id', $id);//owner_id 
        $this->db->bind(':filter_value', $filter_value);//It represents the value used to filter the buses based on a specific condition.
        $results = $this->db->resultSet();
        return $results;
    }

    public function assignConductor($data){
        $this->db->query('UPDATE conductors SET assigned_to = :bus_no WHERE id = :conductor_id');
        //Bind values
        $this->db->bind(':bus_no', $data['bus_no']);
        $this->db->bind(':conductor_id', $data['conductor_id']);

        //Execute function
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }
    // Conductor Model
    //public function getConductorsWithDetailsWithAddressA(){
    //$this->db->query("SELECT * FROM conductors WHERE address LIKE 'A%A'");
    //return $this->db->resultSet();




//   public function seeReports($data){
//         $this->db->query('SELECT 
//         buses.bus_no, 
//         COUNT(bookings.id) AS booking_count,
//         routes.ticket_price,
//         COUNT(bookings.id) * routes.ticket_price AS total_revenue
//         FROM 
//             bookings
//         JOIN 
//             schedule ON bookings.scheduleid = schedule.id 
//         JOIN
//             schedule_def ON schedule_def.id = schedule.schedule_defId 
//         JOIN 
//             bus_assigned ON schedule.id = bus_assigned.schedule_id
//         JOIN 
//             buses ON bus_assigned.bus_no = buses.bus_no 
//         JOIN
//             routes ON routes.id = schedule_def.route_id
//         WHERE
//             buses.ownerid = :id 
//         GROUP BY 
//             buses.bus_no, routes.ticket_price;');
   
//    //bind values
//     $this->db->bind(':id', $data['owner_id']);
//     $results = $this->db->resultSet();
//     return $results;
//  }

 public function seeReports($data){
    $this->db->query('SELECT 
    buses.bus_no,
    COUNT(bookings.id) AS booking_count,
    routes.ticket_price,
    COUNT(bookings.id) * routes.ticket_price AS total_revenue
FROM 
    bookings 
JOIN 
    schedule ON bookings.scheduleid = schedule.id
JOIN
    schedule_def ON schedule_def.id = schedule.schedule_defId
JOIN 
    bus_assigned ON schedule.id = bus_assigned.schedule_id
JOIN 
    buses ON bus_assigned.bus_no = buses.bus_no
JOIN 
    routes ON routes.id = schedule_def.route_id
WHERE 
    buses.ownerid = :id AND schedule.date >= LAST_DAY(CURRENT_DATE - INTERVAL 1 MONTH) + INTERVAL 1 DAY
    AND schedule.date < LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY
GROUP BY 
    buses.bus_no, routes.ticket_price;');

//bind values
$this->db->bind(':id', $data['owner_id']);
$results = $this->db->resultSet();
return $results;
}

public function OnGoingBus($id){
    $this->db->query('SELECT 
    buses.bus_no,
    schedule.date,
    schedule_def.departure_time,
    COUNT(bookings.order_id) AS booking_count,
    COUNT(bookings.id) AS seats
    FROM
    bookings 
    JOIN 
        schedule ON schedule.id = bookings.scheduleid 
    JOIN
        schedule_def ON schedule_def.id = schedule.schedule_defId
    JOIN
        bus_assigned ON bus_assigned.schedule_id = schedule.id 
    JOIN 
        buses ON buses.bus_no = bus_assigned.bus_no 
    WHERE
         buses.ownerid = :id AND DATE(schedule.date) = CURDATE() AND bookings.payment_status = "accepted"
    GROUP BY
        buses.bus_no;');
    
    $this->db->bind(':id' , $id);
    $results = $this->db->resultSet();
    return $results;
}
}