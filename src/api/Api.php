<?php
//error_reporting(E_ALL);
//ini_set('display_errors', true);

include_once "../connection/db_connect.php";
include_once "../action/action_event.php";
include_once "../lib/Rest.php";
include_once "../lib/Json.php";

class Api extends Rest
{
    public function __construct($request)
    {
        parent::__construct($request);
        $this->db_name = 'event_master';
        $this->today = date('Y-m-d H:i:s');
    }

    protected function fetchAllEvents(){
        if($this->method == 'POST'){
            return fetch_all_events($this->db_name);
        }else{
            return "Only Accepts POST Requests";
        }
    }

    protected function eventDetail(){
        if($this->method == 'POST'){
            $id = $_POST['id'];
            return single_event_detail($this->db_name,$id);
        }else{
            return "Only Accepts POST Requests";
        }
    }
}