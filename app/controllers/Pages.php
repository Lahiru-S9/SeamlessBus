<?php

    class Pages extends Controller{
        public function __construct(){
          
        }

        public function index(){
            $data =  [
                'title' => 'Seamless Bus',
                'description' => 'We help you to pre-plan and make your day more efficient by digitizing the highway bus system.'
            ];
   
            $this->view('pages/index', $data);
        }
        
        public function about(){
            $data =  [
                'title' => 'About Us',
                'description' => 'We help you to pre-plan and make your day more efficient by digitizing the highway bus system.'
            ];

            $this->view('pages/about', $data);
        }

        public function userSelect(){
            $data =  [
                'title' => 'Select User Type',
                'description' => 'We help you to pre-plan and make your day more efficient by digitizing the highway bus system.'
            ];

            $this->view('pages/userSelect', $data);
        }
        
    }