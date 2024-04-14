<?php
include('config.php');

// fetch API data
$url = 'https://api.apify.com/v2/key-value-stores/tVaYRsPHLjNdNBu7S/records/LATEST?disableRedirect=true';
$json = file_get_contents($url);
$data = json_decode($json, true);

// calculate total case
$totalConfirmedCases = 0;
$tested =0;
$recovered=0;
$deaths=0;
foreach ($data as $item) {
    $totalConfirmedCases += $item['infected'];
}

foreach ($data as $item) {
    $tested += intval($item['tested']);
}
foreach ($data as $item) {
    $recovered += intval($item['recovered']);
}
foreach ($data as $item) {
    $deaths += intval($item['deceased']);
}

$formattedTotalConfirmedCases = number_format($totalConfirmedCases, 0, ',', '.');
$formattedTotaltested = number_format($tested, 0, ',', '.');
$formattedTotalrecovered = number_format($recovered, 0, ',', '.');
$formattedTotaldeaths = number_format($deaths, 0, ',', '.');


// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>