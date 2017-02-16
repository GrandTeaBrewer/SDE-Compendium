<!DOCTYPE html>
<html lang="en">

<?php include("templates/common/page_head.php");?>

<body>

  <!-- Page loading animation -->
  <div id="preloader" class="flex-center">
  	 <div class="verticalcenter">
  			 <div class="text-center">
  					 <div id="status">
  							 <h4 class="white-text">Page Loading</h4>
  					 </div>
  			 </div>
  	 </div>
  </div>

    <header id="headerContent" class="headerContent container-fluid">

        <!-- Fetch Header -->
        <?php include("templates/common/navbar.php");?>

        <div class="jumbotron">
            <h1 class="h1-responsive text-xs-center">Crystalia game tiles</h1>
            <hr class="featurette-divider" />
            <p class="text-xs-center">Select one of the many lands in Crystalia to reveal the landscape native to that area of the land. Clicking on one theme region will automatically close all of the other sections.</p>
        </div>
    </header>

    <main id="mainContent"  data-sdetype="colio-all" class="mainContent container-fluid">

        <div class="colio colioTarget">

              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="false">

                <?php include("templates/index_game_tiles.php");?>

            </div>

        </div>
    </main>

    <!-- Fetch Footer -->
    <?php include("templates/common/footer.php");?>

</body>
</html>
