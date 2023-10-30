<?php

    class Schedule extends Controller{
        public function __construct(){
          $this->scheduleModel = $this->model('Schedulerow');
          $this->stationModel = $this->model('Station');
        }

        public function index(){
            $stations = $this->stationModel->getAllStations();

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'from' => trim($_POST['from']),
                    'to' => trim($_POST['to']),
                    'from_err' => '',
                    'to_err' => '',
                ];


                if(empty($data['from'])){
                    $data['from_err'] = 'Please select a station';
                }

                if(empty($data['to'])){
                    $data['to_err'] = 'Please select a station';
                }

                if(empty($data['from_err']) && empty($data['to_err'])){
                    $schedule = $this->scheduleModel->getScheduleByStation($data['from'], $data['to']);
                    $data =  [
                        'schedule' => $schedule,
                        'stations' => $stations,
                    ];
                    $this->view('schedule/index', $data);
                }else{
                    $this->view('schedule/index', $data);
                }
            }else{
            //Get Schedule
            $schedule = $this->scheduleModel->getSchedule();
            
            $data =  [
                'schedule' => $schedule,
                'stations' => $stations,
            ];
   
            $this->view('schedule/index', $data);
            }
        }

        


    }