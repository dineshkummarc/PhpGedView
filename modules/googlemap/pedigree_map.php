<?php
/**
 * Print pedigree map using Googlemaps.
 * It requires that your place coordinates are stored on the Google Map
 * 'place_locations' table. It will NOT find coordinates stored only as tags in
 * your GEDCOM file. As in the Google Maps module, it can only display place
 * markers where the location exists with identical spelling in both your
 * GEDCOM '2 PLAC' tag (within the '1 BIRT' event) and the place_locations table.
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2010  PGV Development Team. All rights reserved.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License or,
 * at your discretion, any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @author Nigel Osborne
 * @Developed for the 'Our-Families' web site (http://www.our-families.info)
 * @modified and added to PGV by Łukasz Wileński
 * @package PhpGedView
 * $Id: pedigree_map.php 7153 2017-02-22 17:01:30Z canajun2eh $
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

require PGV_ROOT.'modules/googlemap/googlemap.php';
require PGV_ROOT.'includes/controllers/pedigree_ctrl.php';

loadLangFile("googlemap:lang, googlemap:help_text");

// Default is show for both of these.
$hideflags = safe_GET('hideflags');
$hidelines = safe_GET('hidelines');

$controller = new PedigreeController();
$controller->init();

// Default of 5
$clustersize = 5;
if (!empty($_REQUEST['clustersize'])) {
	if ($_REQUEST['clustersize'] == '3')
		$clustersize = 3;
	else if ($_REQUEST['clustersize'] == '1')
		$clustersize = 1;
}

// Start of internal configuration variables
//
// The Cloudy theme resizes itself to max screen width, sometimes making
// tables hard to construct for browser windows smaller that the screen
// width.  Setting $cloudy_locked = 1/0 will/won't force a the map to use
// the width chosen in the GoogleMap configuration.  All other themes
// float the width of the map to fill the browser width nicely.
$cloudy_locked = 1;

// Limit this to match available number of icons.
// 8 generations equals 255 individuals
$MAX_PEDIGREE_GENERATIONS = min($MAX_PEDIGREE_GENERATIONS, 8);

// End of internal configuration variables

global $theme_name, $TEXT_DIRECTION;

// -- print html header information
print_header($controller->getPageTitle());

if (!$GOOGLEMAP_ENABLED) {
	echo "<table class=\"facts_table\">\n";
	echo "<tr><td class=\"facts_value\">", $pgv_lang["gm_disabled"], "</td></tr>\n";
	if (PGV_USER_IS_ADMIN) {
		echo "<tr><td align=\"center\">\n";
		echo "<a href=\"module.php?mod=googlemap&pgvaction=editconfig\">", $pgv_lang["gm_manage"], "</a>";
		echo "</td></tr>\n";
	}
	echo "</table><br />";
	print_footer();
	return;
}

	?>
	<style type="text/css">
	#map_type
	{
		margin: 0;
		padding: 0;
		font-family: Arial;
		font-size: 10px;
		list-style: none;
	}
	#map_type li
	{
		display: block;
		width: 70px;
		text-align: center;
		padding: 2px;
		border: 1px solid black;
		cursor: pointer;
		float: left;
		margin-left: 2px;
	}
	#map_type li.non_active
	{
		background: white;
		color: black;
		font-weight: normal;
	}
	#map_type li.active
	{
		background: gray;
		color: white;
		font-weight: bold;
	}
	#map_type li:hover
	{
		background: #ddd;
	}
	</style>
	<?php
if ($ENABLE_AUTOCOMPLETE) require PGV_ROOT.'js/autocomplete.js.htm';
echo '<div><table><tr><td valign="middle">';
echo "<h2>" . $pgv_lang["pedigree_map"] . " " . $pgv_lang["pm_for"] . " ";
echo PrintReady($controller->getPersonName())."</h2>";

// -- print the form to change the number of displayed generations
if (!$controller->isPrintPreview()) {
?>
<script language="JavaScript" type="text/javascript">
	<!--
	var pastefield;
	function paste_id(value) {
		pastefield.value=value;
	}
	//-->
</script>
</td><td width="50px">&nbsp;</td><td>
	  <form name="people" method="get" action="module.php?ged=<?php echo $GEDCOM; ?>&amp;mod=googlemap&amp;pgvaction=pedigree_map">
		<input type="hidden" name="mod" value="googlemap" />
		<input type="hidden" name="pgvaction" value="pedigree_map" />
		<table class="pedigree_table <?php echo $TEXT_DIRECTION; ?>" width="555">
			<tr>
				<td colspan="5" class="topbottombar" style="text-align:center; "><?php print_help_link("PEDIGREE_MAP_help", "qm", "PEDIGREE_MAP_help1"); ?>
					<?php echo $pgv_lang["options"]; ?>
				</td>
			</tr>
			<tr>
				<td class="descriptionbox wrap"><?php print_help_link("rootid_help", "qm", "PEDIGREE_MAP_help1"); ?>
					<?php echo $pgv_lang["root_person"]; ?>
				</td>
				<td class="descriptionbox wrap">
				<?php print_help_link("PEDIGREE_GENERATIONS_help", "qm", "PEDIGREE_MAP_help1"); ?>
				<?php echo $pgv_lang["generations"]; ?>
				</td>
				<td class="descriptionbox wrap">
					<?php print_help_link("PEDIGREE_MAP_clustersize_help", "qm", "PEDIGREE_MAP_help1"); ?>
					<?php echo $pgv_lang["PEDIGREE_MAP_clustersize"]; ?>
				</td>
				<td class="descriptionbox wrap">
					<?php
					print_help_link("PEDIGREE_MAP_hideflags_help", "qm", "PEDIGREE_MAP_help1");
					echo $pgv_lang["PEDIGREE_MAP_hideflags"];
					?>
				</td>
				<td class="descriptionbox wrap">
					<?php
					print_help_link("PEDIGREE_MAP_hidelines_help", "qm", "PEDIGREE_MAP_help1");
					echo $pgv_lang["PEDIGREE_MAP_hidelines"];
					?>
				</td>
			</tr>
			<tr>
				<td class="optionbox">
					<input class="pedigree_form" type="text" id="rootid" name="rootid" size="3" value="<?php echo $controller->rootid; ?>" />
					<?php print_findindi_link("rootid","");?>
				</td>
				<td class="optionbox">
					<select name="PEDIGREE_GENERATIONS">
					<?php
						for ($p=3; $p<=$MAX_PEDIGREE_GENERATIONS; $p++) {
							echo "<option value=\"".$p."\" " ;
							if ($p == $controller->PEDIGREE_GENERATIONS) echo "selected=\"selected\" ";
							echo ">".$p."</option>";
						}
					?>
					</select>
				</td>
				<td class="optionbox">
					<select name="clustersize">
					<?php
						for ($p=1; $p<6; $p = $p+2) {
							echo "<option value=\"".$p."\" " ;
							if ($p == $clustersize) echo "selected=\"selected\" ";
							echo ">".$p."</option>";
						}
					?>
					</select>
				</td>
				<td class="optionbox">
					<?php
					echo "<input name=\"hideflags\" type=\"checkbox\"";
					if ($hideflags) {echo " checked=\"checked\"";}
						echo " />";
					?>
				</td>
				<td class="optionbox">
					<?php
					echo "<input name=\"hidelines\" type=\"checkbox\"";
					if ($hidelines) {echo " checked=\"checked\"";}
					echo " />";
					?>
				</td>
			</tr>
			<tr>
				<td class="topbottombar" colspan="5">
					<input type="submit" value="<?php echo $pgv_lang["view"]; ?>" />
				</td>
			</tr>
		</table>
 	  </form>
	</td></tr>
</table>
	
<?php } ?>
<!-- end of form -->

<!-- count records by type -->
<?php
$curgen=1;
$priv=0;
$count=0;
$miscount=0;
$missing = "";

for ($i=0; $i<($controller->treesize); $i++) {
	// -- check to see if we have moved to the next generation
	if ($i+1 >= pow(2, $curgen)) {$curgen++;}
	$person = Person::getInstance($controller->treeid[$i]);
	if (!empty($person)) {
		$pid = $controller->treeid[$i];
		$name = $person->getFullName();
		if ($name == $pgv_lang["private"]) $priv++;
		$place = $person->getBirthPlace();
		if (empty($place)) {
			$latlongval[$i] = NULL;
		} else {
			$latlongval[$i] = get_lati_long_placelocation($person->getBirthPlace());
			if ($latlongval[$i] != NULL && $latlongval[$i]["lati"]=='0' && $latlongval[$i]["long"]=='0') {
				$latlongval[$i] = NULL;
			}
		}
		if ($latlongval[$i] != NULL) {
			$lat[$i] = str_replace(array('N', 'S', ','), array('', '-', '.'), $latlongval[$i]["lati"]);
			$lon[$i] = str_replace(array('E', 'W', ','), array('', '-', '.'), $latlongval[$i]["long"]);
			if (($lat[$i] != NULL) && ($lon[$i] != NULL)) {
				$count++;
			}
			else { // The place is in the table but has empty values
				if (!empty($name)) {
					if (!empty($missing)) $missing .= ",\n ";
					$addlist = "<a href=\"individual.php?pid=" . $pid . "\">". $name . "</a>";
					$missing .= $addlist;
					$miscount++;
				}
			}
		}
		else { // There was no place, or not listed in the map table
			if (!empty($name)) {
				if (!empty($missing)) $missing .= ",\n ";
				$addlist = "<a href=\"individual.php?pid=" . $pid . "\">". $name . "</a>";
				$missing .= $addlist;
				$miscount++;
			}
		}
	}
}
//<!-- end of count records by type -->

//<!-- start of map display -->
echo '<table class="pedigree_map" ';
if (($cloudy_locked == 0) || ($theme_name != "Cloudy")) {
	echo "width=\"100%\"";
}
echo " style=\"tabs_table\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
echo "<tr>\n";
echo "<td valign=\"top\">\n";
echo "<img src=\"images/spacer.gif\" width=\"".$GOOGLEMAP_XSIZE."\" height=\"0\" alt=\"\" border=\"0\"/>\n";
echo "<div id=\"pm_map\" style=\"border: 1px solid gray; height: ".$GOOGLEMAP_YSIZE."px; font-size: 0.9em;";
if (($cloudy_locked) && ($theme_name == "Cloudy")) {
	echo " width: ".$GOOGLEMAP_XSIZE."px;";
}
echo " background-image: url('images/loading.gif'); background-position: center; background-repeat: no-repeat; overflow: hidden;\"></div>\n";
if (PGV_USER_IS_ADMIN) {
	echo "<table width=\"100%\">";
	echo "<tr><td align=\"left\">\n";
	echo "<a href=\"module.php?mod=googlemap&pgvaction=editconfig\">", $pgv_lang["gm_manage"], "</a>";
	echo "</td>\n";
	echo "<td align=\"center\">\n";
	echo "<a href=\"module.php?mod=googlemap&pgvaction=places\">", $pgv_lang["edit_place_locations"], "</a>";
	echo "</td>\n";
	echo "<td align=\"right\">\n";
	echo "<a href=\"module.php?mod=googlemap&pgvaction=placecheck\">", $pgv_lang["placecheck"], "</a>";
	echo "</td></tr>\n";
	echo "</table>\n";
}
echo "</td><td width=\"15px\">&nbsp;</td>\n";
echo "<td width=\"310px\" valign=\"top\">\n";
echo "<div id=\"side_bar\" style=\"width: 300px; font-size: 0.9em; overflow: auto; overflow-x: hidden; overflow-y: auto; height: ".$GOOGLEMAP_YSIZE."px; \"></div></td>\n";
echo "</tr>\n";
echo "</table>\n";
// display info under map
echo "<hr />";
echo "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">";
echo "  <tr>";
echo "	<td valign=\"top\">";
// print summary statistics
	if (isset($curgen)){
		$total=pow(2,$curgen)-1;
		$miss=$total-$count-$priv;
		echo "<strong>".$count."</strong>\n";
		if ($count == 1) {
			echo " ".$pgv_lang["pm_individual_displayed"]." \n";
		} else if ($count > 1 && $count < 5) {
			echo " ".$pgv_lang["pm_2individuals_displayed"]." \n";
		} else if ($count > 21 && substr($count, -1, 1) > 1 && substr($count, -1, 1) < 5 && substr($count, -2, 1) != 1) {
			echo " ".$pgv_lang["pm_2individuals_displayed"]." \n";
		} else {
			echo " ".$pgv_lang["pm_individuals_displayed"]." \n";
		}
		echo "<strong>".$total."</strong>\n";
		echo " ".$pgv_lang["pm_from"]." \n";
		echo "<strong>".$curgen."</strong>\n";
		echo " ".$pgv_lang["pm_gens"]."<br />\n";
		echo "</td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "	<td valign=\"top\">\n";
		if ($priv!=0) {
			echo "<strong>".$priv."</strong> \n";
			if ($priv == 1) {
				echo " ".$pgv_lang["pm_individual_private"]." \n";
			} else {
				echo " ".$pgv_lang["pm_individuals_private"]." \n";
			}
		}
		if ($count+$priv != $total) {
			if ($miscount == 1) {
				echo "<strong>".$miscount."</strong> ";
				echo " ".$pgv_lang["pm_missing_birth"]."<br />\n";
			} else if ($miscount > 1 && $miscount < 5) {
				echo "<strong>".$miscount."</strong> ";
				echo " ".$pgv_lang["pm_2missing_births"]."<br />\n";
			} else if ($miscount > 21 && substr($miscount, -1, 1) > 1 && substr($miscount, -1, 1) < 5 && substr($miscount, -2, 1) != 1) {
				echo "<strong>".$miscount."</strong> ";
				echo " ".$pgv_lang["pm_2missing_births"]."<br />\n";
			} else if ($miscount == 0) {
				echo " ".$pgv_lang["pm_missings"]."<br />\n";
			} else {
				echo "<strong>".$miscount."</strong> ";
				echo " ".$pgv_lang["pm_missing_births"]."<br />\n";
			}
			echo $missing . "<br />\n";
		}
	}
echo "	</td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "</div>";
?>
<!-- end of map display -->

<!-- Start of map scripts -->
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $GOOGLEMAP_API_KEY; ?>" type="text/javascript"></script>
<script src="modules/googlemap/infobubble.js" type="text/javascript"></script>
<script type="text/javascript">

//<![CDATA[

// this variable will collect the html which will eventually be placed in the side_bar
var side_bar_html = "";

// arrays to hold copies of the markers and html used by the side_bar
// because the function closure trick doesnt work there
var gmarkers = [];
var infoBubbles = [];
var i = 0;
var lastlinkid;

// === Create an associative array of GIcons() ===
var gicons = [];
// First the templates
gicons["LEFT"] = { url: "modules/googlemap/images/icon2L.png", anchor: new google.maps.Point(28, 28) };
/* gicons["LEFT"] = new GIcon(G_DEFAULT_ICON, "modules/googlemap/images/icon2L.png")
gicons["LEFT"].iconSize = new GSize(32,32);
gicons["LEFT"].iconAnchor = new GPoint(28,28);
gicons["LEFT"].infoWindowAnchor = new GPoint(11,4);
gicons["LEFT"].shadow = "modules/googlemap/images/shadow-left-large.png";
gicons["LEFT"].shadowSize = new GSize(49, 32);
gicons["LEFT"].transparent = "modules/googlemap/images/transparent-left-large.png";
gicons["LEFT"].imageMap = [28,28,7,20,2,13,2,5,8,0,17,2,21,8,22,16,28,28]; */

