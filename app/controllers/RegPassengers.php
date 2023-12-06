<?php
    class RegPassengers extends Controller{
        public function __construct(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'RegPassenger'){
                redirect('users/login');
            }
            $this->userModel = $this->model('User');
            $this->scheduleModel = $this->model('Schedule');
        }


        public function dashboard(){
            
            $data = [
                'title' => 'Dashboard',
                'description' => 'Enhancing your Travel Experience'
            ];

            $this->view('regPassengers/dashboard', $data);
        }

        public function profile(){
            

            $this->view('regPassengers/profile');
        }

        public function booking(){
           
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'schedule_id' => trim($_POST['schedule_id']),
            ];
            


            $this->view('regPassengers/booking');
        }

        
        

    }