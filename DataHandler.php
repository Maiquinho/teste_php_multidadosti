<?php 

require_once 'DataRequest.php';


if(isset($_GET['id'])){

    $tdData = new DataRequest;
    $method = $_GET['id'];
    
    echo json_encode($tdData->$method());

}


?>