gicons["RIGHT"] = { url: "modules/googlemap/images/icon2R.png", anchor: new google.maps.Point(2, 28) };
/* gicons["RIGHT"] = new GIcon(G_DEFAULT_ICON, "modules/googlemap/images/icon2R.png")
gicons["RIGHT"].iconSize = new GSize(32,32);
gicons["RIGHT"].iconAnchor = new GPoint(2,28);
gicons["RIGHT"].infoWindowAnchor = new GPoint(21,4);
gicons["RIGHT"].shadow = "modules/googlemap/images/shadow-right-large.png";
gicons["RIGHT"].shadowSize = new GSize(49, 32);
gicons["RIGHT"].transparent = "modules/googlemap/images/transparent-right-large.png";
gicons["RIGHT"].imageMap = [2,28,10,15,10,6,19,0,25,2,30,8,29,15,23,20,14,21,2,28]; */

gicons["LEFTsmall"] = { url: "modules/googlemap/images/icon2Ls.png", anchor: new google.maps.Point(22, 22) };
/* gicons["LEFTsmall"] = new GIcon(G_DEFAULT_ICON, "modules/googlemap/images/icon2Ls.png")
gicons["LEFTsmall"].iconSize = new GSize(24, 24);
gicons["LEFTsmall"].iconAnchor = new GPoint(22,22);
gicons["LEFTsmall"].infoWindowAnchor = new GPoint(12, 0);
gicons["LEFTsmall"].shadow = "modules/googlemap/images/shadow-left-small.png";
gicons["LEFTsmall"].shadowSize = new GSize(37, 24);
gicons["LEFTsmall"].transparent = "modules/googlemap/images/transparent-left-small.png";
gicons["LEFTsmall"].imageMap = [21,21,11,15,3,13,0,9,0,5,5,1,11,1,15,6,16,12,21,21]; */

