<?php
    class RegPassengers extends Controller{
        public function __construct(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'RegPassenger'){
                redirect('users/login');
            }
            $this->userModel = $this->model('User');
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

        public function book(){
            
        }

        
        

    }