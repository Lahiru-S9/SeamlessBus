<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        
        public function login(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form

                //Sanitize POST data
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',   
                ];
                
                //Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }

                //Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }

                //Check for regPassenger/email
                if($this->userModel->findUserByEmail($data['email'])){
                    //User found
                }else{
                    //User not found
                    $data['email_err'] = 'No user found';
                }

                // Make sure those are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //Validated
                    //Check and set logged in regPassenger
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        //Create Session
                        $this->createUserSession($loggedInUser);
                    } else{
                        $data['password_err'] = 'Password incorrect';

                        $this->view('users/login', $data);
                    }

                }else {
                    //Load view with errors
                    $this->view('users/login', $data);
                }


            }else{
                //Init data
                $data = [ 
                    'email' => '',
                    'password' => '',     
                    'email_err' => '',   
                    'password_err' => '', 
                ];

                //Load view
                $this->view('users/login', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            switch ($user->usertype){
                case 2:
                    $_SESSION['usertype'] = 'RegPassenger';
                    redirect('regPassengers/dashboard');
                    break;
                case 3:
                    $_SESSION['usertype'] = 'Owner';
                    redirect('Owners/dashboard');
                    break;
                case 4:
                    $_SESSION['usertype'] = 'Conductor';
                    redirect('conductors/profile');
                    break;
                case 5:
                    $_SESSION['usertype'] = 'Guest';
                    redirect('guest/dashboard');
                    break;
                case 6:
                    $_SESSION['usertype'] = 'Scheduler';
                    redirect('schedulers/dashboard');
                    break;
                case 7:
                    $_SESSION['usertype'] = 'Admin';
                    redirect('Admins/dashboard');
                    break;
                
            }
            //redirect('pages/index');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            unset($_SESSION['usertype']);
            session_destroy();
            redirect('users/login');
        }

        
    }