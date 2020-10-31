<?php



function dashboard_template($thisOrder){

    echo "<br><br>";

    echo "Łączna ilość zamówień:";
    echo  $thisOrder->countOfOrders("");
    
    echo "<br><br>";


    echo "Łączna ilość zamówień nowych:";
    echo  $thisOrder->countOfOrders("new");
    echo "<br><br>";

    echo "Łączna ilość zamówień w trakcie realizacji:";
    echo  $thisOrder->countOfOrders("during");
    echo "<br><br>";


    echo "Łączna ilość zamówień zakończonych:";
    echo  $thisOrder->countOfOrders("closed");
    echo "<br><br>";


    echo "Łączna ilość zamówień w oczekiwaniu na użyszkodnia:";
    echo  $thisOrder->countOfOrders("cancel");
    echo "<br><br>";


    echo "Łączna ilość zamówień w oczekiwaniu na reakcję użytkownika:";
    echo  $thisOrder->countOfOrders("client-response");
    echo "<br><br>";




//w trakcie realizacji

$result = $thisOrder->order();

while( $order = $result->fetch_assoc() ) {			
echo "<div>";
    echo "<div>".$order["order_title"]."</div>";
    echo "<div>".$order["worker"]."</div>";
    echo "<div>".$order["client"]."</div>";
    echo "<div>".$order["order_notes"]."</div>";
echo "</div>";

    echo "<br>";

}


}

?>