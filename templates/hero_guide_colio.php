
<?PHP
// character card library - colio expanded content

// Set session variables

    // rewritebase set on local site
    // local uses .data/
    // remote uses ../data/

if (!isset($_SESSION['heroesData'])){
    $json = json_decode(file_get_contents("../data/heroes.json"), true);
    $_SESSION['heroesData']=$json;
} else {
    $json = $_SESSION['heroesData'];
}

// filter json data source
$filtered_json = array_filter($json["heroesString"], function($v) {

  // feed value from colio expand URL
  $cardID = $_GET['var1'];

  // filter by colio ID
  return $v['ID'] == $cardID;
});

// loop over filtered result
foreach ($filtered_json as $index => $item) {

// separate csv list
$roles = explode(",", $item['Roles']);

// build role string
$role_string = '';
foreach($roles as $role) {
    $role = trim($role);
    // html wrapping
    $role_string .= '<img src="img/classes/' . strtolower($role) . '.png" class="charClass"  title="' . $role . '" data-toggle="tooltip" data-placement="bottom" />';
}

// separate csv list
$pairing_string = '';
$pairings = explode(",", $item['Strategy_Pairing']);

// build pairing string
foreach($pairings as $pairing) {
    $pairing = trim($pairing);
    // convert to lowercase ( remove spaces)
    $pairing_img = strtolower(preg_replace('/\s+/', '_', $pairing));
    // html wrapping
    $pairing_string .= '<a href="#" class="pad-Mie-R10"><img src="img/heroes/' .   $pairing_img . '_icon.jpg" alt="" class="img-unblock charPairing img-thumbnail img-fluid" data-toggle="tooltip" data-placement="bottom" title="' . $pairing . '"/></a>' ;
}

  echo '<div class="row closeMe"><div class="cardHeader col-sm-12"><h1 class="h1-responsive title">' . $item["Name_Long"] . '</h2><h4 class="h4-responsive">' .$item["Char_Type"] . '</h4></div><div class="charCard col-sm-6 text-xs-center"><img src="' .$item["Image_Path"] . '.jpg" class="img-fluid img-rounded" /></div><div class="charCard col-sm-6"><p class="description">' . '<div class="col-md-6"><h4 class="h4-responsive title">Character Summary:</h4><hr/><ul class="heroHighlights"><li><strong>Rating: </strong>' .$item["Rating_Revised"] . '</li><li><strong>Roles: </strong> ' . $role_string . '</li><li><strong>Playing difficulty: </strong>' . $item["Hero_Difficulty"] . '</li><li><strong>Primary Offensive Stat: </strong>' .$item["Offense_Stat"] . '</li><li><strong>Theme: </strong>' .$item["Theme"] . '</li></ul></div><div class="col-md-6"><h4 class="h4-responsive title">Hero Power Levels:</h4><hr/> <canvas id="charChart_'. $item["ID"].'" class="canvas"></canvas></div>' . '<div class="charStrat col-md-12"><h4 class="h3-responsive title">Hero Strategy Guide:</h4><hr/>' .$item["iamfanboy_Strategy_Description"] . '</div></p></div></div><div class="row"><div class="pad-Mie-B20 col-md-6"><h4 class="h4-responsive title">Suggested Hero Pairing:</h4><hr/>' . $pairing_string . '</div></div>';

}
?>
