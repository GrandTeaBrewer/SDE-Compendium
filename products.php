<!DOCTYPE html>
<html lang="en">

<?php include( "templates/common/page_head.php");?>

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

	<header id="headerContent" class="headerContent">

		<?php include( "templates/common/navbar.php");?>

		<section id="filters" class="col-md-12 row jumbotron">
			<div id="options" class="options">
				<h1 class="h1-responsive text-xs-center">A complete Super Dungeon Explore product list</h1>
				<div class="col-md-12 row">

					<?php include( "templates/filter_plugins_template.php");

          // first row filters
          echo '<div class="row"><p class="text-xs-center ">'. $explainText . '</p><hr class="featurette-divider" /></div>

					<div class="row pad-Mie-T20">' . $themeFilter . $releaseFilter .$retailFilter . $searchFilter . '</div>';

          ?>

				</div>
			</div>
		</section>
	</header>



	<main id="mainContent" data-sdetype="colio-all" class="pageContent container-fluid">
      <div id="charFilter" class="colio colioTarget">

          <!-- Fetch Content -->
          <?php include("templates/index_products.php");?>

      </div>
  </main>

	<!-- Fetch Footer -->
	<?php include( "templates/common/footer.php");?>

	<!-- Fetch Filter Scripts -->
	<?php include( "templates/isotope_scripts.php");?>

</body>
</html>
