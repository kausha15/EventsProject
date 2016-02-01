<?php
echo 'dhgcd';
include_once __DIR__ . '/../api/Api.php';
// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    var_dump($_REQUEST);
    $api = new Api($_REQUEST['request'],$_SERVER['HTTP_ORIGIN']);
    echo $api->processAPI();
    if(isset($conn)) mysqli_close($conn);

} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
    if(isset($conn)) mysqli_close($conn);
}