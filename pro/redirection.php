<?php



$parts = parse_url($_SERVER["REQUEST_URI"]);
$page_name = basename($parts['path']);



$urlsForClients = array("user-edit","dashboard","orders","orders-add","orders-inprogress","orders-closed");

$urlsForWorkers = array_merge($urlsForClients, array("orders-new","inventory","inventory_structure","material"));


function przekierowanie(){
    $url = "./";
    header("Location: $url");
    // session_unset();
    // session_write_close();
}


if($_SESSION["type_of_user"] == "admin" ){
 }

 
else if($_SESSION["type_of_user"] == "worker" ){
        if(in_array($page_name,$urlsForWorkers)){
        }
        else{
            przekierowanie();
        }

}


else if($_SESSION["type_of_user"] == "client" ){
        if(in_array($page_name,$urlsForClients)){
        }
        else{
            przekierowanie();
        }

}


else{
    przekierowanie();
}



?>