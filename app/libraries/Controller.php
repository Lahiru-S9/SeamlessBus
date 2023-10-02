<?php
/**
 * Base Controler
 * Loads the models and views
 */

 class Controller {
    //load model
    public function model($model){
        //Require model file
        require_once '../app/models/' . $model . '.php';

        //Imstantiate model
        return new $model();
    }

    //Load view
    public function view($view, $data = []){
        //check for the view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            //view does not exists
            die('View does not exist');
        }
    }

 }