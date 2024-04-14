<?php include('config.php'); ?> 
 <?php include('./_totalCases.php'); ?>

 <!-- BANNER-->
 
<section class="section hero has-bg-image" id="home" aria-label="Home Section" style="background-image: url('./assets/images/hero-bg.png')" >
  <div class="container">
    <div class="hero-content">
      <h1 class="h1 hero-title">COVID-19</h1>
      <p class="hero-text">Total Confirmed Cases</p>
      <data class="counter" value="<?php echo $formattedTotalConfirmedCases; ?>"></data>  

        <ul class="hero-list">
          <li class="hero-list-item yellow" aria-label="Total Covid Tested Cases">
            Tested cases <span class="span"><?php echo $formattedTotaltested; ?></span>
          </li>

          <li class="hero-list-item green" aria-label="Total Covid Recovered Cases">
            Recovered cases <span class="span"><?php echo $formattedTotalrecovered; ?></span>
          </li>

          <li class="hero-list-item red" aria-label="Total Covid Death Cases">
            Deaths <span class="span"><?php echo $formattedTotaldeaths; ?></span>
          </li>
        </ul>
    </div> 
  </div>
</section>




