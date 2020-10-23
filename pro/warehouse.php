<?php


session_start();
if (isset($_SESSION["username"]) && $_SESSION["type_of_user"] == "admin") {


   

    session_write_close();
} else {
 
    session_unset();
    session_write_close();
    $url = "./index";
    header("Location: $url");
}






?>