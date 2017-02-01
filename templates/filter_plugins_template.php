

<?PHP

$explainText = 'Set the filters then click on the character icon to view the character card';


$cardType = '
<div class="col-md-3 ui-group filters">
    <div class="option-set" data-group="themeFilter">
        <select id="themeFilter" multiple class="mdb-select chosen-select">
            <option value="hero">Hero</option>
    				<option value="monster">Monster</option>
        </select>
        <label for="themeFilter">Card Type</label>
    </div>
</div>';

$cardTheme = '
<div class="col-md-3 ui-group filters">
    <div class="option-set" data-group="themeFilter">
        <select id="themeFilter" multiple class="mdb-select chosen-select">
            <option value="fae_wood.jpg">Fae Wood</option>
            <option value="netherstorm.png">Netherstorm</option>
            <option value="roxors-cavern.png">Caverns of Roxor</option>
            <option value="nas.png">Ninja All-Stars</option>
            <option value="arctic.jpg">Arctic</option>
            <option value="castle_room.jpg">Castle Room</option>
            <option value="city_street.jpg">City Street</option>
            <option value="desert.jpg">Desert</option>
            <option value="dragons_hoard.jpg">Dragon Hoard</option>
            <option value="dungeon.jpg">Dungeon</option>
            <option value="fantasy_tower.jpg">Fantasy Tower</option>
            <option value="forrest_stream.jpg">Forrest Stream</option>
            <option value="icy_throne.jpg">Icy Throne</option>
            <option value="kings_throne.jpg">King\'sThrone Room</option>
            <option value="kitchen.jpg">Kitchen</option>
            <option value="lonely_tower.jpg">Lonely Tower</option>
            <option value="market.jpg">Market</option>
            <option value="meadow.jpg">Meadow</option>
            <option value="minotaurs_throne_room.jpg">Minotaur\'s Throne Room</option>
            <option value="f8ebe365c206a57065d4970fb91b5d78.jpg">Pirate Cove</option>
            <option value="prison_tower.jpg">Prison Tower</option>
            <option value="queens_throne_room.jpg">Queen\'s Throne Room</option>
            <option value="ruins.jpg">Ruins</option>
            <option value="swamp.jpg">Swamp</option>
            <option value="temple.jpg">Temple</option>
            <option value="tundra.jpg">Tundra</option>
            <option value="valley.jpg">Valley</option>
        </select>
        <label for="themeFilter">Card Type</label>
    </div>
</div>';


$themeFilter = '
<div class="col-md-3 ui-group filters">
    <div class="option-set" data-group="themeFilter">
        <select id="themeFilter" multiple class="mdb-select chosen-select">
            <option value="" disabled >Select some options</option>
            <option value=".themeArcadian Dunes">Arcadian Dunes</option>
            <option value=".themeCelestial">Celestial</option>
            <option value=".themeClockworkCove">Clockwork Cove</option>
            <option value=".themeCrystaliaCastle">Crystalia Castle</option>
            <option value=".themeDragonbackPeaks">Dragonback Peaks</option>
            <option value=".themeFaeWood">Fae Wood</option>
            <option value=".themeFrostbyteReach">Frostbyte Reach</option>
            <option value=".themeGlauerdoomMoor">Glauerdoom Moor</option>
            <option value=".themeMidnightTower">Midnight Tower</option>
            <option value=".themeWanderingMondMountains">Wandering Monk Mountains</option>
            <option value=".themeSpecial">Special Themes</option>
        </select>
        <label for="themeFilter">Character Theme</label>
    </div>
</div>';

$releaseFilter = '
<div class="col-md-3 ui-group filters">
    <div class="option-set" data-group="releaseFilter">
        <select id="releaseFilter" multiple class="mdb-select chosen-select">
          <option value="" disabled >Select some options</option>
          <option value=".TBR">Show Unreleased</option>
          <option value=".RTR">Show Released</option>
        </select>
        <label for="releaseFilter">Retail Status</label>
    </div>
</div>';

