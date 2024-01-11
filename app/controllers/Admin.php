<?php
    class Admin extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        

        public function dashboard(){
            $this->view('Admin/dashboard');
        }

        public function add_scheduler(){
            $this->view('Admin/add_scheduler');
        }
    }

