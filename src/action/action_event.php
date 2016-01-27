<?php
// sql queries to fetch event list and particular event


function fetch_events_db($database){
    $select = "SELECT * FROM {$database}.events";
    return mysql_query($select);
}

function get_event_detail($eventId, $database){
    $select = "SELECT * FROM {$database}.events WHERE event_id = '{$eventId}'";
    return mysql_query($select);
}

function fetch_events_dummy(){
    $array = array(
        '0' => array(
            'name'=> 'Marathon',
            'venue'=> 'Mumbai',
            'Timing'=>'09:00 AM',
            'Fees'=>0,
            'image'=>''
        ),
        '1'=> array(
            'name'=> 'Tomatina',
            'venue'=> 'Pune',
            'Timing'=>'11:00 AM',
            'Fees'=>500,
            'image'=>''
        )
    );

    return $array;
}