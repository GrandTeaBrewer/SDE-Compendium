
<?PHP

// Set session variables
// if (!isset($_SESSION['productData'])){
    $json = json_decode(file_get_contents("./data/product_list.json"), true);
//    $_SESSION['productData']=$json;
// } else {
//    $json = $_SESSION['productData'];
// }

// loop through json records
foreach ($json["productList"] as $index => $productList) {


// build html wrapping

//  card card-cascade cardProfile


echo '      <div id="'. $productList["ID"] . '" data-content="./templates/index_products_colio.php?var1='. $productList["ID"] .'" class="productProfile card card-cascade isotopeTrigger '. $productList["Retail_Code"].' '. $productList["Theme"].'">
                  <div class="top-unit">
                        <a class="colio-link colioTmp" href="#" title="' . $productList["Product_Name"] .'">
                            <div class="cardPortrait text-xs-center">
                              <img class="imgProduct imgIndex imgPortrait img-thumbnail img-fluid" src="'. $productList["Image_Path"] . $productList["Product_Name_Short"] .'_icon.jpg" alt="' . $productList["Product_Name"] .'" data-toggle="tooltip" data-placement="bottom" title="' . $productList["Product_Name"] . '">
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">' . $productList["Product_Name"] .'</h4>

                            </div>
                        </a>
                    </div>
            </div>';
}

?>
