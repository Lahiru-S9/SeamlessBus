<?php
    class Schedulers extends Controller {
        public $userModel;
        
        public function __construct() {
            $this->userModel = $this->model('User');
            $this->scheduleModel = $this->model('Schedulerow');
            $this->busModel = $this->model('Bus');
            $this->routesModel = $this->model('Route');
            $this->stationModel = $this->model('Station');
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
            $sunday = $this->scheduleModel->getScheduleByDay('Sunday',$_SESSION['user_id']);
            $monday = $this->scheduleModel->getScheduleByDay('Monday',$_SESSION['user_id']);
            $tuesday = $this->scheduleModel->getScheduleByDay('Tuesday',$_SESSION['user_id']);
            $wednesday = $this->scheduleModel->getScheduleByDay('Wednesday',$_SESSION['user_id']);   
            $thursday = $this->scheduleModel->getScheduleByDay('Thursday',$_SESSION['user_id']);
            $friday = $this->scheduleModel->getScheduleByDay('Friday',$_SESSION['user_id']);
            $saturday = $this->scheduleModel->getScheduleByDay('Saturday',$_SESSION['user_id']);

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

    public function seebusdetails(){
        if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
            redirect('Users/login');
        }
        $buses = $this->busModel->getBusesBySchedulerId($_SESSION['user_id']);

        $data = [
            'buses' => $buses
        ];

        // var_dump($data);
    
        $this->view('schedulers/seeBusDetails', $data);
    }
    
    public function getFilterValues(){
        if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
            redirect('Users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filter_type'])) {
            // It's an AJAX request
            $filterType = $_GET['filter_type'];

            if ($filterType === 'route_number') {
                // Fetch all route numbers
                $routeNumbers = $this->routesModel->getRoutesbyScheduler($_SESSION['user_id']);

                // Return route numbers as JSON
                echo json_encode($routeNumbers);
                exit;
            } else if ($filterType === 'to_station' || $filterType === 'from_station') {
                // Fetch all stations
                $stations = $this->stationModel->getToStationsByScheduler($_SESSION['user_id']);

                // Return stations as JSON
                echo json_encode($stations);
                exit;
            } else {
                // Return an error message
                echo json_encode(['error' => 'Invalid filter type']);
                exit;
            }
        } else {
            // Handle non-POST requests, if needed
            echo json_encode(['error' => 'Invalid request method']);
            exit;
        }
    }

    public function applyFilter() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filter_type'], $_GET['filter_value'])) {
            // Get the filter type and value
            $filterType = $_GET['filter_type'];
            $filterValue = $_GET['filter_value'];
    
            // Construct the appropriate SQL query based on the filter type
            if ($filterType === 'route_number') {
                $sql = "SELECT 
                            buses.bus_no,
                            buses.bus_model,
                            buses.permitid,
                            buses.route_num,
                            buses.status,
                            users.name,
                            from_stations.station AS from_station,
                            to_stations.station AS to_station
                        FROM 
                            buses
                        JOIN 
                            users ON buses.ownerid = users.id
                        JOIN 
                            routes ON buses.route_num = routes.route_num
                        JOIN 
                            stations AS to_stations ON routes.tostationid = to_stations.id
                        JOIN
                            stations AS from_stations ON routes.fromstationid = from_stations.id
                        WHERE 
                            status = 'accepted' AND 
                            (routes.fromstationid = (SELECT station_id FROM schedulers JOIN scheduler_details ON scheduler_details.id = schedulers.scheduler_id WHERE scheduler_details.user_id = :id) OR 
                            routes.tostationid = (SELECT station_id FROM schedulers JOIN scheduler_details ON scheduler_details.id = schedulers.scheduler_id WHERE scheduler_details.user_id = :id)) AND 
                            buses.route_num = :filter_value";
            } elseif ($filterType === 'to_station') {
                $sql = "SELECT 
                            buses.bus_no,
                            buses.bus_model,
                            buses.permitid,
                            buses.route_num,
                            buses.status,
                            users.name,
                            from_stations.station AS from_station,
                            to_stations.station AS to_station
                        FROM 
                            buses
                        JOIN 
                            users ON buses.ownerid = users.id
                        JOIN 
                            routes ON buses.route_num = routes.route_num
                        JOIN 
                            stations AS to_stations ON routes.tostationid = to_stations.id
                        JOIN
                            stations AS from_stations ON routes.fromstationid = from_stations.id
                        WHERE 
                            status = 'accepted' AND 
                            (routes.fromstationid = (SELECT station_id FROM schedulers JOIN scheduler_details ON scheduler_details.id = schedulers.scheduler_id WHERE scheduler_details.user_id = :id) OR 
                            routes.tostationid = (SELECT station_id FROM schedulers JOIN scheduler_details ON scheduler_details.id = schedulers.scheduler_id WHERE scheduler_details.user_id = :id)) AND 
                            to_stations.station = :filter_value";
            } elseif ($filterType === 'from_station') {
                $sql = "SELECT 
                            buses.bus_no,
                            buses.bus_model,
                            buses.permitid,
                            buses.route_num,
                            users.name,
                            from_stations.station AS from_station,
                            to_stations.station AS to_station
                        FROM 
                            buses
                        JOIN 
                            users ON buses.ownerid = users.id
                        JOIN 
                            routes ON buses.route_num = routes.route_num
                        JOIN 
                            stations AS to_stations ON routes.tostationid = to_stations.id
                        JOIN
                            stations AS from_stations ON routes.fromstationid = from_stations.id
                        WHERE 
                            status = 'accepted' AND 
                            (routes.fromstationid = (SELECT station_id FROM schedulers JOIN scheduler_details ON scheduler_details.id = schedulers.scheduler_id WHERE scheduler_details.user_id = :id) OR 
                            routes.tostationid = (SELECT station_id FROM schedulers JOIN scheduler_details ON scheduler_details.id = schedulers.scheduler_id WHERE scheduler_details.user_id = :id)) AND 
                            from_stations.station = :filter_value";
            } else {
                // Invalid filter type
                echo json_encode(['error' => 'Invalid filter type']);
                exit;
            }
    
            // Execute the query with the appropriate filter value
            $filteredData = $this->busModel->getFilteredBuses($sql, $_SESSION['user_id'], $filterValue);
    
            // Pass the filtered data to the view
            $data = [
                'buses' => $filteredData
            ];
    
            // Load the view with the filtered data
            $this->view('schedulers/seeBusDetails', $data);
        } else {
            // Handle invalid requests
            echo json_encode(['error' => 'Invalid request parameters']);
            exit;
        }
    }
    
    public function removeBus($busNo){
        if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
            redirect('Users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // It's a regular request
            if ($this->busModel->removeBus($busNo)) {
                // Redirect to the seebusdetails page
                redirect('schedulers/seebusdetails');
            } else {
                // Handle the case where the bus removal fails
                echo json_encode(['error' => 'Failed to remove bus']);
                exit;
            }
        } else {
            // Handle non-GET requests, if needed
            echo json_encode(['error' => 'Invalid request method']);
            exit;
        }
    }

    public function pauseBus($busNo){
        if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
            redirect('Users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // It's a regular request
            if ($this->busModel->updateBusStatus($busNo, 'paused')) {
                // Redirect to the seebusdetails page
                redirect('schedulers/seebusdetails');
            } else {
                // Handle the case where the bus status update fails
                echo json_encode(['error' => 'Failed to pause bus']);
                exit;
            }
        } else {
            // Handle non-GET requests, if needed
            echo json_encode(['error' => 'Invalid request method']);
            exit;
        }
    }

    public function resumeBus($busNo){
        if(!isLoggedIn() || $_SESSION['usertype'] != 'Scheduler'){
               
            redirect('Users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // It's a regular request
            if ($this->busModel->updateBusStatus($busNo, 'accepted')) {
                // Redirect to the seebusdetails page
                redirect('schedulers/seebusdetails');
            } else {
                // Handle the case where the bus status update fails
                echo json_encode(['error' => 'Failed to resume bus']);
                exit;
            }
        } else {
            // Handle non-GET requests, if needed
            echo json_encode(['error' => 'Invalid request method']);
            exit;
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