gicons["RIGHTsmall"] = { url: "modules/googlemap/images/icon2Rs.png", anchor: new google.maps.Point(2, 22) };
/* gicons["RIGHTsmall"] = new GIcon(G_DEFAULT_ICON, "modules/googlemap/images/icon2Rs.png")
gicons["RIGHTsmall"].iconSize = new GSize(24, 24);
gicons["RIGHTsmall"].iconAnchor = new GPoint(2,22);
gicons["RIGHTsmall"].infoWindowAnchor = new GPoint(12, 0);
gicons["RIGHTsmall"].shadow = "modules/googlemap/images/shadow-right-small.png";
gicons["RIGHTsmall"].shadowSize = new GSize(37, 24);
gicons["RIGHTsmall"].transparent = "modules/googlemap/images/transparent-right-small.png";
gicons["RIGHTsmall"].imageMap = [3,20,9,11,9,4,14,1,19,1,23,4,23,12,17,15,9,16,3,20]; */

// Now the icons for each generation
gicons["1"]  = "modules/googlemap/images/icon1.png";

gicons["2"]  = "modules/googlemap/images/icon2.png";
// gicons["2L"] = gicons["LEFT"];
gicons["2L"] = { url: "modules/googlemap/images/icon2L.png", anchor: new google.maps.Point(28, 28) };
// gicons["2R"] = gicons["RIGHT"];
gicons["2R"] = { url: "modules/googlemap/images/icon2R.png", anchor: new google.maps.Point(2, 28) };
// Actually overkill.  We are not going to get to the 4th and fifth icon in this generation.
// gicons["2Ls"] = gicons["LEFTsmall"];
gicons["2Ls"] = { url: "modules/googlemap/images/icon2Ls.png", anchor: new google.maps.Point(22, 22) };
// gicons["2Rs"] = gicons["RIGHTsmall"];
gicons["2Rs"] = { url: "modules/googlemap/images/icon2Rs.png", anchor: new google.maps.Point(2, 22) };

