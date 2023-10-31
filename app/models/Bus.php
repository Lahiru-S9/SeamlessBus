<?php

class Bus {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addBus($data){
        $this->db->query('INSERT INTO buses (bus_no, bus_model, seats, permitid, ownerid) VALUES (:bus_number, :bus_model, :bus_seat, :permit_id, :owner_id)');
        //Bind values
        $this->db->bind(':bus_number', $data['bus_number']);
        $this->db->bind(':bus_model', $data['bus_model']);
        $this->db->bind(':bus_seat', $data['bus_seat']);
        $this->db->bind(':permit_id', $data['permit_id']);
        $this->db->bind(':owner_id', $_SESSION['user_id']);

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
}