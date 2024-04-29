<?php

class Schedulerow {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSchedule(){
        $this->db->query('SELECT 
        schedule.id,
        schedule.schedule_defId,
        schedule.date,
        schedule_def.day,
        schedule_def.route_id,
        schedule_def.arrival_time,
        schedule_def.departure_time,
        from_station.station AS from_station,
        to_station.station AS to_station,
        routes.route_num,
        routes.ticket_price
    FROM 
        schedule
    JOIN 
        schedule_def ON schedule.schedule_defId = schedule_def.id
    JOIN 
        routes ON schedule_def.route_id = routes.id
    JOIN 
        stations AS from_station ON routes.fromstationid = from_station.id
    JOIN 
        stations AS to_station ON routes.tostationid = to_station.id
    WHERE 
        schedule.date > CURDATE() OR (schedule.date = CURDATE() AND schedule_def.arrival_time > CURTIME());
        
     ');

        $results = $this->db->resultSet();

        return $results;
    }

    // public function getScheduleByStation($from, $to) {
    //     $this->db->query('SELECT *,
    //                         stations.station AS from_station, 
    //                         s.station AS to_station
    //                         FROM schedule AS sc
    //                         JOIN routes AS r ON sc.routeid = r.id
    //                         JOIN stations AS stations ON r.fromstationid = stations.id
    //                         JOIN stations AS s ON r.tostationid = s.id
    //                         WHERE stations.id = :from AND s.id = :to
    //                      ');

    //     $this->db->bind(':from', $from); // Bind the value for :from
    //     $this->db->bind(':to', $to);     // Bind the value for :to

    //     $results = $this->db->resultSet();

    //     return $results;
    // }

    // public function getScheduleByStation($from, $to) {
    //     $this->db->query('SELECT 
    //     schedule.id,
    //     schedule.schedule_defId,
    //     schedule.date,
    //     schedule_def.day,
    //     schedule_def.route_id,
    //     schedule_def.arrival_time,
    //     schedule_def.departure_time,
    //     from_station.station AS from_station,
    //     to_station.station AS to_station,
    //     routes.route_num,
    //     routes.ticket_price
    // FROM 
    //     schedule
    // JOIN 
    //     schedule_def ON schedule.schedule_defId = schedule_def.id
    // JOIN 
    //     routes ON schedule_def.route_id = routes.id
    // JOIN 
    //     stations AS from_station ON routes.fromstationid = from_station.id
    // JOIN 
    //     stations AS to_station ON routes.tostationid = to_station.id
    // WHERE 
    //     from_station.id = :from AND to_station.id = :to;
    
        
    //  ');

    //     $this->db->bind(':from', $from); // Bind the value for :from
    //     $this->db->bind(':to', $to);     // Bind the value for :to

    //     $results = $this->db->resultSet();

    //     return $results;
    // }

    // public function getScheduleByFromStation($from) {
    //     $this->db->query('SELECT 
    //     schedule.id,
    //     schedule.schedule_defId,
    //     schedule.date,
    //     schedule_def.day,
    //     schedule_def.route_id,
    //     schedule_def.arrival_time,
    //     schedule_def.departure_time,
    //     from_station.station AS from_station,
    //     to_station.station AS to_station,
    //     routes.route_num,
    //     routes.ticket_price
    // FROM 
    //     schedule
    // JOIN 
    //     schedule_def ON schedule.schedule_defId = schedule_def.id
    // JOIN 
    //     routes ON schedule_def.route_id = routes.id
    // JOIN 
    //     stations AS from_station ON routes.fromstationid = from_station.id
    // JOIN 
    //     stations AS to_station ON routes.tostationid = to_station.id
    // WHERE 
    //     from_station.id = :from;
    
        
    //  ');

    //     $this->db->bind(':from', $from); // Bind the value for :from
        

    //     $results = $this->db->resultSet();

    //     return $results;
    // }

    // public function getScheduleByToStation($to) {
    //     $this->db->query('SELECT 
    //     schedule.id,
    //     schedule.schedule_defId,
    //     schedule.date,
    //     schedule_def.day,
    //     schedule_def.route_id,
    //     schedule_def.arrival_time,
    //     schedule_def.departure_time,
    //     from_station.station AS from_station,
    //     to_station.station AS to_station,
    //     routes.route_num,
    //     routes.ticket_price
    // FROM 
    //     schedule
    // JOIN 
    //     schedule_def ON schedule.schedule_defId = schedule_def.id
    // JOIN 
    //     routes ON schedule_def.route_id = routes.id
    // JOIN 
    //     stations AS from_station ON routes.fromstationid = from_station.id
    // JOIN 
    //     stations AS to_station ON routes.tostationid = to_station.id
    // WHERE 
    //     to_station.id = :to;
    
        
    //  ');

    //     $this->db->bind(':to', $to);     // Bind the value for :to

    //     $results = $this->db->resultSet();

    //     return $results;
    // }

