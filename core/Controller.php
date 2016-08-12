<?php

class Controller
{

    public function model($model)
    {
        require_once "../BookingWeb/models/$model.php";

        return new $model();
    }

    public function view($view, $data = array())
    {
        require_once "../BookingWeb/views/$view.php";
    }
}
