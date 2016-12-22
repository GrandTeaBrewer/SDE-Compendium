
<?PHP
// respect for those that made contributions

$json = json_decode(file_get_contents("./data/rules.json"), true);

$official ='';
$community = '';

$filtered_json = array_filter($json["rulesindex"], function($v) {

  // filter by colio ID
  return $v['display'] == 'Yes' && $v['type'] == 'official';

});

foreach ($filtered_json as $index => $item) {

        $official .= '<div class="col-md-4">
                <div class="card card-cascade cardHome">
                  <div class="top-unit">
                    <a href="' .$item["link"] .'" title="' .$item["title"] . '">
                      <p class="card-text card-meta"><small class="text-muted ">' .$item["updated"] .'</small></p>
                      <div class="text-xs-center"><img class="imgIndex img-fluid" src="' .$item["image"] .'" alt="' .$item["title"] .'"></div>
                      <div class="card-block">
                        <h4 class="card-title">' .$item["title"] .'</h4>
                        <p class="card-text">' .$item["description"] .'</p>

                      </div>
                    </a>
                  </div>
                </div>
              </div>';
}


$filtered_json_2 = array_filter($json["rulesindex"], function($v) {

  // filter by colio ID
  return $v['display'] == 'Yes' && $v['type'] == 'community';

});

foreach ($filtered_json_2 as $index2 => $item2) {

        $community .= '<div class="col-md-4">
                <div class="card card-cascade cardHome">
                  <div class="top-unit">
                    <a href="' .$item2["link"] .'" title="' .$item2["title"] . '">
                      <p class="card-text card-meta"><small class="text-muted ">' .$item2["updated"] .'</small></p>
                      <div class="text-xs-center"><img class="imgIndex img-fluid" src="' .$item2["image"] .'" alt="' .$item2["title"] .'"></div>
                      <div class="card-block">
                        <h4 class="card-title">' .$item2["title"] .'</h4>
                        <p class="card-text">' .$item2["description"] .'</p>

                      </div>
                    </a>
                  </div>
                </div>
              </div>';
}


?>
