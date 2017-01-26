
<?PHP

$json = json_decode(file_get_contents("./data/theme.json"), true);

$filtered_theme = array_filter($json["themeList"], function($v) {
  // only show themes with released content
  return $v['Display'] == 'Yes';
});

// start overall loop
foreach ($filtered_theme as $index => $item) {

  // Dungeon Bosses
  // =============================

    // reset variables
    $bossTheme = '';
    $bossString = '';

    // feed theme name to filter function
    $bossTheme = $item["Name"];

    // get spawnpoint data
    $bossdata = json_decode(file_get_contents("./data/dungeon_bosses.json"), true);

    // filter json data source
    $filtered_bosses = array_filter($bossdata["dungeon_bossesString"], function($v) {

      // pull variable into function
      global $bossTheme;

      // filter by colio ID
      return $v['Theme'] == $bossTheme;
      });

      // check for tile data
      if (!$filtered_bosses) {

      // return this if no tile data
      $bossString = '<em class="col-md-12 nullResult">The Dungeon Bosses for this theme have not been released.</em>';

      } else {

        foreach($filtered_bosses as $boss) {

            // build spawnpoint profile card
            $bossString .= '

            <div class="col-md-3">
                <div class="card card-cascade cardProfile">
                    <div class="top-unit">
                        <a href="./heroes" title="' . $boss["Name_Long"] .'">
                            <div class="cardPortrait text-xs-center">
                              <img class="imgIndex imgPortrait" src="'. $boss["Image_Path"] .'_icon.jpg" alt="' . $boss["Name_Long"] .'">
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">' . $boss["Name_Long"] .'</h4>
                                <p class="card-text">' . $boss["Retail_Package"] .'</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>';
          }
        }


// Dungeon Bosses
// =============================

  // reset variables

  $minibossTheme = '';
  $minibossString = '';

  // feed theme name to filter function
  $minibossTheme = $item["Name"];

  // get spawnpoint data
  $minibossData = json_decode(file_get_contents("./data/mini_bosses.json"), true);

  // filter json data source
  $filtered_minibosses = array_filter($minibossData["mini_bossesString"], function($v) {

  // pull variable into function
  global $minibossTheme;

  // filter by colio ID
  return $v['Theme'] == $minibossTheme;
  });

  // check for tile data
  if (!$filtered_minibosses) {

  // return this if no tile data
  $minibossString = '<em class="col-md-12 nullResult">The Dungeon Bosses for this theme have not been released.</em>';

  } else {

    foreach($filtered_minibosses as $miniboss) {

        // build spawnpoint profile card
        $minibossString .= '

        <div class="col-md-3">
            <div class="card card-cascade cardProfile">
                <div class="top-unit">
                    <a href="./heroes" title="' . $miniboss["Name_Long"] .'">
                        <div class="cardPortrait text-xs-center">
                          <img class="imgIndex imgPortrait" src="'. $miniboss["Image_Path"] .'_icon.jpg" alt="' . $miniboss["Name_Long"] .'">
                        </div>
                        <div class="card-block">
                            <h4 class="card-title">' . $miniboss["Name_Long"] .'</h4>
                            <p class="card-text">' . $miniboss["Retail_Package"] .'</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>';
      }
    }



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

  // spawnpoints
  // =============================

  // reset variables
  $spawnTheme = '';
  $spawn_string = '';

  // feed theme name to filter function
  $spawnTheme = $item["Name"];

  // get spawnpoint data
  $spawndata = json_decode(file_get_contents("./data/spawnpoints.json"), true);

  // filter json data source
  $filtered_spawns = array_filter($spawndata["spawnpointsString"], function($v) {

    // pull variable into function
    global $spawnTheme;

    // filter by colio ID
    return $v['Theme'] == $spawnTheme;
    });

    // check for tile data
    if (!$filtered_spawns) {

    // return this if no tile data
    $spawn_string = '<em class="col-md-12 nullResult">The spawnpoints for this theme have not been released.</em>';

    } else {

      foreach($filtered_spawns as $spawn) {

          // build spawnpoint profile card
          $spawn_string .= '

          <div class="col-md-3">
              <div class="card card-cascade cardProfile">
                  <div class="top-unit">
                      <a href="./heroes" title="' . $spawn["Name_Long"] .'" onClick="ga(\'send\', \'event\', \'colio-expand\', \'view\', \''. $spawn["Name_Long"] .'\')">
                          <div class="cardPortrait text-xs-center">
                            <img class="imgIndex imgPortrait" src="'. $spawn["Image_Path"] .'_icon.jpg" alt="' . $spawn["Name_Long"] .'">
                          </div>
                          <div class="card-block">
                              <h4 class="card-title">' . $spawn["Name_Long"] .'</h4>
                              <p class="card-text">' . $spawn["Retail_Package"] .'</p>
                          </div>
                      </a>
                  </div>
              </div>
          </div>';
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

                <h3>Dungeon Bosses</h3>
                <p>Click on each portrait to download a high resolution scan of that character\'s game card.</p>
                <hr class="featurette-divider" />
                <div class="row">'. $bossString . '
                </div>
                <hr class="featurette-divider" />

                <h3>Mini-Bosses</h3>
                <p>Click on each portrait to download a high resolution scan of that character\'s game card.</p>
                <hr class="featurette-divider" />
                <div class="row">'. $minibossString . '
                </div>
                <hr class="featurette-divider" />

                <h3>Spawn Points</h3>
                <p>Click on each portrait to view more information about that Spawn Point.</p>
                <hr class="featurette-divider" />
                <div class="row">' . $spawn_string . '
                <hr class="featurette-divider" />
                </div>

            </div>
        </section>
    </article>';


    // reset variables before next loop
    unset($bossTheme, $bossString, $minibossString, $minibossTheme, $spawnTheme, $spawn_string );
}
?>
