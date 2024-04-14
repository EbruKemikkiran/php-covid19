<?php
require_once('config.php');

// fetch form data
$nhsNumber = mysqli_real_escape_string($connection, $_POST['nhsNumber']);
$nameSurname = mysqli_real_escape_string($connection, $_POST['nameSurname']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$address1 = mysqli_real_escape_string($connection, $_POST['address1']);
$address2 = mysqli_real_escape_string($connection, $_POST['address2']);
$postCode = mysqli_real_escape_string($connection, $_POST['postCode']);

// check NHS number format (should be 10 char and without whitw space) 
if (!preg_match("/^[0-9]{10}$/", $nhsNumber)) {
    die("Please enter 10 digits NHS Number.");
}

// trim NHS number
$nhsNumber = str_replace(' ', '', $nhsNumber);


// check NHS number if it is in the table
$stmt_check_nhs = mysqli_prepare($connection, "SELECT * FROM book_test WHERE nhsNumber = ?");
mysqli_stmt_bind_param($stmt_check_nhs, "s", $nhsNumber);
mysqli_stmt_execute($stmt_check_nhs);
$result_check_nhs = mysqli_stmt_get_result($stmt_check_nhs);

if (mysqli_num_rows($result_check_nhs) > 0) {
    die("You have already ordered Covid-19 Test.");
}

// check email form
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Please enter correct email format.");
}

// address validation and UI compatibility
// you could get more detailed address information

// trim and lowercase
$nameSurname = strtolower(str_replace(' ', '', $nameSurname));

// insert query
$stmt_insert = mysqli_prepare($connection, "INSERT INTO book_test (nhsNumber, address1, address2, postCode, email, nameSurname) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt_insert, "ssssss", $nhsNumber, $address1, $address2, $postCode, $email, $nameSurname);

if (mysqli_stmt_execute($stmt_insert)) {

    require_once('./_sendEmail.php');

    echo "You are successfully ordered your Covid-19 Test. Your Covid-19 Test will arrive at your address within 5 working days.";
    echo "<br><br>";
    echo "<a href='index.php'>Back to Home</a>";
} else {
    echo "Error: " . mysqli_error($connection);
}

// statement close
mysqli_stmt_close($stmt_check_nhs);
mysqli_stmt_close($stmt_insert);

// conection close
mysqli_close($connection);
?>
