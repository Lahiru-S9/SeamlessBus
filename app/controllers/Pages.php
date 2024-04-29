<?php

    class Pages extends Controller{
        public function __construct(){
          
        }

        public function index(){
            $data =  [
                'title' => 'Seamless Bus',
                'description' => 'We help you to pre-plan and make your day more efficient by digitizing the highway bus system.'
            ];
   
            $this->view('pages/index', $data);
        }
        
        public function about(){
            $data =  [
                'title' => 'About Us',
                'description' => 'We help you to pre-plan and make your day more efficient by digitizing the highway bus system.'
            ];

            $this->view('pages/about', $data);
        }

        public function userSelect(){
            $data =  [
                'title' => 'Select User Type',
                'description' => 'We help you to pre-plan and make your day more efficient by digitizing the highway bus system.'
            ];

            $this->view('pages/userSelect', $data);
        }

       public function bookings(){
        if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'RegPassenger' ) {
            
            redirect('RegPassengers/profile');
        } else {

            //is request method is post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $nic = trim($_POST['nic']);
                $bookings = $this->bookingModel->getBookingsByNIC($nic);
                $message = 'No bookings to show';
                $data =  [
                    'message' => $message,
                    'bookings' => $bookings,
                ];
                $this->view('pages/bookings', $data);
            }

            else{      
                $message = 'please enter your NIC to see bookings'; 
                $data =  [
                    'message' => $message,
                ];
                // var_dump ($data);
                $this->view('pages/bookings', $data);
            }

        }
       }

    }