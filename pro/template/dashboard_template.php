<?php



function dashboard_template($thisOrder)
{
    $type_of_user = $_SESSION["type_of_user"];


?>

    <h2>Pulpit</h2>
    <div class="app_container">

        <div div class="dashboard-container">
            <?php if ($type_of_user == "admin") { ?>

                <div class="flex-column_">

                    <div class="flex-row_ bg-white order_prev">

                        <div class="l-side">
                            <h3>Podgląd zleceń</h3>
                            <p>w tym tygidniu</p>
                            <div class="order-lists">
                                <!-- printOrderList(); -->
                                <div class="order-list-container">
                                    <div class="listed-position waiting">
                                        <p>Oczekujące</p>
                                        <h3><?php echo $thisOrder->countOfOrders("new"); ?></h3>
                                    </div>
                                    <div class="listed-position realising">
                                        <p>W trakcie realizacji</p>
                                        <h3><?php echo $thisOrder->countOfOrders("during"); ?></h3>
                                    </div>
                                    <div class="listed-position done">
                                        <p>Zrealizowane</p>
                                        <h3><?php echo $thisOrder->countOfOrders("closed"); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="r-side">
                            <!-- <h2>wykres kołowy printOrderList();</h2> -->
                            <canvas id="myChart" width="100%" height="100%"></canvas>

                        </div>
                    </div>

                    <div class="flex-column_">
                        <div class="order_list ">
                            <header class="ordering_bar">
                                <h3>Zlecenia w trakcie</h3>
                            </header>
                            <div class="actual_orders bg-white">

                                <!-- zrobić funkcję na ładowanie zleceń  -->
                                <?php
                                $result = $thisOrder->order("");
                                while ($order = $result->fetch_assoc()) {    ?>

                                    <div class="single_order order-print">
                                        <h3>Nazwa zlecenia:
                                            <span style="font-weight: 200;">
                                                <?php echo $order["order_title"]; ?>
                                            </span>
                                        </h3>
                                        <p>Realizujący:
                                            <span style="font-weight: 200;">
                                                <?php echo $order["client"]; ?>
                                            </span>
                                        </p>
                                        <p>
                                            <span class="order_note">
                                                <?php echo $order["order_notes"]; ?>
                                            </span>
                                        </p>
                                        <img src="/img/print_icon.png" alt="" srcset="" class="print_order">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-column general_container">
                    <h3 class="paddingLeft">Ilość przelotów</h3>
                    <div class="quantity_info_bar">
                        <span class="today">
                            <h4>Na dziś</h4>
                            <h2>
                                  <?php 
                                    $result = $thisOrder->order("countingOrdersInThisDay");
                                    while ($order = $result->fetch_assoc()) { 
                                        echo $order["countingOrdersInThisDay"];
                                    }
                                 ?>
                            </h2>
                        </span>
                        <span class="inThisWeek">
                            <h4>W tym tygodniu</h4>
                            <h2>
                                 <?php 
                                     $result = $thisOrder->order("countingOrdersInThisWeek");
                                    while ($order = $result->fetch_assoc()) { 
                                        echo $order["countingOrdersInThisWeek"];
                                    }
                                ?>
                            </h2>
                        </span>
                        <span class="inThisMonth">
                            <h4>W tym miesiącu</h4>
                            <h2>
                                 <?php 
                                     $result = $thisOrder->order("countingOrdersInThisMonth");
                                    while ($order = $result->fetch_assoc()) { 
                                        echo $order["countingOrdersInThisMonth"];
                                    }
                                 ?>  
                                
                            </h2>
                        </span>
                    </div>
                    <h3 class="paddingLeft">Ilość przelotów w roku</h3>
                    <div class="quantityChart">
                        <canvas id="workProgress" width="" height=""></canvas>
                    </div>
                </div>

            <?php } else { ?>

                <div class="l-side">
                    kurłaaa
                </div>
                <div class="r-side">
                    prawa
                </div>

            <?php } ?>
        </div>

    </div>


<?php
}
?>