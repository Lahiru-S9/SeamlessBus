<?php

class Schedulers extends Controller{
    public function __construct(){
        
    }

    public function dashboard(){
        $data =  [
            
        ];

        $this->view('schedulers/dashboard', $data);
    }

    public function profile(){
            

        $this->view('schedulers/profile');
    }

}