gicons["3"] = "modules/googlemap/images/icon3.png";
// gicons["3L"] = gicons["LEFT"];
gicons["3L"] = { url: "modules/googlemap/images/icon3L.png", anchor: new google.maps.Point(28, 28) };
// gicons["3R"] = gicons["RIGHT"];
gicons["3R"] = { url: "modules/googlemap/images/icon3R.png", anchor: new google.maps.Point(2, 28) };
// gicons["3Ls"] = gicons["LEFTsmall"];
gicons["3Ls"] = { url: "modules/googlemap/images/icon3Ls.png", anchor: new google.maps.Point(22, 22) };
// gicons["3Rs"] = gicons["RIGHTsmall"];
gicons["3Rs"] = { url: "modules/googlemap/images/icon3Rs.png", anchor: new google.maps.Point(2, 22) };

gicons["4"]  = "modules/googlemap/images/icon4.png";
// gicons["4L"] = gicons["LEFT"];
gicons["4L"] = { url: "modules/googlemap/images/icon4L.png", anchor: new google.maps.Point(28, 28) };
// gicons["4R"] = gicons["RIGHT"];
gicons["4R"] = { url: "modules/googlemap/images/icon4R.png", anchor: new google.maps.Point(2, 28) };
// gicons["4Ls"] = gicons["LEFTsmall"];
gicons["4Ls"] = { url: "modules/googlemap/images/icon4Ls.png", anchor: new google.maps.Point(22, 22) };
// gicons["4Rs"] = gicons["RIGHTsmall"];
gicons["4Rs"] = { url: "modules/googlemap/images/icon4Rs.png", anchor: new google.maps.Point(2, 22) };

