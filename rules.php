<!DOCTYPE html>
<html lang="en">

<?php include("templates/common/page_head.php");?>

<body>

  <!-- preloader
  <div id="mdb-preloader" class="flex-center">
    <div id="preloader-markup"></div>
  </div>
  -->

    <header id="headerContent">
      <!-- Fetch Header -->
      <?php include("templates/common/navbar.php");?>
    </header>

    <main id="mainContent" class="pageContent container-fluid">
      <article class="panel">
            <h1 class="h1-responsive text-xs-center">The Rules of the Land</h1>
            <p class="text-xs-center">The following section contains the official rules as provided and maintained by Soda Pop Miniatures.</p>
            <hr class="featurette-divider">
            <div class="row">

            <?php include("templates/index_rules.php");
            echo $official;
            ?>

            </div>

      </article>

      <article class="panel">
        <hr class="featurette-divider">
        <h1 class="h1-responsive text-xs-center">Custom Rule Sets</h1>
        <p class="text-xs-center">The following section contains a series of custom rulsets as devised by members of the SDE community. Most of these are community collaborations, so if you have an idea or improvement then by all means get involved!</p>
            <hr class="featurette-divider">
            <div class="row">

            <?php
            echo $community;
            ?>

            </div>

      </article>
    </main>

    <!-- Fetch Footer -->
    <?php include("templates/common/footer.php");?>

</body>
</html>
