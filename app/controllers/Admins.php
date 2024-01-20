<?php
    class Admins extends Controller{
        public function __construct(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Admin'){
                redirect('users/login');
            }
            $this->userModel = $this->model('User');
            $this->schedulerModel = $this->model('Scheduler');
            $this->stationModel = $this->model('Station');
        }

        

        public function dashboard(){
            $this->view('Admins/dashboard');
        }

        public function add_scheduler(){

            $schedulers = $this->schedulerModel->getSchedulers();
            $stations = $this->stationModel->getStationsWithSchedulers();

            $data = [
                'schedulers' => $schedulers,
                'stations' => $stations
            ];
            var_dump($data); 

            $this->view('Admins/add_scheduler',$data);
        }
    }

