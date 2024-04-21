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
            $this->QR();
            $encrypted_data = $_SESSION['encrypted_data'] ?? '';
            
            $data = [
                'title' => 'Dashboard',
                'description' => 'Enhancing your Travel Experience',
                'encrypted_data' => $encrypted_data // Pass encrypted data to the view
            ];

            $this->view('regPassengers/dashboard', $data);
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

                if($this->regPassengerModel->updateRegPassengerById($data)){
                    redirect('regPassengers/profile');
                }
                else{
                    die('Something went wrong');
                }
                exit;

            }
            else{
            
                $totalBookings = $this->regPassengerModel->getTotalBookingsCount($_SESSION['user_id']);
                $passengerDetails = $this->regPassengerModel->getDetails($_SESSION['user_id']);
                $savedRoutes = $this->regPassengerModel->getSavedRoutes($_SESSION['user_id']);
                $activeBookings = $this->regPassengerModel->getActiveBookings($_SESSION['user_id']);
                $finishedBookings = $this->regPassengerModel->getFinishedBookings($_SESSION['user_id']);
                $data = [
                
                    'totalBookings' => $totalBookings,
                    'passengerDetails' => $passengerDetails,
                    'savedRoutes' => $savedRoutes,
                    'activeBookings' => $activeBookings,
                    'finishedBookings' => $finishedBookings
                ];

                //print_r($data);
                
                $this->view('regPassengers/profile', $data);
            }
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
            var_dump($data);
        }

        public function payment(){
            $amount = 3000;
            $merchant_id = MERCHANT_ID;
            $order_id = uniqid();
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
            
            $array['first_name'] = "saman";
            $array['last_name'] = "kumara";
            $array['item_name'] = "Bus Ticket";
            $array['email'] = "samankumara@gmail.com";
            $array['phone'] = "0324200276";
            $array['address'] = "No 1, Colombo Road, Colombo 07";
            $array['city'] = "Colombo";
            $array['amount'] = $amount;
            $array['merchant_id'] = $merchant_id;
            $array['order_id'] = $order_id;
            $array['currency'] = $currency;
            $array['hash'] = $hash;

            $jsonObj = json_encode($array);

            echo $jsonObj;
        }

        public function getDetails(){
            $this->view('regPassengers/detailsForm');
        }

        public function QR(){

            // Example usage
            $original_data = $_SESSION['user_id'];
            $key = 'Lahiru'; // Replace with a secure secret key
            $iv = openssl_random_pseudo_bytes(16); // Initialization Vector (IV) for added security

            // Encrypt the data
            $encrypted_data = $this->encrypt_data($original_data, $key, $iv);
            $_SESSION['encrypted_data'] = $encrypted_data;
           

            // Decrypt the data (just for verification purposes)
            $decrypted_data = $this->decrypt_data($_SESSION['encrypted_data'], $key, $iv);

            // Output the encrypted data
            // echo "Encrypted Data: " . $encrypted_data . "<br>";

            // Output the decrypted data (should match the original data)
            //echo "Decrypted Data: " . $decrypted_data . "<br>";
            
        }

        // Encryption function
        function encrypt_data($data, $key, $iv) {
            $cipher = "aes-256-cbc"; // You can choose a different cipher if needed
            $options = 0;
            $encrypted = openssl_encrypt($data, $cipher, $key, $options, $iv);
            return $encrypted;
        }

        // Decryption function
        function decrypt_data($data, $key, $iv) {
            $cipher = "aes-256-cbc"; // You should use the same cipher used for encryption
            $options = 0;
            $decrypted = openssl_decrypt($data, $cipher, $key, $options, $iv);
            return $decrypted;
        }
        
        
    }
        

        
        

    