gicons["5"]  = "modules/googlemap/images/icon5.png";
// gicons["5L"] = gicons["LEFT"];
gicons["5L"] = { url: "modules/googlemap/images/icon5L.png", anchor: new google.maps.Point(28, 28) };
// gicons["5R"] = gicons["RIGHT"];
gicons["5R"] = { url: "modules/googlemap/images/icon5R.png", anchor: new google.maps.Point(2, 28) };
// gicons["5Ls"] = gicons["LEFTsmall"];
gicons["5Ls"] = { url: "modules/googlemap/images/icon5Ls.png", anchor: new google.maps.Point(22, 22) };
// gicons["5Rs"] = gicons["RIGHTsmall"];
gicons["5Rs"] = { url: "modules/googlemap/images/icon5Rs.png", anchor: new google.maps.Point(2, 22) };

gicons["6"]  = "modules/googlemap/images/icon6.png";
// gicons["6L"] = gicons["LEFT"];
gicons["6L"] = { url: "modules/googlemap/images/icon6L.png", anchor: new google.maps.Point(28, 28) };
// gicons["6R"] = gicons["RIGHT"];
gicons["6R"] = { url: "modules/googlemap/images/icon6R.png", anchor: new google.maps.Point(2, 28) };
// gicons["6Ls"] = gicons["LEFTsmall"];
gicons["6Ls"] = { url: "modules/googlemap/images/icon6Ls.png", anchor: new google.maps.Point(22, 22) };
// gicons["6Rs"] = gicons["RIGHTsmall"];
gicons["6Rs"] = { url: "modules/googlemap/images/icon6Rs.png", anchor: new google.maps.Point(2, 22) };

gicons["7"] = "modules/googlemap/images/icon7.png";
// gicons["7L"] = gicons["LEFT"];
gicons["7L"] = { url: "modules/googlemap/images/icon7L.png", anchor: new google.maps.Point(28, 28) };
// gicons["7R"] = gicons["RIGHT"];
gicons["7R"] = { url: "modules/googlemap/images/icon7R.png", anchor: new google.maps.Point(2, 28) };
// gicons["7Ls"] = gicons["LEFTsmall"];
gicons["7Ls"] = { url: "modules/googlemap/images/icon7Ls.png", anchor: new google.maps.Point(22, 22) };
// gicons["7Rs"] = gicons["RIGHTsmall"];
gicons["7Rs"] = { url: "modules/googlemap/images/icon7Rs.png", anchor: new google.maps.Point(2, 22) };

