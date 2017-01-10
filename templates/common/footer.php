
<!-- Footer -->
<footer  id="footerContent" class="page-footer blue center-on-small-only">
    <div class="container-fluid">
        <div class="row">
            <!--First column-->
            <div class="col-md-3">
                <div class="logo-wrap">
                    <a class="logo" title="Soda Pop Miniatures homepage" href="http://sodapopminiatures.com/"> <img alt="Home" class="img-fluid img-unblock" src="img/logos/spm_logo.png"> </a>
                </div>
            </div>
            <!--/.First column -->
            <!-- Second column-->
            <div class="col-md-6">
                <h5 class="title">Credits & Copyright</h5>

                <?PHP
                // respect for those that made contributions

                $json = json_decode(file_get_contents("./data/contributors.json"), true);

                echo "<p>This site only exists thanks to contributions from: " ;

                $len = count($json["contributions"]);
                foreach ($json["contributions"] as $index => $item) {
                    if ($index == 0) {
                        // first
                        echo '<a href="'. $item["Link"] .'">' .$item["Name"] . "</a>";
                    } else if ($index == $len -1 ) {
                        // last
                        echo ", and of course the special blessing of " . '<a href="'. $item["Link"] .'">' .$item["Name"] . "</a>.";
                    } else {
                        // middle
                        echo ", " . '<a href="'. $item["Link"] .'">' .$item["Name"] . "</a>";
                    }
                }

                echo "</p><p>SDE and it's associated products are copyrighted to Ninja Division</p>"
                ?>

            </div>
            <!--/.Second column -->
            <!-- Third column-->
            <div class="col-md-3">
                <h5 class="title">Like this site?</h5>
                <p>Then share and tell others about the SDE Compendium via social media:</p>

                <ul class="navbar-full-left">
                  <li>
                    <!--Facebook-->
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//sde.invarti.com" title="Like this site on Facebook" class="btn-floating btn-small btn-fb waves-effect waves-light"><i class="fa fa-facebook"></i>&nbsp;</a>
                    <!--Twitter-->
                    <a href="https://twitter.com/home?status=Check%20out%20http%3A//sde.invarti.com,%20the%20most%20complete%20source%20of%20Super%20Dungeon%20Explore%20reference%20material%20on%20the%20web.%20%23ninjadiv%20%23SuperDungeon" title="Share this site on Twitter" class="btn-floating btn-small btn-tw waves-effect waves-light"><i class="fa fa-twitter"></i>&nbsp;</a>
                    <!--Google +-->
                    <a href="https://plus.google.com/share?url=http%3A//sde.invarti.com" title="Share this site on Google Plus" class="btn-floating btn-small btn-gplus waves-effect waves-light"><i class="fa fa-google-plus"></i>&nbsp;</a>
                    <!--Pinterest-->
                    <a href="https://pinterest.com/pin/create/button/?url=http%3A//sde.invarti.com/&media=http%3A//sde.invarti.com/img/bg/sde-compendium-pinterest.png&description=A%20living%20library%20of%20Super%20Dungeon%20Explore%20character%20cards,%20hero%20guides,%20and%20reference%20material,%20including%20every%20retail%20release%20by%20Soda%20Pop%20Miniatures" title="Share this site on Pinterest" class="btn-floating btn-small btn-pin waves-effect waves-light"><i class="fa fa-pinterest"></i>&nbsp;</a>
                  </li>
                </ul>


            </div>
            <!--/.Third column -->
        </div>
    </div>
    <!--Copyright-->
    <div class="footer-copyright">

            <p class="text-md-center">This site was created by <a href="http://www.invarti.com" style="cursor: pointer;">Topher</a>, 2016.</p>

    </div>
    <!--/.Copyright-->
</footer>
<!--/.Footer -->

<!-- JQuery -->
<script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>

<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
    $(document).ready(function () {
        $('#status').load("mdb-addons/preloader.html", function () {
            $('#preloader').delay(300).fadeOut('slow');
            $('body').delay(300).css({
                'overflow': 'visible'
            });
        });
    });
    //]]>
</script>

<!-- Bootstrap tooltips -->
<script src="js/tether.min.js" type="text/javascript"></script>
<!-- Twitter Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- MDB core JavaScript -->
<script src="js/mdb.min.js" type="text/javascript"></script>



<!-- Google Analytics
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78045606-2', 'auto');
  ga('send', 'pageview');

</script>


-->
