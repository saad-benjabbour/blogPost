<?php

/*
 * App Core class
 * take care of the routes of the app
 * URL format --> /controller/method/params
 * */
class Controller
{
    public function loadModel($model)
    {
        if(file_exists('../app/models/' . $model . '.php'))
        {
            require_once '../app/models/' . $model . '.php';
        }else
            die("THIS MODEL DOESNT EXIST, CHECK YOUR THE MODEL FOLDER");
        return new $model;
    }

    public function loadView($view, $data = [])
    {
        if(file_exists('../app/views/' . $view . '.php'))
        {
            require_once '../app/views/' . $view . '.php';
        }else
            die("THIS VIEW DOESENT EXIST, CHECK YOU VIEW FOLDER");
    }
}