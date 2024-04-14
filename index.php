<?php require_once('config.php'); ?>
<?php include('_totalCases.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Covid 19</title>
  <meta name="title" content="COVID-19 ">
  <meta name="theme-color" content="#4285f4">
  <meta name="description" content="This is a corona html template made by ebrukemikkiran">

  
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!--Custom css link-->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!--Google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- preload images-->
  <link rel="preload" as="image" href="./assets/images/hero-bg.png">








</head>

<body id="top">

  <?php include('./_header.php') ?>


  <main>
    <article>

      <?php include('./_banner.php') ?>
      
      <?php include('./_charts.php') ?>

      <?php include('./_contagions.php') ?>

      <?php include('./_symptoms.php') ?>

      <?php include('./_prevention.php') ?>

      <?php include('./_safety.php') ?>

      <?php include('./_faq.php') ?>

      <?php include('./_bookTestInformation.php') ?>
      
      <?php include('./_bookTest.php') ?>

      <?php include('./_footer.php') ?>

    </article>
  </main>





 <!--#BACK TO TOP-->

<a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn role="button">
  <i class="fas fa-arrow-up"></i>
 </a>

<!--PIE CHART-->
<!-- Chart.js  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!--custom js link-->
<script src="./assets/js/script.js" defer></script>

<!-- ion icon-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.2/ionicons/ionicons.esm.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- Bootsrap & Font awesome-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!--Schema Markup-->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MedicalCondition",
  "name": "COVID-19 Symptoms",
  "description": "Common symptoms of COVID-19 infection.",
  "possibleTreatment": [
    {
      "@type": "Drug",
      "name": "Antipyretics"
    },
    {
      "@type": "Drug",
      "name": "Antiviral medication"
    }
  ],
  "signOrSymptom": [
    {
      "@type": "MedicalSymptom",
      "name": "Fever"
    },
    {
      "@type": "MedicalSymptom",
      "name": "Cough"
    },
    {
      "@type": "MedicalSymptom",
      "name": "Shortness of breath"
    },
    {
      "@type": "MedicalSymptom",
      "name": "Loss of taste or smell"
    }
  ]
},
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "COVID-19 Contagion",
  "description": "Information about how COVID-19 spreads.",
  "about": {
    "@type": "MedicalEntity",
    "name": "COVID-19"
  },
  "mainEntity": {
    "@type": "InfectiousAgentClass",
    "name": "Virus"
  }
},
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "COVID-19 Prevention",
  "description": "Information about preventive measures for COVID-19.",
  "about": {
    "@type": "MedicalEntity",
    "name": "COVID-19"
  },
  "mainEntity": {
    "@type": "MedicalGuideline",
    "name": "Prevention Guidelines",
    "description": "Guidelines to prevent COVID-19 transmission.",
    "hasPart": [
      {
        "@type": "MedicalTherapy",
        "name": "Hand hygiene",
        "description": "Regular hand washing with soap and water."
      },
      {
        "@type": "MedicalTherapy",
        "name": "Social distancing",
        "description": "Maintaining a safe distance from others."
      }
    ]
  }
},
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Order COVID-19 Test",
  "description": "Information on how to order a COVID-19 test.",
  "about": {
    "@type": "MedicalEntity",
    "name": "COVID-19"
  },
  "mainEntity": {
    "@type": "MedicalTest",
    "name": "COVID-19 Test",
    "description": "PCR or antigen tests for COVID-19 detection."
  }
},
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Total World COVID-19 Cases",
  "description": "Statistics on total COVID-19 cases worldwide.",
  "mainEntity": {
    "@type": "Dataset",
    "name": "COVID-19 Global Statistics",
    "description": "Dataset with global COVID-19 case counts."
  }
}
</script>

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PTM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PTM');
</script>
<!-- End Google Analytics -->




</body>

</html>