gicons["8"] = "modules/googlemap/images/icon8.png";
// gicons["8L"] = gicons["LEFT"];
gicons["8L"] = { url: "modules/googlemap/images/icon8L.png", anchor: new google.maps.Point(28, 28) };
// gicons["8R"] = gicons["RIGHT"];
gicons["8R"] = { url: "modules/googlemap/images/icon8R.png", anchor: new google.maps.Point(2, 28) };
// gicons["8Ls"] = gicons["LEFTsmall"];
gicons["8Ls"] = { url: "modules/googlemap/images/icon8Ls.png", anchor: new google.maps.Point(22, 22) };
// gicons["8Rs"] = gicons["RIGHTsmall"];
gicons["8Rs"] = { url: "modules/googlemap/images/icon8Rs.png", anchor: new google.maps.Point(2, 22) };

// / A function to create the marker and set up the event window
function createMarker(point, name, html, mhtml, icontype) {
	// === create a marker with the requested icon ===
	var marker = new google.maps.Marker({ position: point, icon: gicons[icontype], title: name});
	var linkid = "link"+i;

	var infoBubble = new InfoBubble({ disableAutoPan: true });
	infoBubble.addTab(name, mhtml);
	infoBubbles.push(infoBubble);

	google.maps.event.addListener(marker, 'click', function() {
		if (infoBubble.isOpen()) {
			infoBubble.close(pm_map, marker);
			// document.getElementById(linkid).className = '';
		} else {

			infoBubbles.forEach(function(ib,i){
				ib.close();
			});
			infoBubble.open(pm_map, marker);
			var scale = Math.pow(2, pm_map.getZoom());
			var lat = marker.getPosition().lat();
			var lng = marker.getPosition().lng();

			pm_map.panToBounds({ east: lng + 300 / scale, north: lat + 100 / scale, south: lat - 20 / scale, west: lng - 300 / scale} );
			// document.getElementById(linkid).className = 'person_box';
			lastlinkid=linkid;
		}
	});

	// save the info we need to use later for the side_bar
	gmarkers[i] = marker;

	// add a line to the side_bar html
	side_bar_html += '<div id="'+linkid+'" class="person_box"><a href="javascript:myclick(' + i + ')">' + html + "</div><br style='clear: left;'/>\n";
	i++;
	return marker;
};

// This function picks up the click and opens the corresponding info window
function myclick(i) {
	google.maps.event.trigger(gmarkers[i], "click");
}
var pm_map = new google.maps.Map(document.getElementById("pm_map"));

// create the map
var bounds = new google.maps.LatLngBounds();

<?php
// add the points
$curgen=1;
$priv=0;
$count=0;
$event = "<img src='modules/googlemap/images/sq1.png' width='10' height='10'>" .
	 "<strong>&nbsp;".$pgv_lang["pm_root"].":&nbsp;</strong>";
$colored_line = array("1"=>"#FF0000","2"=>"#0000FF","3"=>"#00FF00",
				"4"=>"#FFFF00","5"=>"#00FFFF","6"=>"#FF00FF",
				"7"=>"#C0C0FF","8"=>"#808000");

