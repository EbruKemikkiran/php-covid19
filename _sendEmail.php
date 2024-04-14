

<?php
include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


$mail = new PHPMailer();

// SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = ''; // Gmail address
    $mail->Password = ''; // Gmail password
    $mail->SMTPSecure = 'ssl'; //ssl
    $mail->Port = 465; //587, 25

    // Sender
    $mail->setFrom('.......s@gmail.com', 'Covid-19 NHS ');
    $mail->addAddress($email = mysqli_real_escape_string($connection, $_POST['email']), $nameSurname = mysqli_real_escape_string($connection, $_POST['nameSurname']));

    // E-mail content
    $mail->isHTML(true);
    $mail->Subject = 'Covid - 19 Test Confirmation!';
    $mail->Body = '<p>Thank you for your order! Your order number is: ' . $nhsNumber . ' Your order will be arrive at your address within 5 working days.</p>
    <p> If you do not receive your Covid-19 test, please call 736. Prepare your NHS Number before you call.</p>
    <br>
    <hr>
    <h3 class="h4 card-title" style="color:black;">Call 999 or go to A&E if you or a child:</h3>
    <ul class="symptoms-NHS-list">
        <li>
            <p>- seems very unwell, is getting worse or you think there\'s something seriously wrong – children and babies in particular can get unwell very quickly</p>
        </li>
        <li>
            <p>- get sudden chest pain</p>
        </li>
        <li>
            <p>- are so breathless you\'re unable to say short sentences when resting or your breathing has suddenly got worse – in babies their stomach may suck in under their ribs</p>
        </li>
        <li>
            <p>- start coughing up blood</p>
        </li>
        <li>
            <p>- collapse, faint, or have a seizure or fit for the first time</p>
        </li>
        <li>
            <p>- a rash that does not fade when you roll a glass over it, the same as<a href="https://www.nhs.uk/conditions/meningitis/"> meningitis </a></p>
        </li>
    </ul>
    <br>
    <hr>
    <div class="symptoms-NHS-content">
        <h3 class="h4 card-title">Ask for an urgent GP appointment or get help from NHS 111 if:</h3>
        <ul class="symptoms-NHS-list">
            <li>
                <p>- you\'re worried about your or a child\'s COVID-19 symptoms or are not sure what to do</p>
            </li>
            <li>
                <p>- the symptoms are getting worse or are not getting better</p>
            </li>
            <li>
                <p>- you or a child have other signs of illness, such as a rash, loss of appetite, or feeling weak</p>
            </li>
            <li>
                <p>- you or a child have a high temperature that last 5 days or more or does not come down with paracetamol</p>
            </li>
            <li>
                <p>- a child under 3 months old and has a temperature of 38C or higher, or you think they have a high temperature</p>
            </li>
        </ul>
        <p style="text-align:start !important; ">
            It\'s particularly important to get help if you\'re at increased risk of getting ill from COVID-19, such as if you\'re pregnant, aged 60 or over, or have a weakened immune system.
            You can call 111 or <a href="https://111.nhs.uk/triage/check-your-symptoms">get help from 111 online.</a>
        </p>
        <br>
        <hr>
        <p style="text-align:center; ">
            <a href="http://www.nhs.uk" style="background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;">Visit NHS Website</a>
        </p>
    </div>';


    // E-mail send
    if(!$mail->send()){
echo 'Email could not be send.';
echo 'Mailler Error: '. $mail->ErrorInfo;
    }
    else {
    echo 'E-mail has been send!';
    }




?>

