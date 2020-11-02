<?php
use Phppot\Orders;


function nav(){
    $username = $_SESSION["username"];
    $avatar = $_SESSION["avatar"];
    $type_of_user = $_SESSION["type_of_user"];

    require_once('./Model/Orders.php');
$orders = new Orders();


?>




<nav class="navigation">
        <div class="user">
            <img class="user_avatar" src="<?php echo $avatar; ?>" style="" />
            <p class=""><?php echo $username; ?></p>

            <div class="user_menu">
                <a class="" href="user-edit"><i class="fas fa-user-cog ihover"></i></a>
                <a class="" href="logout"><i class="fas fa-sign-out-alt ihover"></i></a>
            </div>
        </div>

        <div class="menu">
        <?php if ($type_of_user == "admin") { ?>
            <ul>
                <li><a href="./dashboard"><i class="fas fa-th"></i> Pulpit</a></li>

               

                    <li><a href="./inventory_structure"><i class="fas   fa-warehouse"></i> Magazyn</a>
                        <ul>
                            <li><a href="./inventory">Lista magazynów</a></li>
                            <li><a href="./material">Materiały</a></li>
                        </ul>
                    </li>
                    <li><a href="./orders"><i class="fas fa-sticky-note"></i> Zlecenia</a>
                        <ul>
                            <li><a href="./orders-add">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Dodaj zlecenie</a></li>
                            <li><a href="./orders-new">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Lista nowych zleceń</a></li>
                            <li><a href="./orders-inprogress">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Zlecenia w toku</a></li>
                            <li><a href="./orders-closed">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Zlecenia zrealizowane</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fas fa-tools"></i> Narzędzia</a></li>
                    <li><a href="./users"><i class="fas fa-users"></i>Użytkownicy</a>
                        <ul>
                            <li><a href="./workers">Pracownicy</a></li>
                            <li><a href="./clients">Klienci</a></li>
                        </ul>
                    </li>

            </ul>

            <?php } ?>

     

            <?php if ($type_of_user == "worker") { ?>
            <ul>
                <li><a href="./dashboard"><i class="fas fa-th"></i> Pulpit</a></li>

               

                    <li><a href="./inventory_structure"><i class="fas   fa-warehouse"></i> Magazyn</a>
                        <ul>
                            <li><a href="./inventory">Lista magazynów</a></li>
                            <li><a href="./material">Materiały</a></li>
                        </ul>
                    </li>
                    <li><a href="./orders"><i class="fas fa-sticky-note"></i> Zlecenia</a>
                        <ul>
                            <li><a href="./orders-add">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Dodaj zlecenie</a></li>
                            <li><a href="./orders-new">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Lista nowych zleceń</a></li>
                            <li><a href="./orders-inprogress">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Zlecenia w toku</a></li>
                            <li><a href="./orders-closed">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Zlecenia zrealizowane</a></li>
                        </ul>
                    </li>
                   

            </ul>

            <?php } ?>








            <?php if ($type_of_user == "client") { ?>
            <ul>
                <li><a href="./dashboard"><i class="fas fa-th"></i> Pulpit</a></li>

               

                    
                    <li><a href="./orders"><i class="fas fa-sticky-note"></i> Zlecenia</a>
                        <ul>
                            <li><a href="./orders-add">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Dodaj zlecenie</a></li>
                            <li><a href="./orders-inprogress">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Zlecenia w toku</a></li>
                            <li><a href="./orders-closed">
                                    <!-- <i class="fas fa-sticky-note"></i> -->Zlecenia zrealizowane</a></li>
                        </ul>
                    </li>
             
            </ul>

            <?php } ?>


        
        </div>


        
  
     
                 
        <div class="notifications-container">
            <button id="notification" class="btn btn-notification notification_quantity"><i class="fas fa-bell"></i><?php $orders->getNorification(true,"")?></button>
 
 <div class="notifications-content">
 <button id="notification-close" class="btn"><i class="fas fa-times"></i></button>
 <ul><?php $orders->getNorification("",true)?></ul></div>
 
       </div>

    </nav>




    <?php

//     echo ' <nav class="col-md-3 bg-dark pr-0">
//             <div class="text-white user d-flex align-items-center p-3">
//             <img class="user_avatar urlAvatar mr-2" src="'.$avatar.'"/><p class="m-0">'.$username.'</p>
            
//             <ul class="d-flex w-100 justify-content-end text-decoration-none">
//                     <li><a class="text-right pl-1 pr-1" href="user-edit"><i class="fas fa-user-cog"></i></a></li>
//                     <li><a class="text-right pl-1 pr-1" href="logout"><i class="fas fa-sign-out-alt"></i></a></li>
//                 </ul>
//             </div>


// ';
//         if($type_of_user == "admin"){
//             echo '
//         <ul class="navbar flex-column align-items-start p-0">
              
//             <li><a href="./dashboard"><i class="fas fa-th"></i> Pulpit</a></li>
//             <li><a href="./inventory_structure"><i class="fas fa-warehouse"></i> Magazyn</a>
//             <ul>
//                 <li><a href="./inventory">Lista magazynów</a></li>
//                 <li><a href="./material">Materiały</a></li>
//             </ul>
//             </li>
//             <li><a href="./orders"><i class="fas fa-sticky-note"></i> Zlecenia</a>
//                 <ul>
//                     <li><a href="./orders-add"><i class="fas fa-sticky-note"></i> Dodaj zlecenie</a></li>
//                     <li><a href="./orders-new"><i class="fas fa-sticky-note"></i> Nowe zlecenia </a></li>
//                     <li><a href="./orders-inprogress"><i class="fas fa-sticky-note"></i> Zlecenia w trakcie</a></li>
//                     <li><a href="./orders-closed"><i class="fas fa-sticky-note"></i> Zlecenia zrealizowane</a></li>
//                 </ul>
//             </li>
//             <li><a href="./tools"><i class="fas fa-tools"></i> Narzędzia</a></li>
//             <li><a href="./users"><i class="fas fa-users"></i>Użytkownicy</a>
//                 <ul>
//                 <li><a href="./workers">Pracownicy</a></li>
//                 <li><a href="./clients">Klienci</a></li>
//                 </ul>
//             </li>
//         </ul>';
//     }



//     if($type_of_user == "worker"){
//         echo '
//     <ul class="navbar flex-column align-items-start p-0">
          
//         <li><a href="./dashboard"><i class="fas fa-th"></i> Pulpit</a></li>
//         <li><a href="./inventory_structure"><i class="fas fa-warehouse"></i> Magazyn</a>
//         <ul>
//             <li><a href="./inventory">Lista magazynów</a></li>
//             <li><a href="./material">Materiały</a></li>
//         </ul>
//         </li>
//         <li><a href="./orders"><i class="fas fa-sticky-note"></i> Zlecenia</a>
//             <ul>
//                 <li><a href="./orders-add"><i class="fas fa-sticky-note"></i> Dodaj zlecenie</a></li>
//                 <li><a href="./orders-new"><i class="fas fa-sticky-note"></i> Nowe zlecenia </a></li>
//                 <li><a href="./orders-inprogress"><i class="fas fa-sticky-note"></i> Zlecenia w trakcie</a></li>
//                 <li><a href="./orders-closed"><i class="fas fa-sticky-note"></i> Zlecenia zrealizowane</a></li>
//             </ul>
//         </li>
//         <li><a href="#"><i class="fas fa-tools"></i> Narzędzia</a></li>
       
//     </ul>';
// }



//     if($type_of_user == "client"){
//         echo '
//     <ul class="navbar flex-column align-items-start p-0">
          
//         <li><a href="./dashboard"><i class="fas fa-th"></i> Pulpit</a></li>
       
        
//                 <li><a href="./orders-add"><i class="fas fa-sticky-note"></i> Dodaj zlecenie</a></li>
//                 <li><a href="./orders"><i class="fas fa-sticky-note"></i> Moje zlecenia</a>
//                 <li><a href="./orders-closed"><i class="fas fa-sticky-note"></i> Moje zrealizowane zlecenia</a></li>
           
//         </li>
       
//     </ul>';
// }





// require_once('./Model/Orders.php');
// $orders = new Orders();




//     echo '
        
//        <div class="notifications-container">
//            <button id="notification" class="btn btn-notification notification_quantity"><i class="fas fa-bell"></i>',$orders->getNorification(true,""),'</button>

// <div class="notifications-content">
// <button id="notification-close" class="btn"><i class="fas fa-times"></i></button>
// <ul>',$orders->getNorification("",true),'</ul></div>

//       </div>
        

//         </nav>';







}

?>

