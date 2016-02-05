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

function fetch_all_static_events($databse){
    $json = new \lib\Json(JSON_STATUS_ERROR, "Invalid page provided");
    $events_arr = array(
        '0' => array(
            'name'=> 'Falls Festival',
            'venue'=> 'Australia',
            'start'=>'28 dec 2016',
            'end'=>'01 Jan 2017',
            'Fees'=>0,
            'image'=>'images/FallsFestival.jpg',
            'image_url'=>'https://www.muzenly.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/2/0/20151230144708thumbnail.jpg'
        ),
        '1'=> array(
            'name'=> 'Big Mountain Music Festival',
            'venue'=> 'Thailand',
            'start'=>'19 Dec 2016',
            'end'=>'20 Dec 2016',
            'Fees'=>500,
            'image'=>'images/BigMountain.jpg',
            'image_url'=>'https://www.muzenly.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/2/0/20151228124652thumbnail.jpg'
        ),
        '2'=> array(
            'name'=> 'ZoukOut Festival',
            'venue'=> 'Singapore',
            'start'=>'11 Dec 2016',
            'end'=>'12 Dec 2016',
            'Fees'=>1500,
            'image'=>'images/ZoukOut.jpg',
            'image_url'=>'https://www.muzenly.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/2/0/20151228070537thumbnail.jpg'
        ),
        '3'=> array(
            'name'=> 'Djakarta Warehouse Project',
            'venue'=> 'Indonesia',
            'start'=>'11 Dec 2016',
            'end'=>'12 Dec 2016',
            'Fees'=>2000,
            'image'=>'images/Djakarta.jpg',
            'image_url'=>'https://www.muzenly.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/2/0/20151230091248thumbnail.jpg'
        ),
        '4'=> array(
            'name'=> 'Hornbill',
            'venue'=> 'India',
            'start'=>'01 Dec 2016',
            'end'=>'07 Dec 2016',
            'Fees'=>1000,
            'image'=>'images/Hornbill.jpg',
            'image_url'=>'https://www.muzenly.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/2/0/20151215065953thumbnail.jpg'
        ),
        '5'=> array(
            'name'=> 'Streosonic',
            'venue'=> 'Australia',
            'start'=>'28 Nov 2016',
            'end'=>'06 Dec 2016',
            'Fees'=>1000,
            'image'=>'images/Hornbill.jpg',
            'image_url'=>'https://www.muzenly.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/2/0/20151230151706thumbnail.jpg'
        )
    );

    $json->add_data("event_list",$events_arr);
    $json->setMessage("Fetched Events Successfully");
    $json->setStatus(JSON_STATUS_SUCCESS);
    return $json->getJson();
}