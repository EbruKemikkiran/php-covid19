<?php require_once('config.php'); ?>
<?php include('./_totalCases.php'); ?>

<section class="chart"  aria-labelledby="banner-chart">
  <h2 class="h2 section-title" id="banner-chart">Covid-19 Country Cases</h2>
    <ul class="chart-list">

      <li>
        <div class="chart-card">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="country">
              <span class="hero-text">Select Country</span>
            </label>

            <select name="country" id="country" class="rounded-input">
              <option value="">Select Country</option>
              <?php include('./_selectCountry.php'); ?> 
            </select>

            
            <input type="submit" name="submit">
          </form>

            <?php include('./_filterCountry.php'); ?>

            <?php include('./_selectedCountryGraf.php'); ?>

            <div class="card-content">
          </div>
        </div>
      </li>
    </ul>
</section>