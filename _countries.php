<?php
require_once('config.php');

// fetch data from API
$url = 'https://api.apify.com/v2/key-value-stores/tVaYRsPHLjNdNBu7S/records/LATEST?disableRedirect=true';
$json = file_get_contents($url);
$data = json_decode($json, true);

// create COVID-19 table
$sqlCreateTable = "
    CREATE TABLE IF NOT EXISTS covid_data (
        id INT AUTO_INCREMENT PRIMARY KEY,
        country VARCHAR(255),
        infected INT,
        tested INT,
        recovered INT,
        deceased INT
    )
";
mysqli_query($connection, $sqlCreateTable);

// insert data into mysql
foreach ($data as $item) {
    $country = $item['country'];
    $infected = isset($item['infected']) ? $item['infected'] : 0;
    $tested = isset($item['tested']) ? $item['tested'] : 0;
    $recovered = isset($item['recovered']) ? $item['recovered'] : 0;
    $deceased = isset($item['deceased']) ? $item['deceased'] : 0;

    $sqlInsert = "INSERT INTO covid_data (country, infected, tested, recovered, deceased)
            VALUES ('$country', '$infected', '$tested', '$recovered', '$deceased')";

    if (mysqli_query($connection, $sqlInsert)) {
        echo "Data inserted successfully: $country <br>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
