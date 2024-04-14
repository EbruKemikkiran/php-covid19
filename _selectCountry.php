<?php
include('config.php');


$sql = "SELECT DISTINCT country FROM covid_data";
$stmt = mysqli_prepare($connection, $sql);

// Sorguyu çalıştır
mysqli_stmt_execute($stmt);

// Sonuçları alma
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($_POST['country'] == $row['country']) ? 'selected' : '';
        echo "<option value='" . htmlspecialchars($row['country']) . "' $selected>" . htmlspecialchars($row['country']) . "</option>";
        // htmlspecialchars() kullanıcı girdilerini güvenli hale getirir
    }
}

// Statement kapat
mysqli_stmt_close($stmt);

// Bağlantıyı kapat
mysqli_close($connection);

?>