for ($i=0; $i<($controller->treesize); $i++) {
	// moved up to grab the sex of the individuals
	$person = Person::getInstance($controller->treeid[$i]);
	if (!empty($person)) {
		$pid = $controller->treeid[$i];
		$indirec = $person->getGedcomRecord();
		$sex = $person->getSex();
		$bplace = trim($person->getBirthPlace());
		$bdate = $person->getBirthDate();
		$name = $person->getFullName();
		// Allow special processing for different languages
		$func="rela_localisation_{$lang_short_cut[$LANGUAGE]}";

		// -- check to see if we have moved to the next generation
		if ($i+1 >= pow(2, $curgen)) {
			$curgen++;
			} // Checking each time now to set sex
		if ($curgen == 2) {
			if ($sex == "F") {
				$relationship = $pgv_lang["mother"];
			} else if ($sex == "M") {
				$relationship = $pgv_lang["father"];
			} else {
					$relationship = $pgv_lang["parent"];
			}
			$event = "<img src='modules/googlemap/images/sq2.png' width='10' height='10'>" .
				 "<strong>&nbsp;".$relationship.":&nbsp;</strong>";
		}
		if ($curgen == 3) {
			if ($sex == "F") {
				$relationship = $pgv_lang["pm_grandmother"];
			} else if ($sex == "M") {
				$relationship = $pgv_lang["pm_grandfather"];
			} else {
				$relationship = $pgv_lang["pm_grandparent"];
			}
			// experiment
			$sosa = "sosa_" . ($i+1);
			if (!empty($pgv_lang[$sosa])) {
				if (function_exists($func)) {
					// Localise the relationship
					$relationship = $func($pgv_lang[$sosa], $pid);
				} else {
					$relationship = $pgv_lang[$sosa];
				}
			}
			$event = "<img src='modules/googlemap/images/sq3.png' width='10' height='10'>".
				 "<strong>&nbsp;".$relationship.":&nbsp;</strong>";
		}
		if ($curgen > 3) {
			$sosa = "sosa_" . ($i+1);
			if (!empty($pgv_lang[$sosa])) { // use display language when available
				if (function_exists($func)) {
					// Localise the relationship
					$relationship = $func($pgv_lang[$sosa], $pid);
				} else {
					$relationship = $pgv_lang[$sosa];
				}
				$event = "<img src='modules/googlemap/images/sq".$curgen.".png' width='10'" .
					 " height='10'><strong>&nbsp;".$relationship.":&nbsp;</strong>";
			} else {
				$relationship = get_sosa_name($i+1);
				if (!empty($relationship)) {
					$event = "<img src='modules/googlemap/images/sq".$curgen.".png' width='10'" .
					 " height='10'><strong>&nbsp;".$relationship.":&nbsp;</strong>";
				} else {
					if ($sex == "F") {
						$relationship = $pgv_lang["pm_grandmother"];
					} else if ($sex == "M") {
						$relationship = $pgv_lang["pm_grandfather"];
					} else {
						$relationship = $pgv_lang["pm_grandparent"]; 
					}
					$event = "<img src='modules/googlemap/images/sq".$curgen.".png' width='10'" .
						 " height='10'><strong>&nbsp;".$pgv_lang["pm_gt"]."&nbsp;</strong>";
					for ($x=1; $x<($curgen-3); $x++) {
						$event .= "<strong>".$pgv_lang["pm_gt"]."&nbsp;</strong>";
					}
					$event .= "<strong>".$relationship.":&nbsp;</strong>";
				}
			}
		}

		// add thumbnail image
		$image = "<div class='pedigree_image'>";
		if ($MULTI_MEDIA && $SHOW_HIGHLIGHT_IMAGES && showFact("OBJE", $pid)) {
			$object = find_highlighted_object($pid, PGV_GED_ID, $indirec);
			if (!empty($object["thumb"])) {
				$size = findImageSize($object["thumb"]);
				$class = "pedigree_image_portrait";
				if ($size[0]>$size[1]) $class = "pedigree_image_landscape";
				if ($TEXT_DIRECTION=="rtl") $class .= "_rtl";
				$image .= "<img src='{$object["thumb"]}' vspace='0' hspace='0' class='{$class}' alt ='' title='' >";
			} else {
				$class = "pedigree_image_portrait";
				if ($TEXT_DIRECTION == "rtl") $class .= "_rtl";
				$sex = $person->getSex();
				$image .= "<img src=\'./";
				if ($sex == 'F') { $image .= $PGV_IMAGE_DIR."/".$PGV_IMAGES["default_image_F"]["other"]; }
				elseif ($sex == 'M') { $image .= $PGV_IMAGE_DIR."/".$PGV_IMAGES["default_image_M"]["other"]; }
				else { $image .= $PGV_IMAGE_DIR."/".$PGV_IMAGES["default_image_U"]["other"]; }
				$image .="\' align=\'left\' class=\'".$class."\' border=\'none\' alt=\'\' />";
			}
			$image .= "</div>";
		}
		// end of add image

		$dataleft  = $image . $event . addslashes($name);
		$datamid   = " <span><a href='individual.php?pid=". $pid . "' id='alturl' title='" . $pgv_lang["indi_info"] . "'>";
		if ($TEXT_DIRECTION == "rtl") $datamid .= PrintReady("(".$pid.")");
		else $datamid .= "(". $pid . ")";
		$datamid  .= "</a></span>";
		$dataright = "<br /><strong>". $pgv_lang["birth"] . "&nbsp;</strong>" .
				addslashes($bdate->Display(false))."<br />".$bplace;
	
		$latlongval[$i] = get_lati_long_placelocation($person->getBirthPlace());
		if ($latlongval[$i] != NULL){
			$lat[$i] = str_replace(array('N', 'S', ','), array('', '-', '.'), $latlongval[$i]["lati"]);
			$lon[$i] = str_replace(array('E', 'W', ','), array('', '-', '.'), $latlongval[$i]["long"]);
			if (!($lat[$i] == NULL && $lon[$i] == NULL) && !($lat[$i] == 0 && $lon[$i] == 0)) {
				if (!$hideflags && $latlongval[$i]["icon"] != NULL) {
					$flags[$i] = $latlongval[$i]["icon"];
					$ffile = strrchr($flags[$i], '/');
					$ffile = substr($ffile,1, strpos($ffile, '.')-1);
					if (!isset($flags[$ffile])) {
						$flags[$ffile] = $i; // Only generate the flag once
						if (($lat[$i] != NULL) && ($lon[$i] != NULL)) {
							echo "var point = new google.maps.LatLng(" . $lat[$i] . "," . $lon[$i]. ");\n";
							// echo "Marker1_0_flag.image = \"". $flags[$i]. "\";\n";
							// echo "Marker1_0_flag.shadow = \"modules/googlemap/images/flag_shadow.png\";\n";
							// echo "Marker1_0_flag.iconSize = new GSize(25, 15);\n";
							// echo "Marker1_0_flag.shadowSize = new GSize(35, 45);\n";
							// echo "Marker1_0_flag.iconAnchor = new GPoint(1, 45);\n";
							// echo "Marker1_0_flag.infoWindowAnchor = new GPoint(5, 1);\n";
							echo "var Marker1_0 = new google.maps.Marker({ position: point, icon: \"". $flags[$i]. "\"});\n";
							// echo "pm_map.addOverlay(Marker1_0);\n\n";
							echo "Marker1_0.setMap(pm_map);\n\n";
						}
					}
				}
				$marker_number = "$curgen";
				$dups=0;
				for ($k=0; $k<$i; $k++) {
					if ($latlongval[$i] == $latlongval[$k]) {
						if ($clustersize == 1) {
							$lon[$i] = $lon[$i]+0.0025;
							$lat[$i] = $lat[$i]+0.0025;
						}
						else {
							$dups++;
							switch($dups) {
								case 1: $marker_number = "$curgen" . "L"; break;
								case 2: $marker_number = "$curgen" . "R"; break;
								case 3: if ($clustersize==5) {
									$marker_number = "$curgen" . "Ls"; break;
									}
								case 4: if ($clustersize==5) {
									$marker_number = "$curgen" . "Rs"; break;
									}
								case 5: //adjust position where markers have same coodinates
								default: $marker_number = "$curgen";
									$lon[$i] = $lon[$i]+0.0025;
									$lat[$i] = $lat[$i]+0.0025;
									break;
							}
						 }
					}
				}
				echo "var point = new google.maps.LatLng(" . $lat[$i] . "," . $lon[$i]. ");\n";
				echo "var marker = createMarker(point, \"" . addslashes($name). "\",\n\t\"".$dataleft."</a>".$datamid.$dataright."\",\n\t\"";
				echo "<div class='iwstyle'>";
				echo "<a href='module.php?ged={$GEDCOM}&mod=googlemap&pgvaction=pedigree_map&rootid={$pid}&PEDIGREE_GENERATIONS={$PEDIGREE_GENERATIONS}";
				if ($hideflags) echo "&hideflags=1";
				if ($hidelines) echo "&hidelines=1";
				if ($clustersize != 5) echo "&clustersize=". $clustersize; // ignoring the default of 5
				echo "' title='" . $pgv_lang["pedigree_map"] . "'>" . $dataleft . "</a>" . $datamid . $dataright . "</div>\",\n\t\"".$marker_number."\");\n";
				// echo "pm_map.addOverlay(marker);\n";
				echo "marker.setMap(pm_map);\n";

				if (!$hidelines) {
					$to_child = (intval(($i-1)/2)); // Draw a line from parent to child
					if ($to_child >= 0 && $to_child < 127 && !empty($lat[$to_child]) &&
					    ($lat[$to_child] != $lat[$i] || $lon[$to_child] != $lon[$i]) ) {
						echo "var pline = new google.maps.Polyline({
    path: [{ lat: ".$lat[$i].", lng: ".$lon[$i]." }, { lat: ".$lat[$to_child].", lng: ".$lon[$to_child]." }],
    geodesic: true,
    strokeColor: '".$colored_line[$curgen]."',
    strokeOpacity: 1.0,
    strokeWeight: 3
});\n";
						echo "pline.setMap(pm_map);\n";
					}
				}
				echo "bounds.extend(point);\n";
				echo "\n";
				$count++;
			}
		}
	}
	else {
		$latlongval[$i] = NULL;
	}
}
?>
pm_map.fitBounds(bounds);

// put the assembled side_bar_html contents into the side_bar div
side_bar_html += '<a href="javascript:pm_map.fitBounds(bounds);">reset map</a>';
document.getElementById("side_bar").innerHTML = side_bar_html;

//]]>
</script>
<?php
if ($controller->isPrintPreview()) {
	echo "<br /><br /><br />\n";
}
print_footer();
?>
