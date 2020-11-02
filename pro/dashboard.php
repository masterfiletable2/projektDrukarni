<?php

use Phppot\Dashboard;
session_start();
require_once('functions.php');
require_once('template/nav_template.php');
require_once('template/dashboard_template.php');
require_once('redirection.php');

require_once('./Model/Dashboard.php');
$order = new Dashboard();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Dashboard</title>
    <?php include_styles() ?>

</head>

<body>

    <section class="wrapper">

        <div class="app_nav">
            <?php nav() ?>
        </div>

        <div class="app_dashboard">
            <?php dashboard_template($order); ?>
        </div>

    </section>


    <?php include_scripts() ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="vendor/jquery.dataTables.min.js"></script>
    <script src="vendor/material.js"></script>

    <script src="vendor/dist/Chart.js"></script>
    <script src="vendor/dashboard_charts.js"></script>

    <script>

circleChart( <?php echo $order->countOfOrders("new"); ?>,
            <?php echo $order->countOfOrders("during"); ?>,
            <?php echo $order->countOfOrders("closed"); ?>)
            

var dataOfToday = [<?php echo $order->ordersOfTime(0,"today"); ?>];

//nameOfdaysInWeek
var week = [<?php echo $order->ordersOfTime(0,"thisWeek"); ?>];
//valueOfDaysInWeek
var dataOfWeek = [<?php echo $order->ordersOfTime(1,"thisWeek"); ?>];


var months = [<?php echo $order->ordersOfTime(0,"thisMonth"); ?>];
var dataOfMonth = [<?php echo $order->ordersOfTime(1,"thisMonth"); ?>];



graphChart(["Dziś"],dataOfToday)

$(".today").click(()=> graphChart(["Dziś"],dataOfToday))

$(".inThisWeek").click(()=> graphChart(week,dataOfWeek))

$(".inThisMonth").click(()=> graphChart(months,dataOfMonth))




    </script>

  
<?php


?>
</body>

</html>