    public function getScheduleFilter($from = null, $to = null, $day = null, $date = null, $route_num = null) {
        // Start building the SQL query
        
        $sql = 'SELECT 
            schedule.id,
            schedule.schedule_defId,
            schedule.date,
            schedule_def.day,
            schedule_def.route_id,
            schedule_def.arrival_time,
            schedule_def.departure_time,
            from_station.station AS from_station,
            to_station.station AS to_station,
            routes.route_num,
            routes.ticket_price
        FROM 
            schedule
        JOIN 
            schedule_def ON schedule.schedule_defId = schedule_def.id
        JOIN 
            routes ON schedule_def.route_id = routes.id
        JOIN 
            stations AS from_station ON routes.fromstationid = from_station.id
        JOIN 
            stations AS to_station ON routes.tostationid = to_station.id';
    
        // Conditionally add filters to the SQL query
        if ($from !== null && $to !== null) {
            $sql .= ' WHERE from_station.id = :from AND to_station.id = :to';
        } elseif ($from !== null) {
            $sql .= ' WHERE from_station.id = :from';
        } elseif ($to !== null) {
            $sql .= ' WHERE to_station.id = :to';
        }
    
        if ($day !== null) {
            $sql .= ' AND schedule_def.day = :day';
        }
    
        if ($date !== null) {
            $sql .= ' AND schedule.date = :date';
        }
    
        if ($route_num !== null) {
            $sql .= ' AND routes.route_num = :route_num';
        }
    
        // Prepare the SQL query
        $this->db->query($sql);
    
        // Bind parameters if they are provided
        if ($from !== null && $to !== null) {
            $this->db->bind(':from', $from);
            $this->db->bind(':to', $to);
        } elseif ($from !== null) {
            $this->db->bind(':from', $from);
        } elseif ($to !== null) {
            $this->db->bind(':to', $to);
        }
    
        if ($day !== null) {
            $this->db->bind(':day', $day);
        }
    
        if ($date !== null) {
            $this->db->bind(':date', $date);
        }
    
        if ($route_num !== null) {
            $this->db->bind(':route_num', $route_num);
        }

        // echo "Executed Query: " . $sql . "<br>";
    
        // Execute the query and fetch results
        $results = $this->db->resultSet();
    
        return $results;
    }
    

    public function getScheduleByDay($day,$id) {
        $this->db->query('SELECT sc.id, sc.arrival_time, sc.departure_time,
                                    stations.station AS from_station, 
                                    s.station AS to_station,
                                    r.route_num
                            FROM schedule_def AS sc
                            JOIN routes AS r ON sc.route_id = r.id
                            JOIN stations AS stations ON r.fromstationid = stations.id
                            JOIN stations AS s ON r.tostationid = s.id
                            JOIN schedulers ON (stations.id = schedulers.station_id OR s.id = schedulers.station_id)
                            JOIN scheduler_details ON schedulers.scheduler_id = scheduler_details.id
                            WHERE sc.day = :day AND scheduler_details.user_id = :id;
                         ');

        $this->db->bind(':day', $day); // Bind the value for :day
        $this->db->bind(':id', $id); // Bind the value for :id

        $results = $this->db->resultSet();

        return $results;
    }

    public function getStationsByRouteNum($route_num) {
        $this->db->query('SELECT stations.station AS from_station, 
                            s.station AS to_station
                            FROM routes AS r
                            JOIN stations AS stations ON r.fromstationid = stations.id
                            JOIN stations AS s ON r.tostationid = s.id
                            WHERE r.route_num = :route_num
                         ');

        $this->db->bind(':route_num', $route_num); // Bind the value for :route_num

        $results = $this->db->resultSet();

        return $results;
    }

    public function getRouteNumbers($id) {
        $this->db->query('SELECT DISTINCT route_num FROM routes JOIN schedulers ON schedulers.station_id = routes.tostationid 
        JOIN scheduler_details ON schedulers.scheduler_id = scheduler_details.id 
        WHERE  scheduler_details.user_id= :id');

        $this->db->bind(':id', $id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function addSchedule($data) {
        $this->db->query('INSERT INTO schedule_def (route_id, arrival_time, departure_time, day) VALUES(:route_id, :arrival_time, :departure_time, :day)');

        $this->db->bind(':route_id', $data['route_id']);
        $this->db->bind(':arrival_time', $data['arrival_time']);
        $this->db->bind(':departure_time', $data['departure_time']);
        $this->db->bind(':day', $data['day']);

        if($this->db->execute()){
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function deleteSchedule($id) {
        $this->db->query('DELETE FROM schedule_def WHERE id = :id');

        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getRouteID($to_station, $from_station)
    {
        $this->db->query('SELECT
                            r.id
                        FROM
                            routes r
                        INNER JOIN stations from_station ON
                            from_station.station = :from_station
                        INNER JOIN stations to_station ON
                            to_station.station = :to_station
                        WHERE
                            r.fromstationid = from_station.id AND r.tostationid = to_station.id;
        ');

        // die($to_station." ".$from_station);

        $this->db->bind(':from_station', $from_station);
        $this->db->bind(':to_station', $to_station);

        
        $row = $this->db->single();

        return $row;
    }

    public function getScheduleById($id) {
        $this->db->query('SELECT sc.day, sc.arrival_time, sc.departure_time,
                                    stations.station AS from_station, 
                                    s.station AS to_station,
                                    r.route_num                                                                                                 
                            FROM schedule_def AS sc
                            JOIN routes AS r ON sc.route_id = r.id
                            JOIN stations AS stations ON r.fromstationid = stations.id
                            JOIN stations AS s ON r.tostationid = s.id
                            WHERE sc.id = :id;
                         ');

        $this->db->bind(':id', $id); // Bind the value for :day

        $results = $this->db->resultSet();

        return $results;
    }
    
    

}