$retailFilter = '
<div class="col-md-3 ui-group filters">
    <div class="option-set" data-filter-group="retailFilter">
        <select id="retailFilter"  multiple class="mdb-select chosen-select">
          <option value="" disabled >Select some options</option>
          <option value="" disabled >Core Sets</option>
            <option value=".SDE1" >Dragonback Peaks Core Box</option>
            <option value=".FKC" >Forgotten King Core Box</option>
            <option value=".SDE2" >SDE 2.0 Starter Box</option>

          <option value="" disabled >Expansions</option>
            <option value=".CRE1" >Caverns of Roxor</option>
            <option value=".VDM" >Von Drakks Manor</option>
            <option value=".EVW" >Emerald Valley</option>
            <option value=".MCW" >Mistmourn Coast</option>
            <option value=".CWW" >Claws of the Wyrm</option>

        <option value="" disabled >Warbands</option>
            <option value=".CGW" >Crown Guard Warband</option>
            <option value=".FRW" >Frostbyte Ravager Warband</option>
            <option value=".MTW" >Midnight Tower Warband</option>
            <option value=".NAS" >Super Ninja Ambush! Deluxe Warband</option>

        <option value="" disabled >Dungeon Boss Packs</option>
            <option value=".BL1" >Beatrix the Witch Queen</option>
            <option value=".BL2" >Goro</option>
            <option value=".BL1" >Bosses of Legend</option>
            <option value=".BL2" >Bosses of Legend 2</option>

        <option value="" disabled >Spawnpoint Pack</option>
            <option value=".LGK" >Rock Top Gang Spawn Point</option>
            <option value=".LGK" >Fireflow Denizens Spawn Point</option>

        <option value="" disabled >Tile Packs Groups</option>
            <option value=".LGK" >Forgotten King Kickstarter</option>
            <option value=".LGK" >Legends Kickstarter</option>
            <option value=".NAS" >Ninja All Stars</option>
            <option value=".SIN" >Individual Miniature Releases</option>

        <option value="" disabled >Kickstarter</option>
            <option value=".LGK" >Forgotten King Kickstarter</option>
            <option value=".LGK" >Legends Kickstarter</option>
            <option value=".NAS" >Ninja All Stars</option>

        <option value="" disabled >Kickstarter</option>
            <option value=".SIN" >Individual Miniature Releases</option>


        </select>
        <label for="retailFilter">Retail Package</label>
    </div>
</div>';


$searchFilter = '
<div class="col-md-3 ui-group filters md-form">
    <i class="fa fa-search prefix"></i>
    <input id="searchFilter" class="form-control validate searchFilter" type="text">
    <label for="searchFilter" class="searchFilterLabel">Search by character name</label>
</div>';


$affinityFilter = '
<div class="col-md-3 ui-group filters">
    <div class="option-set" data-group="affinityFilter">
        <select id="affinityFilter" multiple class="mdb-select chosen-select">
          <option value="" disabled >Select some options</option>
          <option value=".Citrine">Citrine</option>
          <option value=".Emerald">Emerald</option>
          <option value=".Sapphire">Sapphire</option>
          <option value=".Ruby">Ruby</option>
        </select>
        <label for="affinityFilter">Affinity Type</label>
    </div>
</div>';

$statFilter = '
<div class="col-md-3 ui-group filters">
    <div class="option-set" data-group="statFilter">
        <select id="statFilter" multiple class="mdb-select chosen-select">
          <option value="" disabled >Select some options</option>
          <option value=".DEX">Dexterity</option>
          <option value=".STR">Strength</option>
          <option value=".WILL">Willpower</option>
        </select>
        <label for="statFilter">Primary Stat</label>
    </div>
</div>';

$classFilter = '
<div class="col-md-3 ui-group filters">
    <div class="option-set" data-group="classFilter">
        <select id="classFilter"  multiple class="mdb-select chosen-select">
          <option value="" disabled >Select some options</option>
          <option value=".AOE">AOE</option>
          <option value=".Blaster">Blaster</option>
          <option value=".Buffer">Buffer</option>
          <option value=".Controller">Controller</option>
          <option value=".Debuffer">Debuffer</option>
          <option value=".Healer">Healer</option>
          <option value=".Tank">Tank</option>
          <option value=".Thief">Thief</option>
        </select>
        <label for="classFilter">Character Role</label>
    </div>
</div>';

$ratingFilter = '
<div class="col-md-3 ui-group filters">
    <div class="option-set" data-group="ratingFilter">
        <select id="ratingFilter" multiple class="mdb-select chosen-select">
          <option value="" disabled >Select some options</option>
          <option value=".tierSuperStrong">Super Strong</option>
          <option value=".tierStrong">Strong</option>
          <option value=".tierA">Tier A</option>
          <option value=".tierB">Tier B</option>
          <option value=".tierC">Tier C</option>
          <option value=".tierUnranked">Not yet rated</option>
        </select>
        <label for="ratingFilter" >Character Rating</label>
    </div>
</div>';


?>
