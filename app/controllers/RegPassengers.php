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

            $data = [
                'encrypted_data' => $encrypted_data
            ];

            // Decrypt the data (just for verification purposes)
            // $decrypted_data = $this->decrypt_data($encrypted_data, $key, $iv);

            // Output the encrypted data
            // echo "Encrypted Data: " . $encrypted_data . "<br>";

            // Output the decrypted data (should match the original data)
            // echo "Decrypted Data: " . $decrypted_data . "<br>";
            $this->view('regPassengers/QR', $data);
        }

        // Encryption function
        function encrypt_data($data, $key, $iv) {
            $cipher = "aes-256-cbc"; // You can choose a different cipher if needed
            $options = 0;
            $encrypted = openssl_encrypt($data, $cipher, $key, $options, $iv);
            return $encrypted;
        }

        // Decryption function
        // function decrypt_data($data, $key, $iv) {
        //     $cipher = "aes-256-cbc"; // You should use the same cipher used for encryption
        //     $options = 0;
        //     $decrypted = openssl_decrypt($data, $cipher, $key, $options, $iv);
        //     return $decrypted;
        // }
        
        
    }
        

        
        

    