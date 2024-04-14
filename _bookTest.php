<?php require_once('config.php') ?>


<!-- BOOKING-->

<section class="book"  aria-labelledby="book" id="book">

    <h2 class="h2 section-title" id="book">Order Covid-19 Test</h2>
    <ul class="book-list">

        <li>
            <div class="book-card">

                <div class="book-card-content">
                    <h4>You may still be able to get free COVID-19 rapid lateral flow tests from the NHS if you have a health condition which means you're eligible for. </h4>
                        <h4>Please enter your information and order your free Covid-19 test to your address.</h4>
                    <form action="./_bookTestConfig.php" method="POST">
                        <label for="nhsNumber">NHS Number (10 digits, no spaces):</label><br>
                        <input type="text" id="nhsNumber" name="nhsNumber" pattern="[0-9]{10}" required><br><br>

                        <label for="nameSurname">Name:</label><br>
                        <input type="text" id="nameSurname" name="nameSurname" required><br><br>

                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" maxlength="250" required><br><br>

                        <label for="address1">Address Line 1:</label><br>
                        <textarea id="address1" name="address1" rows="4" maxlength="350"  required></textarea><br><br>

                        <label for="address2">Address Line 2:</label><br>
                        <textarea id="address2" name="address2" rows="4" maxlength="350"  ></textarea><br><br>

                        <label for="postCode">Post Code:</label><br>
                        <input type="text" id="postCode" name="postCode" required><br><br>

                        <input type="submit" value="Book Test">
                    </form>
                </div>
            </div>
        </li>
    </ul>
</section>

