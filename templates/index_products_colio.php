
<?PHP
// character card library - colio expanded content

// Set session variables

    // rewritebase set on local site
    // local uses .data/
    // remote uses ../data/



    // Set session variables
    // if (!isset($_SESSION['productData'])){
$json = json_decode(file_get_contents("../data/product_list.json"), true);
    //    $_SESSION['productData']=$json;
    // } else {
    //    $json = $_SESSION['productData'];
    // }



// filter json data source
$filtered_json = array_filter($json["productList"], function($v) {

  // feed value from colio expand URL
  $cardID = $_GET['var1'];

  // filter by colio ID
  return $v['ID'] == $cardID;
});

// loop over filtered result
foreach ($filtered_json as $index => $productList) {


  // build product contents string

  // separate out csv string
  $productContents = explode(",", $productList['Contents']);
  // clear + declare variable
  $contents_string = '';
  // loop over separated csv string
  foreach($productContents as $productContent) {
      $productContent = trim($productContent);
      // create html wrapping
      $contents_string .= '<li>' . $productContent . '</li>';
  }

  // check errata contents
  $errataString = '';
  if (!$productList["Errata_Header"]) {

  // if empty return null
  $errataString = '';

  } else {

  // build errara html block
  $errataString= '<div class="cardErrata col-sm-12"><hr/>
        <h3 class="h3-responsive title">' . $productList["Errata_Header"] . '</h3><hr/>
        <p class="errataDescription"> ' . $productList["Errata_Text"] . '</p>
    </div>';
  }


echo '<div class="row closeMe">
        <div class="cardHeader col-sm-12">
          <h1 class="h1-responsive title">' . $productList["Product_Name"] . '</h1>
        </div>
        <div class="charCard col-sm-6 text-xs-center">
            <img src="' . $productList["Image_Path"] . $productList["Product_Name_Short"] . '.jpg" class="img-fluid img-rounded" />
        </div>
        <div class="charCard col-sm-6">
            <div class="col-sm-6">
                <h3 class="h3-responsive title">Product Summary:</h3><hr/>
                <ul class="productHighlights">
                    <li><strong>Type: </strong>' .$productList["Type"] . '</li>
                    <li><strong>Theme: </strong> ' . $productList["Theme"] . '</li>
                    <li><strong>Retail Status: </strong>' . $productList["Retail_Status"] . '</li>
                </ul>
                <ul class="productHighlights">
                    <li><strong>Retail Price (RRP): </strong>' .$productList["RRP"] . '</li>
                    <li><strong>Release Date: </strong> ' . $productList["Release_Date"] . '</li>
                </ul>
            </div>
            <div class="col-sm-6">
                <h3 class="h3-responsive title">Product Summary:</h3><hr/>
                '. $contents_string .'
            </div>
            '. $errataString .'
        </div>
      </div>';

};



?>
