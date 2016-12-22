<!DOCTYPE html>
<html lang="en">

<?php header("HTTP/1.0 404 Not Found"); ?>

<?php include("templates/common/page_head.php");?>

<body>

    <header id="headerContent" class="headerContent container-fluid">

    <!-- Fetch Header -->
    <?php include("templates/common/navbar.php");?>

    <div class="jumbotron text-xs-center">
        <h1 class="h1-responsive">Page not Found</h1>
        <h2 class="h2-responsive">Oh dear, this page doesn't appear on our map</h1>
        <hr class="featurette-divider" />
        <img src="img/bg/404.png" class="img-unblock img-fluid">
        <hr class="featurette-divider">
        <button value="Back" onClick="history.go(-1);return true;" type="button" class="btn btn-info">Go Back to the previous page</button>
        <button value="Go Home" onclick="location.href='./';" type="button" class="btn btn-secondary">Lead Candy & Cola back to the Homepage</button>
    </div>

  </header>

	<!-- Fetch Footer -->
  <?php include("templates/common/footer.php");?>

</body>
</html>
