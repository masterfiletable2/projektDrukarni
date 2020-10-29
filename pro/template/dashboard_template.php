<?php



function dashboard_template($thisMaterial){

    echo $thisMaterial->getMaterialList("id");
    echo "<br>";
    echo $thisMaterial->getMaterialList("materialname");

    
}

?>