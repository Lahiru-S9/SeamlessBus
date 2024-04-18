<?php

    class Schedule extends Controller{
        public function __construct(){
          $this->scheduleModel = $this->model('Schedulerow');
          $this->stationModel = $this->model('Station');
          $this->routeModel = $this->model('Route');
        }

        public function index(){
            $stations = $this->stationModel->getAllStations();
            $route_nums = $this->routeModel->getRoutes();

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'from' => isset($_POST['from']) ? trim($_POST['from']) : null,
                    'to' => isset($_POST['to']) ? trim($_POST['to']) : null,
                    'day' => isset($_POST['day']) ? trim($_POST['day']) : null,
                    'date' => isset($_POST['date']) ? trim($_POST['date']) : null,
                    'route_num' => isset($_POST['route_num']) ? trim($_POST['route_num']) : null,
                    // 'from_err' => '',
                    // 'to_err' => '',
                ];

                if(empty($data['date'])) {
                    $data['date'] = null;
                }

                $schedule = $this->scheduleModel->getSchedulefilter($data['from'], $data['to'], $data['day'], $data['date'], $data['route_num']);
                $data =  [
                    'schedule' => $schedule,
                    'stations' => $stations,
                    'route_nums' => $route_nums,
                ];

                $this->view('schedule/index', $data);


                // if(empty($data['from'])){
                //     $data['from_err'] = 'Please select a station';
                // }

                // if(empty($data['to'])){
                //     $data['to_err'] = 'Please select a station';
                // }

                // if(empty($data['from_err']) && empty($data['to_err'])){
                //     $schedule = $this->scheduleModel->getScheduleByStation($data['from'], $data['to']);
                //     $data =  [
                //         'schedule' => $schedule,
                //         'stations' => $stations,
                //         'route_nums' => $route_nums,
                //     ];
                //     $this->view('schedule/index', $data);
                // }else{
                //     $schedule = $this->scheduleModel->getSchedule();
                //     $data =  [
                //         'schedule' => $schedule,
                //         'stations' => $stations,
                //         'route_nums' => $route_nums,
                //     ];
                //     $this->view('schedule/index', $data);
                // }
            }else{
            //Get Schedule
                $schedule = $this->scheduleModel->getSchedule();
            
                $data =  [
                    'schedule' => $schedule,
                    'stations' => $stations,
                    'route_nums' => $route_nums,
                ];
            
                $this->view('schedule/index', $data);
                print_r($data)['schedule'];
            }
        }

    }