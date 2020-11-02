<?php








// if (isset($_SESSION["type_of_user"]) != "client") {


//     session_write_close();
    
   
// } else {


//     session_unset();
//     session_write_close();

//     $url = "./index";
//     header("Location: $url");
  
// }




function include_styles(){
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">';
    echo '<link rel="stylesheet" href="assets/css/style.css">';
    echo '<link href="assets/css/auth-panel.css" type="text/css" rel="stylesheet" />';
    echo '<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;300;400;500&display=swap" rel="stylesheet">';
}


function include_scripts(){
    echo '<script src="vendor/jquery/jquery-3.5.1.js" type="text/javascript"></script>';
    
    echo '<script src="https://kit.fontawesome.com/849df951a4.js"></script>';
    echo '<script src="vendor/script.js"></script>';

    
}



 
 ?>








