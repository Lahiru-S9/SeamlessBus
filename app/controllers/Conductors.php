<?php

    class Conductors extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->conductorModel = $this->model('Conductor');
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
                    'usertype' => '4'
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
                    $this->view('conductors/register', $data);
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
                    'usertype' => '4'
                ];

                
                //Load view
                $this->view('conductors/register', $data);
            }

            
        }
        // public function conductorList(){
        //     $conductors = $this-> conductorModel-> getconductorList();
        //     $data=[
        //         'conductors' =>$conductors,
        //     ];

        //     $this->view('conductors/conductorList',$data);
        // }

        public function profile(){
            // Check if the form is submitted
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Handle form submission
                // Assuming you have a method like updateConductorInfo in your model
                // Validate and sanitize the input data before updating the database
                $address = $_POST['address'];
                $mobile = $_POST['mobile'];
                $station = $_POST['station'];
                
                // Update conductor's information
                if($this->conductorModel->updateConductorInfo($_SESSION['user_id'],$address, $mobile, $station)){
                    // Redirect after successful update
                    header('Location: ' . URLROOT . '/conductors/profile');
                    exit();
                } else {
                    // Handle update failure
                    // You can set an error message and pass it to the view
                    $conductor = $this->conductorModel->getConductorById($_SESSION['user_id']);
                    $stations = $this->stationModel->getAllStations();
                    $error = "Failed to update profile information.";
                    $data = [
                        'conductor' => $conductor,
                        'stations' => $stations,
                        'error' => $error
                    ];
                    
                    $this->view('conductors/profile', $data);
                    exit();
                }
            } else {
                // If the form is not submitted, load the profile page as usual
                $conductor = $this->conductorModel->getConductorById($_SESSION['user_id']);
                $stations = $this->stationModel->getAllStations();
                $data = [
                    'conductor' => $conductor,
                    'stations' => $stations
                ];
                // var_dump($data);
                $this->view('conductors/profile', $data);
            }
        }
        
    }
