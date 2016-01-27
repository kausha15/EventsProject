<?php

include_once __DIR__ . '/../api/Api.php';
// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    $api = new Api($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    echo $api->processAPI();
    if(isset($conn)) mysql_close($conn);
    if(isset($conn_master)) mysql_close($conn_master);

} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
    if(isset($conn)) mysql_close($conn);
    if(isset($conn_master)) mysql_close($conn_master);
}