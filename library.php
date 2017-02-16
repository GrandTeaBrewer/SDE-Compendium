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
				<h1 class="h1-responsive text-xs-center">Character Card Library</h1>
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

	<main id="mainContent" data-sdetype="colio-all"  class="pageContent container-fluid">
		<div class=" row">

			<?php
      // list of sections to include

      $cardLibrary=array( "Heroes", "Monsters", "Mini Bosses", "Dungeon Bosses", "Spawnpoints", "Pets", "NPC", "Shapeshifters", "Other");

			// loop start
			foreach ($cardLibrary as $index) {

      // replace spaces + lowercase
      $card_type=strtolower(preg_replace( '/\s+/', '_', strtolower($index)));

			echo '<article><hr class="featurette-divider" /><h2 class="h2-responsive h2-bold">'.$index. '</h2>';
			echo '<hr class="featurette-divider" /><section id="'. $card_type . '" class="colio colioTarget">';

			include( "templates/index_library.php");

			echo '</section></article>'; }
			unset($card_type); ?>

		</div>
	</main>

	<!-- Fetch Footer -->
	<?php include( "templates/common/footer.php");?>

	<!-- Fetch Filter Scripts -->
	<?php include( "templates/isotope_scripts.php");?>

	<script>
		// function to close colio instances in other character sections
		$('.colio-link').click(function() {
			var parentID = $(this).closest("section").attr("id");

			var sectionID = ["heroes", "monsters", "mini_bosses", "dungeon_bosses", "spawnpoints", "pets", "npc", "shapeshifters", "other"];

			sectionID.splice($.inArray(parentID, sectionID), 1);

			$.each(sectionID, function(i, f) {
				$("#" + f + " .colio-link").trigger("colio", "collapse");
			//	console.log(f);
			});
		});
	</script>

</body>
</html>
