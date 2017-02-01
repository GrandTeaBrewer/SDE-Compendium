
<?PHP
// respect for those that made contributions

$json = json_decode(file_get_contents("./data/index_cards.json"), true);

$filtered_json = array_filter($json["cardindex"], function($v) {

  // filter by colio ID
  return $v['display'] == 'Yes';
  });


foreach ($filtered_json as $index => $item) {

        echo '<div class="col-md-4">
                <div class="card card-cascade cardHome">
                  <div class="top-unit">
                    <a href="' .$item["link"] .'" title="' .$item["title"] . '" onClick="ga(\'send\', \'event\', \'' .$item["title"] . ' page\', \'Page Link\', \'From Homepage\')">
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
?>
