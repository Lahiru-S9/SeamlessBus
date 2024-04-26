<?php
    class Owners extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->busModel = $this->model('Bus');
            $this->feedbackModel = $this->model('Feedback');
            $this->routeModel = $this->model('Route');
            $this->conductorModel = $this->model('Conductor');
            $this->ownerModel = $this->model('Owner');
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
                    'usertype' => 3
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
                    $this->view('Owners/register', $data);
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
                    'usertype' => '3'
                ];

                
                //Load view
                $this->view('Owners/register', $data);
            }

            
        }
        public function dashboard(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){
               
                redirect('Users/login');
            }
           
            $data = [
                'buses' => $this->busModel->getBusesByOwnerId($_SESSION['user_id'])
            ];

            $this->view('Owners/dashboard', $data);
            
        }

        public function AddBuses(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){

                redirect('Users/login');
            }

            $route_numbers = $this->routeModel->getRoutes();

            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form
               
                //Sanitize POST data
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data = [
                    'bus_number' => trim($_POST['bus_number']),
                    'bus_model' => trim($_POST['bus_model']),
                    'bus_seat' => trim($_POST['bus_seat']),
                    'permit_id' => trim($_POST['permit_id']),
                    'owner_id' => $_SESSION['user_id'],
                    'seats_per_row' => trim($_POST['seats_per_row']),
                    'request_a_route' => trim($_POST['request_a_route']),
                    'bus_number_err' => '',
                    'bus_model_err' => '',
                    'bus_seat_err' => '',
                    'permit_id_err' => '',
                    'seats_per_row_err' => '',
                    'request_a_route_err' => '',
                    'route_numbers' => $route_numbers

                ];
                

              
                if(empty($data['bus_number'])){
                    $data['bus_number_err'] = 'Please enter bus number';
                } else {
                    
                    if($this->busModel->findBusByBusNo($data['bus_number'])){
                        $data['bus_number_err'] = 'bus is already exists in the system';
                    }
                }

               
                if(empty($data['bus_model'])){
                    $data['bus_model_err'] = 'Please enter bus_model';
                }

          
                if(empty($data['bus_seat'])){
                    $data['bus_seat_err'] = 'Please enter bus_seat';
                }
             
                if(empty($data['permit_id'])){
                    $data['permit_id_err'] = 'Please enter permit_id';
                }

                if(empty($data['seats_per_row'])){
                    $data['seats_per_row_err'] = 'Please enter seats_per_row';
                }

                if(empty($data['request_a_route'])){
                    $data['request_a_route_err'] = 'Please enter request_a_route';
                }

                //Make sure errors are empty
                if(empty($data['bus_number_err']) && empty($data['bus_model_err']) && empty($data['bus_seat_err']) && empty($data['permit_id_err']) && empty($data['seats_per_row_err']) && empty($data['request_a_route_err'])){
                    //Validated

                    
                    if($this->busModel->addBus($data)){
                        flash('bus_added', 'Bus added successfully');
                        redirect('Owners/dashboard');
                    } else{
                        die('Something went wrong');
                    }

                }else {
                    //Load view with errors
                    $this->view('Owners/AddBuses', $data);
                }





            }else{
                //Init data
                $data = [
                    'bus_number' => '',
                    'bus_model' => '',
                    'bus_seat' => '',
                    'permit_id' => '',
                    'seats_per_row' => '',
                    'request_a_route' => '',
                    'bus_number_err' => '',
                    'bus_model_err' => '',
                    'bus_seat_err' => '',
                    'permit_id_err' => '',
                    'seats_per_row_err' => '',
                    'request_a_route_err' => '',
                    'route_numbers' => $route_numbers

                ];

                
                //Load view
                $this->view('Owners/AddBuses', $data);
                // var_dump($data);
            }
        }
    

        public function bankDetails(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){

                redirect('Users/login');
            }

            $this->view('Owners/bankDetails');
        }
        
        public function selectConductors(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){

                redirect('Users/login');
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'bus_no' => trim($_POST['busNumber']),
                    'conductor_id' => trim($_POST['conductorId'])
                ];

                if($this->busModel->assignConductor($data)){
                    flash('conductor_assigned', 'Conductor assigned successfully');
                    redirect('Owners/dashboard');
                }else{
                    die('Something went wrong');
                }
            }
            else{$buses = $this->busModel->getBusesByOwnerId($_SESSION['user_id']);
            $conductors = $this->conductorModel->getConductorsWithDetails();
            $data = [
                'buses' => $buses,
                'conductors' => $conductors
            ];}

            // var_dump($conductors);

            $this->view('Owners/SelectConductors', $data);
        }
        public function addFeedback(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){

                redirect('Users/login');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize input data
                $feedbackType = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_STRING);
                $feedbackCategory = filter_input(INPUT_POST, 'feedback-category', FILTER_SANITIZE_STRING);
                $feedbackText = filter_input(INPUT_POST, 'feedback-text', FILTER_SANITIZE_STRING);
                
                $data = [
                    'feedbackType' => $feedbackType,
                    'feedbackCategory' => $feedbackCategory,
                    'feedbackText' => $feedbackText,
                ];

                // var_dump($data);

                // Validate the data if needed
    
                // Call a method in the Feedback model to save the feedback
                $this->feedbackModel->addFeedback($data);
    
                // Redirect or show success message
                // You might want to redirect to a thank you page or the same page with a success message
                flash('feedback_success', 'Thank you for your feedback!');
                $this->view('owners/AddFeedback');
            } else {
                // If the form is not submitted, display the feedback form
                $this->view('owners/AddFeedback');
            }

        }
        
        public function seeReports(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){

                redirect('Users/login');
            }

            $this->view('Owners/SeeReport');
        }

        public function readFeedback(){
            if(!isLoggedIn() || $_SESSION['usertype'] !== 'Owner'){
                redirect('users/login');
            }
            $this->feedbackModel = $this->model('Feedback');

            // Fetch feedback data
            $feedbackData = $this->feedbackModel->getAllFeedback();
    
            // Pass feedback data to the view
            $data = [
                'feedback' => $feedbackData
            ];
    
            // Load view
            $this->view('Owners/readFeedback', $data);


        }

        public function Booking()
    {
        // Check if the user is logged in and is an owner
        if (!isLoggedIn() || $_SESSION['usertype'] !== 'Owner') {
            // Redirect to login if not logged in or not an owner
            redirect('users/login');
        }

        // Load the Booking model
        $this->bookingModel = $this->model('Booking');

        // Fetch bookings for the current owner
        $bookings = $this->bookingModel->getBookingsByOwner($_SESSION['user_id']);

        // Prepare data to be passed to the view
        $data = [
            'bookings' => $bookings
        ];

        // Load the view to display bookings
        $this->view('owners/Booking', $data);
    }

    public function OnGoingBus(){
        if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){

            redirect('Users/login');
        }

        $this->view('Owners/OnGoingBus');
    }

    public function profile(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $_SESSION['user_id'],
                'email' => trim($_POST['Email']),
                'phone' => trim($_POST['Phone']),
                'mobile' => trim($_POST['Mobile']),
                'address' =>trim($_POST['Address'])
            ];

            var_dump($data);

            if($this->ownerModel->updateOwnerById($data)){
                redirect('owners/profile');
            }
            else{
                die('Something went wrong');
            }
            exit;

        }
        else{
        
            
            $ownerDetails = $this->ownerModel->getDetails($_SESSION['user_id']);

            $data = [
                'ownerDetails' => $ownerDetails
            ];
            
            $this->view('owners/profile', $data);
        }
    }

}