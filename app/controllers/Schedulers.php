<?php
    class Schedulers extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->scheduleModel = $this->model('Schedulerow');
        }

        public function register(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form
               
                //Sanitize POST data
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'usertype' => 6
                ];

                //Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                } else {
                    //Check email
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                //Validate Name
                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter name';
                }

                //Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                //Validate Confirm Password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm password';
                }else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //Validated
                    
                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register User
                    if($this->userModel->register($data)){
                        flash('register_success', 'You are registered and can log in');
                        redirect('users/login');
                    } else{
                        die('Something went wrong');
                    }

                }else {
                    //Load view with errors
                    $this->view('schedulers/register', $data);
                }





            }else{
                //Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'usertype' => '6'
                ];

                
                //Load view
                $this->view('schedulers/register', $data);
            }
        }

        public function dashboard(){
            $this->view('schedulers/dashboard');
        }

        public function busDetails(){
            $this->view('schedulers/busdetails');
        }

        public function manageSchedule()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['route_num'])) {
        // It's an AJAX request
        $routeNumber = $_POST['route_num'];
        
        // Fetch stations based on the selected route number
        $stations = $this->scheduleModel->getStationsByRouteNum($routeNumber);

        // Return stations as JSON
        echo json_encode(['stations' => $stations]);
        exit; // Terminate the script after sending JSON response in AJAX
    } else {
        // It's a regular request
        $sunday = $this->scheduleModel->getScheduleByDay('Sunday');
        $monday = $this->scheduleModel->getScheduleByDay('Monday');
        $tuesday = $this->scheduleModel->getScheduleByDay('Tuesday');
        $wednesday = $this->scheduleModel->getScheduleByDay('Wednesday');   
        $thursday = $this->scheduleModel->getScheduleByDay('Thursday');
        $friday = $this->scheduleModel->getScheduleByDay('Friday');
        $saturday = $this->scheduleModel->getScheduleByDay('Saturday');

        $routeNumbers = $this->scheduleModel->getRouteNumbers();

        $data = [
            'sunday' => $sunday,
            'monday' => $monday,
            'tuesday' => $tuesday,
            'wednesday' => $wednesday,
            'thursday' => $thursday,
            'friday' => $friday,
            'saturday' => $saturday,
            'routeNumbers' => $routeNumbers,
        ];

        $this->view('schedulers/manageSchedule', $data);
    }
}

    }

