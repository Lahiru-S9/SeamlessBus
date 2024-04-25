<?php
    class GPassengers extends Controller{
        public function __construct(){
            $this->scheduleModel = $this->model('Schedulerow');
            $this->bookingModel = $this->model('Booking');
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
                    'usertype' => 2
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
                    $this->view('gPassengers/register', $data);
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
                    'usertype' => '2'
                ];

                
                //Load view
                $this->view('gPassengers/register', $data);
            }
        }

        public function booking(){
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            if(isset($POST['schedule_id'])) {
                
                $schedule_id = trim($POST['schedule_id']);
                $name = trim($POST['name']);
                $nic = trim($POST['nic']);
                $phone = trim($POST['phone']);
                $schedule = $this->bookingModel->getScheduleById($schedule_id);
                $seats = $this->bookingModel->getSeats($schedule_id);
                $remainingSeats = (15 - count($seats));
            }

            // echo $remainingSeats;

            $data = [
                'name' => $name,
                'nic' => $nic,
                'phone' => $phone,
                'schedule' => $schedule,
                'seats' => $seats,
                'remainingSeats' => $remainingSeats
            ];

            // echo $schedule[0]->date;
            
           if($schedule[0]->date>date('Y-m-d')){
                $this->view('gPassengers/bookingWS', $data);
           }
            else{
                $this->view('gPassengers/booking', $data);
            }
    
        }

        public function payment(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                // Retrieve POST parameters from PayHere notification
                $merchant_id         = $_POST['merchant_id'];
                $order_id            = $_POST['order_id'];
                $payhere_amount      = $_POST['payhere_amount'];
                $payhere_currency    = $_POST['payhere_currency'];
                $status_code         = $_POST['status_code'];
                $md5sig              = $_POST['md5sig'];

                // Replace with your Merchant Secret
                $merchant_secret = MERCHANT_SECRET;

                // Generate local md5sig for verification
                $local_md5sig = strtoupper(
                    md5(
                        $merchant_id . 
                        $order_id . 
                        $payhere_amount . 
                        $payhere_currency . 
                        $status_code . 
                        strtoupper(md5($merchant_secret)) 
                    ) 
                );

                // Verify the authenticity of the payment notification
                if (($local_md5sig === $md5sig) && ($status_code == 2)) {
                    
                    $this->bookingModel->updateBookingStatus($order_id, 'accepted');
                }

                else{
                    $this->bookingModel->deleteBooking($order_id);
                }


            }
            elseif(($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['totalAmount']) && isset($_GET['selectedSeats']) && isset($_GET['nic'])){
                $totalAmount = $_GET['totalAmount'];
                $selectedSeats = $_GET['selectedSeats'];
                $schedule_id = $_GET['scheduleId'];
                $name = $_GET['name'];
                $nic = $_GET['nic'];
                $phone = $_GET['phone'];
                $seatIds = explode(',', $selectedSeats);
                $order_id = uniqid();
                $user_type = 5;
                foreach($seatIds as $seatId){
                    $this->bookingModel->addBooking($order_id, $schedule_id, $seatId, $nic, $user_type );
                }


                $amount = $totalAmount;
                $merchant_id = MERCHANT_ID;
                $merchant_secret = MERCHANT_SECRET;
                $currency = 'LKR';

                $hash = strtoupper(
                    md5(
                        $merchant_id . 
                        $order_id . 
                        number_format($amount, 2, '.', '') . 
                        $currency .  
                        strtoupper(md5($merchant_secret)) 
                    ) 
                );
                
                $array = [];
                
                $array['first_name'] = $name;
                $array['last_name'] = "";
                $array['item_name'] = "Bus Ticket";
                $array['email'] = "";
                $array['phone'] = $phone;
                $array['address'] = "";
                $array['city'] = "";
                $array['amount'] = $amount;
                $array['merchant_id'] = $merchant_id;
                $array['order_id'] = $order_id;
                $array['currency'] = $currency;
                $array['hash'] = $hash;

                $jsonObj = json_encode($array);

                echo $jsonObj;
                // echo $selectedSeats;
            }
            else{
                $totalAmount = $_GET['totalAmount'];
                $seatshm = $_GET['seatshm'];
                $name = $_GET['name'];
                $nic = $_GET['nic'];
                $phone = $_GET['phone'];
                $order_id = uniqid();
                $user_type = ($_SESSION['usertype'] == 'RegPassenger') ? '2' : '5';
                
                $lastSeat = $this->bookingModel->getLastSeatByScheduleId($schedule_id);
                $lastSeat = $lastSeat[0]->seatno;
                if ($lastSeat === NULL) {
                    $lastSeat = 'A0';
                }
                $lastRow = substr($lastSeat, 0, 1);
                $lastSeatNumber = intval(substr($lastSeat, 1));

                $seats = [];
                for ($row = $lastRow; $row <= 'H'; $row++) {
                    for ($seatNumber = $lastSeatNumber + 1; $seatNumber <= 2; $seatNumber++) {
                        $seat = $row . $seatNumber;
                        $seats[] = $seat;
                    }
                }

                foreach($seats as $seatId){
                    $this->bookingModel->addBooking($order_id, $schedule_id, $seatId, $nic, $user_type );
                }

                $amount = $totalAmount;
                $merchant_id = MERCHANT_ID;
                $merchant_secret = MERCHANT_SECRET;
                $currency = 'LKR';

                $hash = strtoupper(
                    md5(
                        $merchant_id . 
                        $order_id . 
                        number_format($amount, 2, '.', '') . 
                        $currency .  
                        strtoupper(md5($merchant_secret)) 
                    ) 
                );
                

                $array['city'] = $city;
                $array = [];
                
                $array['first_name'] = $nic;
                $array['last_name'] = "";
                $array['item_name'] = "Bus Ticket";
                $array['email'] = "";
                $array['phone'] = $phone;
                $array['address'] = "";
                $array['city'] = "";
                $array['amount'] = $amount;
                $array['merchant_id'] = $merchant_id;
                $array['order_id'] = $order_id;
                $array['currency'] = $currency;
                $array['hash'] = $hash;

                $jsonObj = json_encode($array);

                echo $jsonObj;
                // echo $selectedSeats; 
            }
        }

    }