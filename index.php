<!DOCTYPE html>
<html lang="en">

<?php include("templates/common/page_head.php");?>

<body>



  <header id="headerContent">
    <!-- Fetch Header -->
    <?php include("templates/common/navbar.php");?>
  </header>

  <!-- Page Content-->
  <main id="mainContent" class="pageContent ">
      <div class="panel text-xs-center container-fluid">

          <img src="img/logos/sde_logo.png" class="img-unblock img-fluid text-xs-center" alt="Super Dungeon Explore logo">
          <hr class="featurette-divider">
          <h1 class="h1-responsive">Super Dungeon Explore Compendium</h1>
          <p>A living library of Super Dungeon Explore character cards, hero guides, and reference material, including every retail release by Soda Pop Miniatures</p>
          <hr class="featurette-divider" />

          <section class=" text-xs-left">

          <!-- Fetch Index Cards -->
				  <?php include("templates/index_cards.php");?>

        </section>
      </div>
  </main>
  <!-- Main Content End -->

<!-- Fetch Footer -->
<?php include("templates/common/footer.php");?>

</body>
</html>
