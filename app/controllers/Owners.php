<?php
    class Owners extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
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
           
            $this->view('Owners/dashboard');
        }

        public function AddBuses(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){

                redirect('Users/login');
            }

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
                    'bus_number_err' => '',
                    'bus_model_err' => '',
                    'bus_seat_err' => '',
                    'permit_id_err' => '',
                    'seats_per_row_err' => '',
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

                //Make sure errors are empty
                if(empty($data['bus_number_err']) && empty($data['bus_model_err']) && empty($data['bus_seat_err']) && empty($data['permit_id_err']) && empty($data['seats_per_row_err'])){
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
                    'bus_number_err' => '',
                    'bus_model_err' => '',
                    'bus_seat_err' => '',
                    'permit_id_err' => '',
                    'seats_per_row_err' => '',
                ];

                
                //Load view
                $this->view('Owners/AddBuses', $data);
            }
        }
    

        public function bankDetails(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){

                redirect('Users/login');
            }

            $this->view('Owners/bankDetails');
        }

        public function profile(){
            

            $this->view('owners/profile');
        }
        
        public function selectConductor(){
            if(!isLoggedIn() || $_SESSION['usertype'] != 'Owner'){

                redirect('Users/login');
            }

            $this->view('Owners/selectConductor');
        }
        


    }