
<?PHP

// Set session variables
if (!isset($_SESSION[ $card_type .'Data' ])){
    $json = json_decode(file_get_contents("./data/" . $card_type . ".json"), true);
    $_SESSION[ $card_type .'Data' ]=$json;
} else {
    $json = $_SESSION[ $card_type .'Data' ];
}

// pull JSON data file
// $json = json_decode(file_get_contents("./data/" . $card_type . ".json"), true);

// loop through json records
foreach ($json[$card_type."String"] as $index => $item) {

// build html wrapping

echo '<div id="'. $item["ID"] .'" data-content="./templates/index_library_colio.php?var1='. $item["ID"] . '&var2=' . $card_type . '" class="charProfile isotopeTrigger charImg heroFilter expanded-list' . ' ' .$item["Release_Code"] . ' ' .$item["Retail_Code"] .' theme'. preg_replace('/\s+/', '', $item["Theme"]) . '"><a ID="' .$item["ID"] . '" class="colio-link colioTmp" href="#" onClick="ga(\'send\', \'event\', \''. $item["Name_Long"] .'\', \'view\', \'colio-expand\')" ><img src="' .$item["Image_Path"] . '_icon.jpg" alt="" class="charPicture img-thumbnail img-fluid" data-toggle="tooltip" data-placement="bottom" title="' .$item["Name_Long"] . '" />' .$item["Name_Long"] . '</a></div>';

}

?>
