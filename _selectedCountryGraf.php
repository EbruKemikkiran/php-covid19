<?php
include('config.php');

// Form submit codes
if (isset($_POST['submit'])) {
    $selectedCountry = $_POST['country'];

    // Prepared statement 
    $sql = "SELECT * FROM covid_data";
    if (!empty($selectedCountry)) {
        $sql .= " WHERE country = ?";
    }

    // Prepare statement 
    $stmt = mysqli_prepare($connection, $sql);

    if (!empty($selectedCountry)) {

        // user input
        mysqli_stmt_bind_param($stmt, "s", $selectedCountry);
    }

    // execute query
    mysqli_stmt_execute($stmt);

    // fetch results
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // convert data to JSON
        $totalConfirmedCases = (int)$row['infected'];
        $tested = (int)$row['tested'];
        $recovered = (int)$row['recovered'];
        $deaths = (int)$row['deceased'];
    } else {
        echo "Data could not find.";
    }

    // Statement close
    mysqli_stmt_close($stmt);
}

// Connection close
mysqli_close($connection);

?>


<div class="chart-container">
    <div style="width: 100%; margin: 20px auto;">
        <canvas id="myPieChart" display="inline-block"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Total Confirmed Cases', 'Tested Cases', 'Recovered Cases', 'Deaths'],
            datasets: [{
                label: 'COVID-19 Data',
                data: [
                    <?php echo isset($totalConfirmedCases) ? $totalConfirmedCases : 0; ?>,
                    <?php echo isset($tested) ? $tested : 0; ?>,
                    <?php echo isset($recovered) ? $recovered : 0; ?>,
                    <?php echo isset($deaths) ? $deaths : 0; ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 206, 86, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'COVID-19 Data'
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                            return previousValue + currentValue;
                        });
                        var currentValue = dataset.data[tooltipItem.index];
                        var percentage = parseFloat((currentValue / total * 100).toFixed(1));
                        return currentValue + ' (' + percentage + '%)';
                    }
                }
            }
        }
    });
    
</script>
