<?php

    class Schedule extends Controller{
        public function __construct(){
          $this->scheduleModel = $this->model('Schedulerow');
          $this->stationModel = $this->model('Station');
        }

        public function index(){
            //Get Schedule
            $schedule = $this->scheduleModel->getSchedule();
            $stations = $this->stationModel->getAllStations();
            $data =  [
                'schedule' => $schedule,
                'stations' => $stations,
            ];
   
            $this->view('schedule/index', $data);
        }

        


    }