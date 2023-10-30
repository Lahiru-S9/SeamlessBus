<?php

    class Schedule extends Controller{
        public function __construct(){
          
        }

        public function index(){
            $data =  [
                'title' => 'Seamless Bus',
                'description' => 'We help you to pre-plan and make your day more efficient by digitizing the highway bus system.'
            ];
   
            $this->view('schedule/index', $data);
        }

        public function getShedule(){

        }
    }