<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../db/database.php';
include_once '../objects/orders.php';
 
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
 
    // products array
    $orders_arr=array();
    $orders_arr["orders"]=array();
 
    // retrieve table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $orders_item=array(
            "OrderStatus" => $OrderStatus,
             // You can store more fields here as vars; Ex: "otherField"=> $otherField,
            // Be sure the vars here are decalred first in our Class, in this sample the Class is name Orders
        );
 
        array_push($orders_arr["orders"], $orders_item);
     }
    echo json_encode($orders_arr); //output results as json
}
 
else{
    echo json_encode(
        array("message" => "Sorry but a critical error has occured.") // Custom error messsage should this Rest API fail. 
    );
}
?>
