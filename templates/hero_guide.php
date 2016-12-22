
<?PHP

// Set session variables
if (!isset($_SESSION['heroesData'])){
    $json = json_decode(file_get_contents("./data/heroes.json"), true);
    $_SESSION['heroesData']=$json;
} else {
    $json = $_SESSION['heroesData'];
}

// loop through json records
foreach ($json["heroesString"] as $index => $item) {

// remove spaces in rating string
$rating_revised = preg_replace('/\s+/', '', $item["Rating_Revised"]);

// build html wrapping
echo '<div id="'. $item["ID"] .'" data-content="./templates/hero_guide_colio.php?var1='. $item["ID"] .'" class="charProfile charImg heroFilter expanded-list' . ' ' .$item["Release_Code"] . ' ' .$item["Roles"] . ' ' .$item["Offense_Stat"] . ' ' .$item["Affinity"] . ' ' .$item["Retail_Code"] . ' theme'. preg_replace('/\s+/', '', $item["Theme"]) . ' tier' .$rating_revised . '"><a class="colio-link colioTmp" href="#"><img src="' .$item["Image_Path"] . '_icon.jpg" alt="" class="charPicture img-thumbnail img-fluid" data-toggle="tooltip" data-placement="bottom" title="' .$item["Name_Long"] . '" />' .$item["Name_Long"] . '</a></div>';
}

?>
