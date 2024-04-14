<?php
include('config.php');

// Form submit codes
if (isset($_POST['submit'])) {
  $selectedCountry = $_POST['country'];

  // Filtreleme işlemi
  $sql = "SELECT * FROM covid_data";
  if (!empty($selectedCountry)) {
    // Kullanıcı girdilerini güvenli hale getirerek sorguya ekleyin
    $sql .= " WHERE country = ?";
  }

  // Prepared statement oluştur
  $stmt = mysqli_prepare($connection, $sql);

  if (!empty($selectedCountry)) {
    // Kullanıcı girdisini bağlayın
    mysqli_stmt_bind_param($stmt, "s", $selectedCountry);
  }

  // Sorguyu çalıştır
  mysqli_stmt_execute($stmt);

  // Sonuçları alma
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<ul class=\"hero-list\">";
    echo "<h3>" . htmlspecialchars($row['country']) . "</h3>";
    echo "<li  class=\"hero-list-item blue\">Total case<span class=\"span\">" . number_format($row['infected'], 0, ',', '.') . "</span></li>";
    echo "<li class=\"hero-list-item yellow\">Tested cases<span class=\"span\">" . number_format($row['tested'], 0, ',', '.') . "</span></li>";
    echo "<li class=\"hero-list-item green\">Recovered cases<span class=\"span\">" . number_format($row['recovered'], 0, ',', '.') . "</span></li>";
    echo "<li class=\"hero-list-item red\">Deaths<span class=\"span\">" . number_format($row['deceased'], 0, ',', '.') . "</span></li>";
    echo "</ul>";
  } else {
    echo "Data could not find.";
  }

  // Statement kapat
  mysqli_stmt_close($stmt);
}

// Bağlantıyı kapat
mysqli_close($connection);

?>
