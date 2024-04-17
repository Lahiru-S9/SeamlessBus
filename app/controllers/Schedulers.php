<?php
    class Schedulers extends Controller {
        public $userModel;
        
        public function __construct() {
            $this->userModel = $this->model('User');
            $this->scheduleModel = $this->model('Schedulerow');
            $this->busModel = $this->model('Bus');
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
                    if($this-> userModel->findUserByEmail($data['email'])){
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
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
                redirect('Users/login');
    
            }
            $this->view('schedulers/dashboard' );
        }

        public function AddBusRotation(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
                redirect('Users/login');
    
            }
            $this->view('schedulers/AddBusRotation');
        }



    public function manageSchedule(){
        if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
            redirect('Users/login');

        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['route_num'])) {
            // It's an AJAX request
            $routeNumber = $_POST['route_num'];

            
            // Fetch stations based on the selected route number
            $stations = $this->scheduleModel->getStationsByRouteNum($routeNumber);

            // Return stations as JSON
            echo json_encode(['stations' => $stations]);
            exit; // Terminate the script after sending JSON response in AJAX
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['from_station']) && isset($_POST['to_station'])) {
            // It's an AJAX request
            $from = $_POST['from_station'];
            $to = $_POST['to_station'];

            $route_id = $this->scheduleModel->getRouteId($to, $from);

            echo json_encode(['route_id' => $route_id]);
            exit;
        }
        else {
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

    public function addSchedule(){
        if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
            redirect('Users/login');

        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the JSON data from the request body
            $json_data = file_get_contents('php://input');
    
            // Decode the JSON data into an associative array
            $postData = json_decode($json_data, true);
    
            if ($postData === null) {
                // Handle JSON decoding error
                echo json_encode(['error' => 'Invalid JSON data']);
                exit;
            }
    
            // Assuming you have a Schedule model with methods like addSchedule
            $scheduleData = [
                'route_id' => trim($postData['route_id']),
                'arrival_time' => trim($postData['arrival']),
                'departure_time' => trim($postData['departure']),
                'day' => trim($postData['day'])// Adjust the day based on your form or logic
            ];
    
            // Call a method in your Schedule model to add the new schedule to the database
            $newScheduleId = $this->scheduleModel->addSchedule($scheduleData);
    
            if ($newScheduleId) {
                // Fetch the newly added schedule from the database
                $newSchedule = $this->scheduleModel->getScheduleById($newScheduleId);
    
                // Return the new schedule data as JSON
                echo json_encode(['schedule' => $newSchedule]);
                exit;
            } else {
                // Handle the case where the schedule addition fails
                echo json_encode(['error' => 'Failed to add schedule']);
                exit;
            }
        } else {
            // Handle non-POST requests, if needed
            echo json_encode(['error' => 'Invalid request method']);
            exit;
        }
            
    }

    public function verifyBus(){
        if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
            redirect('Users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['busId']) && isset($_POST['status'])) {
            // It's an AJAX request
            $busNo = $_POST['busId'];
            $status = $_POST['status'];

            // Update bus status
            $this->busModel->updateBusStatus($busNo, $status);

            // Return success message
            echo json_encode(['status' => 'success', 'message' => 'Bus status updated successfully']);

            exit;
        }

        else {

        $busRequests = $this->busModel->getRequestedBusesBySchdeuler($_SESSION['user_id']);

        $data = [
            'busRequests' => $busRequests
        ];

        // var_dump($data);

        $this->view('schedulers/verifyBus', $data);
        }

    }
    


    public function DefineSchedule(){
    $this->view('schedulers/DefineSchedule');
    }

    public function feedback(){
        $this->view('schedulers/feedbackForm');
    }

    public function seebooking(){
        $this->view('schedulers/seeBooking');
    }

    public function seebusdetails(){
        $this->view('schedulers/seeBusDetails');
    }

    public function seeconductordetails(){
        $this->view('schedulers/seeConductorDetails');
    }

    

    public function verifyconductor(){
        $this->view('schedulers/verifyConductor');

    }
    public function buses(){
        $this->view('schedulers/buses');
    }
    public function booking1(){
        $this->view('schedulers/booking1');
    }

    public function conductors(){
        $this->view('schedulers/conductors');
    }

    public function schedule(){
        $this->view('schedulers/schedule');
    }
}
