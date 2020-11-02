
function circleChart($new,$during,$closed){
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Oczekujące","W trakcie realizacji", "Zrealizowane"],
            datasets: [{
                label: '# of Votes',
                data: [
                    $new,
                    $during,
                    $closed
                   
                ],
                backgroundColor: [
                    'rgb(228, 93, 86)',
                    'rgb(187, 47, 93)',
                    'rgb(255, 145, 77)'
                ],
                borderColor: [
                    'rgb(228, 93, 86)',
                    'rgb(187, 47, 93)',
                    'rgb(255, 145, 77)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    display: false,
                    ticks: {
                        beginAtZero: true
                    },
                    gridLines: {
                        display: false,
                    }
                }]
            },
            showLines: true,
        }
    });

}





function graphChart($label,$data){
    var ctx = document.getElementById('workProgress').getContext('2d');
  

    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: $label,
            datasets: [{
                label: "Ilość przelotów w roku 2020",
                data: $data,
                fill: false,
                backgroundColor: [
                    'rgb(228, 93, 86)',
                    'rgb(187, 47, 93)',
                    'rgb(255, 145, 77)',
                    'rgb(228, 93, 86)',
                    'rgb(187, 47, 93)',
                    'rgb(255, 145, 77)',
                    'rgb(228, 93, 86)',
                    'rgb(187, 47, 93)',
                    'rgb(255, 145, 77)',
                    'rgb(228, 93, 86)',
                    'rgb(187, 47, 93)',
                    'rgb(255, 145, 77)'
                ],

                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });
}





$(".quantity_info_bar span").first().addClass("quantity_info_bar-active")
$(".quantity_info_bar span").click(function(){
    $(this).prevAll().removeClass("quantity_info_bar-active")
    $(this).nextAll().removeClass("quantity_info_bar-active")
    $(this).addClass("quantity_info_bar-active")
})






