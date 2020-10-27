<?php


function nav(){
    $username = $_SESSION["username"];
    $avatar = $_SESSION["avatar"];
    $type_of_user = $_SESSION["type_of_user"];



    $parts = parse_url($_SERVER["REQUEST_URI"]);
    $page_name = basename($parts['path']);


    echo ' <nav class="col-md-3 bg-dark pr-0">
            <div class="text-white user d-flex align-items-center p-3">
            <img class="user_avatar urlAvatar mr-2" src="'.$avatar.'"/><p class="m-0">'.$username.'</p>
            
            <ul class="d-flex w-100 justify-content-end text-decoration-none">
                    <li><a class="text-right pl-1 pr-1" href="user-settings"><i class="fas fa-user-cog"></i></a></li>
                    <li><a class="text-right pl-1 pr-1" href="logout"><i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </div>

        <ul class="navbar flex-column align-items-start p-0">
        ';
  
  
        echo '
            <li><a href="./dashboard"><i class="fas fa-th"></i> Pulpit</a></li>
            ';
        
        if($type_of_user == "admin"){
        echo '
            <li><a href="./warehouse"><i class="fas fa-warehouse"></i> Magazyn</a>
            <ul>
                <li><a href="./inventory">Lista magazynów</a></li>
                <li><a href="./material">Materiały</a></li>
            </ul>
            </li>
            <li><a href="#"><i class="fas fa-sticky-note"></i> Zlecenia</a></li>
            <li><a href="#"><i class="fas fa-tools"></i> Narzędzia</a></li>';

        }
        echo '
        </ul>

        </nav>';
}

?>

