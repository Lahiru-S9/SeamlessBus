<?php

    class Schedule extends Controller{
        public function __construct(){
          $this->scheduleModel = $this->model('Schedulerow');
        }

        public function index(){
            //Get Schedule
            $schedule = $this->scheduleModel->getSchedule();

            $data =  [
                'schedule' => $schedule,
            ];
   
            $this->view('schedule/index', $data);
        }

        


    }