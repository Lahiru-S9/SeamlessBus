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
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);
        

                // Check if schedulerId is present
                if (isset($postData['schedulerId'])) {
                    // Extract relevant data for handling stations
                    $schedulerId = $postData['schedulerId'];
                    $selectedStations = $postData['selectedStations'];

                    // Update stations for the specified scheduler
                    $this->schedulerModel->updateStationsForScheduler($schedulerId, $selectedStations);
                } elseif (isset($postData['stationId'])) {
                    // Extract relevant data for handling schedulers
                    $stationId = $postData['stationId'];
                    $selectedSchedulers = $postData['selectedSchedulers'];

                    // Update schedulers for the specified station
                    $this->stationModel->updateSchedulersForStation($stationId, $selectedSchedulers);
                }

                exit();
            }

            $schedulers = $this->schedulerModel->getSchedulers();
            $stations = $this->stationModel->getStationsWithSchedulers();

            

            $data = [
                'schedulers' => $schedulers,
                'stations' => $stations

            ];
            // var_dump($data); 

            $this->view('Admins/add_scheduler',$data);
        }
    }

