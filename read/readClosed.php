<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../db/database.php';
include_once '../objects/closedOrders.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$orders = new Orders($db);
 
// query products
$stmt = $orders->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num > 0){
    echo json_encode($num);
}
 
else{
    echo json_encode(
        array("message" => "Sorry but a critical error has occured.")
    );
}
?>