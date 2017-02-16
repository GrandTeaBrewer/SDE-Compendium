
<?PHP

$json = json_decode(file_get_contents("./data/game_tiles.json"), true);

$filtered_theme = array_filter($json["themeList"], function($v) {
  // only show themes with released content
  return $v['Display'] == 'Yes';
});

// start overall loop
foreach ($filtered_theme as $index => $item) {


// Game Tiles
// =============================

  // check for tile data
  if (!$item['Tiles']) {
    // return this if no tile data
    $tile_string = '<em class="col-md-12 nullResult">The tiles for this theme have not been released.</em>';

  } else {

  // separate csv list
  $tiles = explode(",", $item['Tiles']);

  // build tile string
  $tile_string = '';

    foreach($tiles as $tile) {
        $tile = trim($tile);
        // build tile profile
        $tile_string .= '<div class="charProfile charImg">
            <a target="_blank" class="" href="img/tiles/'. $tile .'.jpg"><img src="img/tiles/'. $tile .'_icon.jpg" alt="" class="charPicture img-thumbnail img-fluid" data-toggle="tooltip" data-placement="bottom" title="'. $tile .'" data-original-title="'. $tile .'">'. $tile .'</a></div>';
    }
  }




// Final HTML block
// =============================

    echo

    '<article class="panel panel-default">
        <section id="heading_' . strtolower(preg_replace('/\s+/', '_', $item["Name"])) .'" class="panel panel-heading col-md-12 jumbotron">
            <a class="arrow-r" data-toggle="collapse" data-parent="#accordion" href="#collapse_' . strtolower(preg_replace('/\s+/', '_', $item["Name"])) .'" aria-expanded="false" aria-controls="collapse_' . strtolower(preg_replace('/\s+/', '_', $item["Name"])) .'">
                <div class="wrapperPortrait bg_' . strtolower(preg_replace('/\s+/', '_', $item["Name"])) .'">
                    <div class="overlayPortrait">
                        <h2 class="h2-responsive">' .$item["Name"] .' <i class="fa fa-angle-down"></i></h2>
                    </div>
                </div>
            </a>
            <div id="collapse_' . strtolower(preg_replace('/\s+/', '_', $item["Name"])) .'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_ ' . strtolower(preg_replace('/\s+/', '_', $item["Name"])) .'">
                <hr class="featurette-divider" />
                <p>' .$item["Description"] .'</p>
                <hr class="featurette-divider" />

                <h3>Game Tiles</h3>
                <p>Click on each portrait to download a high resolution scan of that tile.</p>
                <hr class="featurette-divider" />
                <div class="row">'. $tile_string . '
                </div>
                <hr class="featurette-divider" />

            </div>
        </section>
    </article>';


    // reset variables before next loop
    unset($bossTheme, $bossString, $minibossString, $minibossTheme, $spawnTheme, $spawn_string );
}
?>
