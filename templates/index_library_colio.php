
<?PHP
// character card library - colio expanded content

// feed in character type from colio
$charType = $_GET['var2'];


// Set session variables

    // rewritebase set on local site
    // local uses .data/
    // remote uses ../data/

if (!isset($_SESSION[ $charType .'Data' ])){
    $json = json_decode(file_get_contents("../data/" . $charType . ".json"), true);
    $_SESSION[ $charType .'Data' ]=$json;
} else {
    $json = $_SESSION[ $charType .'Data' ];
}


// pull json data source
// $json = json_decode(file_get_contents("../data/" . $charType . ".json"), true);

// filter json data source
$filtered_json = array_filter($json[$charType."String"], function($v) {

  // feed in colio ID
  $cardID = $_GET['var1'];

  // filter by colio ID
  return $v['ID'] == $cardID;
});

// loop over filtered result
foreach ($filtered_json as $index => $item) {


 if ( !empty( $item["Notes"])) {
    $note = '<hr/><h4 class="h3-responsive title">Additional Notes:</h4><hr/><p>'. $item["Notes"].'</p>';
  } else {
    $note = '';
  }

  if ( !empty( $item["Note_Img"])) {
     $Note_Img = '<a href="#' . $item["Note_Img_Capt"] . '" class="pad-Mie-R10"><img src="' .   $item["Note_Img"] . '_icon.jpg" alt="" class="img-unblock charPairing img-thumbnail img-fluid" data-toggle="tooltip" data-placement="bottom" title="' . $item["Note_Img_Capt"] . '"/></a>' ;
   } else {
     $Note_Img = '';
   }

echo '<div class="row closeMe"><div class="cardHeader col-sm-12"><h1 class="h1-responsive title">' . $item["Name_Long"] . '</h2><h4 class="h4-responsive">' .$item["Char_Type"] . '</h4></div><div class="charCard col-sm-9"><img src="' .$item["Image_Path"] . '.jpg" class="colioPicture img-fluid img-rounded" /></div><div class="charCard col-sm-3"><p class="description">' . '<div class="charStrat col-md-12"><hr/><h4 class="h3-responsive title">Character Details:</h4><hr/><ul><li><strong>Theme:</strong> ' .$item["Theme"] . '</li><li><strong>Retail Package:</strong> ' .$item["Retail_Package"] . '</li><li><strong>Release Description:</strong> ' .$item["Release_Description"] . '</li></ul>'. $note . $Note_Img . '</div></p></div></div>';


}
?>
