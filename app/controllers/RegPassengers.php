<?php
    class RegPassengers extends Controller{
        public function __construct(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'RegPassenger'){
                redirect('users/login');
            }
            $this->userModel = $this->model('User');
            $this->scheduleModel = $this->model('Schedulerow');
            $this->bookingModel = $this->model('Booking');
            $this->regPassengerModel = $this->model('RegPassenger');
        }


        public function dashboard(){
            
            $data = [
                'title' => 'Dashboard',
                'description' => 'Enhancing your Travel Experience'
            ];

            $this->view('regPassengers/dashboard', $data);
        }

        public function profile(){
            
            $totalBookings = $this->regPassengerModel->getTotalBookingsCount($_SESSION['user_id']);
            
            $data = [
            
                'totalBookings' => $totalBookings
            ];
            
            $this->view('regPassengers/profile', $data);
        }

        public function booking(){
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            if(isset($POST['schedule_id'])) {
                
                $schedule_id = trim($POST['schedule_id']);
                $schedule = $this->bookingModel->getScheduleById($schedule_id);
                $seats = $this->bookingModel->getSeats($schedule_id);

            }
            
            $data = [
                'schedule' => $schedule,
                'seats' => $seats
            ];
            
            $this->view('regPassengers/booking', $data);
            }
        
        
    }
        

        
        

    