<?php

function fetch_all_events($databse){
    $json = new \lib\Json(JSON_STATUS_ERROR, "Invalid page provided");
    $eventResult = fetch_events($databse);
    $events_arr = $json->result_to_array($eventResult);

    $json->add_data("event_list",$events_arr);
    $json->setMessage("Fetched Events Successfully");
    $json->setStatus(JSON_STATUS_SUCCESS);
    return $json->getJson();
}

function single_event_detail($databse, $eventId){
    $json = new \lib\Json(JSON_STATUS_ERROR, "Invalid page provided");
    $eventDtl = get_event_detail($eventId, $databse);
    $eventDetail = $json->result_to_array($eventDtl);

    $json->add_data("event_detail",$eventDetail);
    $json->setMessage("Fetched Event Detail Successfully");
    $json->setStatus(JSON_STATUS_SUCCESS);
    return $json->getJson();
}