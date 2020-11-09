<?php
/**
 * Interface to edit place locations
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2016  PGV Development Team. All rights reserved.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
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
 * @package PhpGedView
 * @subpackage Edit
 * @version $Id: places_edit.php 7151 2017-02-17 12:22:32Z canajun2eh $
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

require PGV_ROOT.'modules/googlemap/defaultconfig.php';
require PGV_ROOT.'includes/functions/functions_edit.php';
require $INDEX_DIRECTORY."pgv_changes.php";

loadLangFile("pgv_facts, googlemap:lang, googlemap:help_text, pgv_country");

if (isset($_REQUEST['placeid'])) $placeid = $_REQUEST['placeid'];
if (isset($_REQUEST['place_name'])) $place_name = $_REQUEST['place_name'];
if (isset($_REQUEST['action']))  $action  = $_REQUEST['action'];

print_simple_header($pgv_lang["edit_place_locations"]);

if (!PGV_USER_IS_ADMIN) {
	echo "<table class=\"facts_table\">\n";
	echo "<tr><td colspan=\"2\" class=\"facts_value\">", $pgv_lang["gm_admin_error"];
	echo "</td></tr></table>\n";
	echo "<br /><br /><br />\n";
	print_simple_footer();
	exit;
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
<script type="text/javascript">
<!--
	function edit_close() {
		if (window.opener.showchanges) window.opener.showchanges();
		window.close();
	}

function showchanges() {
	updateMap();
}
//-->
</script>
<?php

// Take a place id and find its place in the hierarchy
// Input: place ID
// Output: ordered array of id=>name values, starting with the Top Level
// e.g. array(0=>"Top Level", 16=>"England", 19=>"London", 217=>"Westminster");
// NB This function exists in both places.php and places_edit.php
function place_id_to_hierarchy($id) {
	global $TBLPREFIX, $countries;

	$statement=
		PGV_DB::prepare("SELECT pl_parent_id, pl_place FROM {$TBLPREFIX}placelocation WHERE pl_id=?");
	$arr=array();
	while ($id!=0) {
		$row=$statement->execute(array($id))->fetchOneRow();
		$arr=array($id=>(isset($countries[$row->pl_place])?$countries[$row->pl_place]:$row->pl_place)) + $arr;
		$id=$row->pl_parent_id;
	}
	return $arr;
}

// NB This function exists in both places.php and places_edit.php
function getHighestIndex() {
	global $TBLPREFIX;

	return (int)PGV_DB::prepare("SELECT MAX(pl_id) FROM {$TBLPREFIX}placelocation")->fetchOne();
}

$where_am_i=place_id_to_hierarchy($placeid);
$level=count($where_am_i);

if ($action=='addrecord' && PGV_USER_IS_ADMIN) {
	$statement=
		PGV_DB::prepare("INSERT INTO {$TBLPREFIX}placelocation (pl_id, pl_parent_id, pl_level, pl_place, pl_long, pl_lati, pl_zoom, pl_icon) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

	if (($_POST['LONG_CONTROL'] == '') || ($_POST['NEW_PLACE_LONG'] == '') || ($_POST['NEW_PLACE_LATI'] == '')) {
		$statement->execute(array(getHighestIndex()+1, $placeid, $level, stripLRMRLM($_POST['NEW_PLACE_NAME']), null, null, $_POST['NEW_ZOOM_FACTOR'], $_POST['icon']));
	} else {
		$statement->execute(array(getHighestIndex()+1, $placeid, $level, stripLRMRLM($_POST['NEW_PLACE_NAME']), $_POST['LONG_CONTROL'][3].$_POST['NEW_PLACE_LONG'], $_POST['LATI_CONTROL'][3].$_POST['NEW_PLACE_LATI'], $_POST['NEW_ZOOM_FACTOR'], $_POST['icon']));
	}

	if ($EDIT_AUTOCLOSE && !PGV_DEBUG) {
		echo "\n<script type=\"text/javascript\">\n<!--\nedit_close();\n//-->\n</script>";
	}
	echo "<div class=\"center\"><a href=\"javascript:;\" onclick=\"edit_close();return false;\">", $pgv_lang["close_window"], "</a></div><br />\n";
	print_simple_footer();
	exit;
}

if ($action=='updaterecord' && PGV_USER_IS_ADMIN) {
	$statement=
		PGV_DB::prepare("UPDATE {$TBLPREFIX}placelocation SET pl_place=?, pl_lati=?, pl_long=?, pl_zoom=?, pl_icon=? WHERE pl_id=?");

	if (($_POST['LONG_CONTROL'] == '') || ($_POST['NEW_PLACE_LONG'] == '') || ($_POST['NEW_PLACE_LATI'] == '')) {
		$statement->execute(array(stripLRMRLM($_POST['NEW_PLACE_NAME']), null, null, $_POST['NEW_ZOOM_FACTOR'], $_POST['icon'], $placeid));
	} else {
		$statement->execute(array(stripLRMRLM($_POST['NEW_PLACE_NAME']), $_POST['LATI_CONTROL'][3].$_POST['NEW_PLACE_LATI'], $_POST['LONG_CONTROL'][3].$_POST['NEW_PLACE_LONG'], $_POST['NEW_ZOOM_FACTOR'], $_POST['icon'], $placeid));
	}

	if ($EDIT_AUTOCLOSE && !PGV_DEBUG) {
		echo "\n<script type=\"text/javascript\">\n<!--\nedit_close();\n//-->\n</script>";
	}
	echo "<div class=\"center\"><a href=\"javascript:;\" onclick=\"edit_close();return false;\">", $pgv_lang["close_window"], "</a></div><br />\n";
	print_simple_footer();
	exit;
}

if ($action=="update") {
	// --- find the place in the file
	$row=
		PGV_DB::prepare("SELECT pl_place, pl_lati, pl_long, pl_icon, pl_parent_id, pl_level, pl_zoom FROM {$TBLPREFIX}placelocation WHERE pl_id=?")
		->execute(array($placeid))
		->fetchOneRow();
	$place_name = $row->pl_place;
	$place_icon = $row->pl_icon;
	$selected_country = explode("/", $place_icon);
	if (isset($selected_country[1]) && $selected_country[1]!="flags")
		$selected_country = $selected_country[1];
	else
		$selected_country = "Countries";
	$parent_id	= $row->pl_parent_id;
	$level		= $row->pl_level;
	$zoomfactor	= $row->pl_zoom;
	$parent_lati = "0.0";
	$parent_long = "0.0";
	if ($row->pl_lati!==null && $row->pl_long!==null) {
		$place_lati = (float)(str_replace(array('N', 'S', ','), array('', '-', '.') , $row->pl_lati));
		$place_long = (float)(str_replace(array('E', 'W', ','), array('', '-', '.') , $row->pl_long));
		$show_marker = true;
	} else {
		$place_lati = null;
		$place_long = null;
		$zoomfactor = 1;
		$show_marker = false;
	}

	do {
		$row=
			PGV_DB::prepare("SELECT pl_lati, pl_long, pl_parent_id, pl_zoom FROM {$TBLPREFIX}placelocation WHERE pl_id=?")
			->execute(array($parent_id))
			->fetchOneRow();
		if (!$row) {
			break;
		}
		if ($row->pl_lati!==null && $row->pl_long!==null) {
			$parent_lati = (float)(str_replace(array('N', 'S', ','), array('', '-', '.') , $row->pl_lati));
			$parent_long = (float)(str_replace(array('E', 'W', ','), array('', '-', '.') , $row->pl_long));
			if ($zoomfactor == 1) {
				$zoomfactor = $row->pl_zoom;
			}
		}
		$parent_id = $row->pl_parent_id;
	} while ($row->pl_parent_id!=0 && $row->pl_lati===null && $row->pl_long===null);

	$success = false;

	echo "<b>", str_replace("Unknown", $pgv_lang["pl_unknown"], PrintReady(implode(', ', array_reverse($where_am_i, true)))), "</b><br />\n";
}

if ($action=="add") {
	// --- find the parent place in the file
	if ($placeid != 0) {
		if (!isset($place_name)) $place_name  = "";
		$place_lati = null;
		$place_long = null;
		$zoomfactor = 1;
		$parent_lati = "0.0";
		$parent_long = "0.0";
		$place_icon = "";
		$parent_id=$placeid;
		do {
			$row=
				PGV_DB::prepare("SELECT pl_lati, pl_long, pl_parent_id, pl_zoom, pl_level FROM {$TBLPREFIX}placelocation WHERE pl_id=?")
				->execute(array($parent_id))
				->fetchOneRow();
			if ($row->pl_lati!==null && $row->pl_long!==null) {
				$parent_lati=str_replace(array('N', 'S', ','), array('', '-', '.') , $row->pl_lati);
				$parent_long=str_replace(array('E', 'W', ','), array('', '-', '.') , $row->pl_long);
				$zoomfactor=$row->pl_zoom+2;
				if ($zoomfactor>$GOOGLEMAP_MAX_ZOOM) {
					$zoomfactor=$GOOGLEMAP_MAX_ZOOM;
				}
				$level=$row->pl_level+1;
			}
			$parent_id = $row->pl_parent_id;
		} while ($row->pl_parent_id!=0 && $row->pl_lati===null && $row->pl_long===null);
	}
	else {
		if (!isset($place_name)) $place_name  = "";
		$place_lati  = null;
		$place_long  = null;
		$parent_lati = "0.0";
		$parent_long = "0.0";
		$place_icon  = "";
		$parent_id   = 0;
		$level		 = 0;
		$zoomfactor  = $GOOGLEMAP_MIN_ZOOM;
	}
	$selected_country = "Countries";
	$show_marker = false;
	$success = false;

	if (!isset($place_name) || $place_name=="") echo "<b>", $pgv_lang["pl_unknown"];
	else echo "<b>", $place_name;
	if (count($where_am_i)>0)
		echo ", ", str_replace("Unknown", $pgv_lang["pl_unknown"], PrintReady(implode(', ', array_reverse($where_am_i, true)))), "</b><br />\n";
	echo "</b><br />";
}

?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $GOOGLEMAP_API_KEY;
        ?>&language=<?php echo $language_settings[$LANGUAGE]['lang_short_cut']; ?>" type="text/javascript"></script>
    <script type="text/javascript">
<!--
	if (window.attachEvent) {
		window.attachEvent("onload", function() {
			loadMap();	   // Internet Explorer
		});
	} else {
		window.addEventListener("load", function() {
			loadMap(); // Firefox and standard browsers
		}, false);
	}
	var childplaces = [];
	var infowindows = [];
	var geocoder = new google.maps.Geocoder();

	function updateMap() {
		var zoom;
		var latitude;
		var longitude;
		var i;

		document.editplaces.save1.disabled = "";
		document.editplaces.save2.disabled = "";
		zoom = parseInt(document.editplaces.NEW_ZOOM_FACTOR.value);

		prec = 20;
		for (i=0;i<document.editplaces.NEW_PRECISION.length;i++) {
			if (document.editplaces.NEW_PRECISION[i].checked) {
				prec = document.editplaces.NEW_PRECISION[i].value;
			}
		}
		if ((document.editplaces.NEW_PLACE_LATI.value == "") ||
			(document.editplaces.NEW_PLACE_LONG.value == "")) {
			latitude = parseFloat(parseFloat(document.editplaces.parent_lati.value).toFixed(prec));
			longitude = parseFloat(parseFloat(document.editplaces.parent_long.value).toFixed(prec));
			// map.clearOverlays();
		} else {
			latitude = parseFloat(document.editplaces.NEW_PLACE_LATI.value).toFixed(prec);
			longitude = parseFloat(document.editplaces.NEW_PLACE_LONG.value).toFixed(prec);
			if(document.editplaces.LATI_CONTROL.value == "") {
				document.editplaces.LATI_CONTROL.value = latitude >= 0 ? "PL_N" : "PL_S";
			}
			if(document.editplaces.LONG_CONTROL.value == "") {
				document.editplaces.LONG_CONTROL.value = longitude >= 0 ? "PL_E" : "PL_W";
			}
			document.editplaces.NEW_PLACE_LATI.value = latitude;
			document.editplaces.NEW_PLACE_LONG.value = longitude;
			latitude = parseFloat(latitude);
			longitude = parseFloat(longitude);

			if (latitude < 0.0) {
				latitude = latitude * -1;
				document.editplaces.NEW_PLACE_LATI.value = latitude;
			}
			if (longitude < 0.0) {
				longitude = longitude * -1;
				document.editplaces.NEW_PLACE_LONG.value = longitude;
			}
			if(document.editplaces.LATI_CONTROL.value == "PL_S") {
				latitude = latitude * -1;
			}
			if(document.editplaces.LONG_CONTROL.value == "PL_W") {
				longitude = longitude * -1;
			}

			if (document.editplaces.icon.value == "") {
				new google.maps.Marker({
					position: {lat: latitude, lng: longitude},
					map: map
				});
			} else {
				new google.maps.Marker({
					icon: document.editplaces.icon.value,
					position: {lat: latitude, lng: longitude},
					map: map
				});
			}
		}

		map.setCenter({lat: latitude, lng: longitude});
		map.setZoom( zoom );
		//document.getElementById('resultDiv').innerHTML = "";

		for (i=0; i < childplaces.length; i++) {
			new google.maps.Marker({
				position: childplaces[i],
				icon: "https://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_green.png",
				map: map
			});
		}
	}

	// function Map_type() {}
	// Map_type.prototype = new GControl();

	/* Map_type.prototype.refresh = function()
	{
		if(this.map.getCurrentMapType() != G_NORMAL_MAP)
			this.button1.className = 'non_active';
		else
			this.button1.className = 'active';
		if(this.map.getCurrentMapType() != G_SATELLITE_MAP)
			this.button2.className = 'non_active';
		else
			this.button2.className = 'active';
		if(this.map.getCurrentMapType() != G_HYBRID_MAP)
			this.button3.className = 'non_active';
		else
			this.button3.className = 'active';
		if(this.map.getCurrentMapType() != G_PHYSICAL_MAP)
			this.button4.className = 'non_active';
		else
			this.button4.className = 'active';
	}

	Map_type.prototype.initialize = function(place_map)
	{
		var list 	= document.createElement("ul");
		list.id	= 'map_type';

		var button1 = document.createElement('li');
		var button2 = document.createElement('li');
		var button3 = document.createElement('li');
		var button4 = document.createElement('li');

		button1.innerHTML = '<?php echo $pgv_lang["gm_map"]?>';
		button2.innerHTML = '<?php echo $pgv_lang["gm_satellite"]?>';
		button3.innerHTML = '<?php echo $pgv_lang["gm_hybrid"]?>';
		button4.innerHTML = '<?php echo $pgv_lang["gm_physical"]?>';

		button1.onclick = function() { map.setMapType(G_NORMAL_MAP); return false; };
		button2.onclick = function() { map.setMapType(G_SATELLITE_MAP); return false; };
		button3.onclick = function() { map.setMapType(G_HYBRID_MAP); return false; };
		button4.onclick = function() { map.setMapType(G_PHYSICAL_MAP); return false; };

		list.appendChild(button1);
		list.appendChild(button2);
		list.appendChild(button3);
		list.appendChild(button4);

		this.button1 = button1;
		this.button2 = button2;
		this.button3 = button3;
		this.button4 = button4;
		this.map = map;
		map.getContainer().appendChild(list);
		return list;
	}

	Map_type.prototype.getDefaultPosition = function()
	{
		return new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(2, 2));
	}
*/
	function loadMap() {
		var zoom;
			map = new google.maps.Map(document.getElementById("map_pane"));
			// map.addControl(new GSmallZoomControl3D());
			// map.addControl(new GScaleControl()) ;
			var bounds = new google.maps.LatLngBounds();
			// var map_type;
			// map_type = new Map_type();
			// map.addControl(map_type);
			/* google.maps.event.addListener(map, 'maptypechanged', function()
			{
				map_type.refresh();
			}); */
			var update_timeout = null;

			map.addListener('click', function(event){
			    update_timeout = setTimeout(function(){ //workarount of a bug? in API - click is triggered also if dblclick occured
			        if (event) {
			            // map.clearOverlays();
			            // Create our "tiny" yellow marker icon where the user clicked,
			            // The full size red marker is at the stored coordinates.
			            var smicon = "https://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_yellow.png";

			            map.panTo(event.latLng);
			            var lat = event.latLng.lat();
			            var lon = event.latLng.lng();
			            prec = 20;
			            for (i=0;i<document.editplaces.NEW_PRECISION.length;i++) {
			                if (document.editplaces.NEW_PRECISION[i].checked) {
			                    prec = document.editplaces.NEW_PRECISION[i].value;
			                }
			            }

			            if (lat < 0.0) {
			                document.editplaces.NEW_PLACE_LATI.value = (lat.toFixed(prec) * -1);
			                document.editplaces.LATI_CONTROL.value = "PL_S";
			            } else {
			                document.editplaces.NEW_PLACE_LATI.value = lat.toFixed(prec);
			                document.editplaces.LATI_CONTROL.value = "PL_N";
			            }
			            if (lon < 0.0) {
			                document.editplaces.NEW_PLACE_LONG.value = (lon.toFixed(prec) * -1);
			                document.editplaces.LONG_CONTROL.value = "PL_W";
			            } else {
			                document.editplaces.NEW_PLACE_LONG.value = lon.toFixed(prec);
			                document.editplaces.LONG_CONTROL.value = "PL_E";
			            }
			            newval = new google.maps.LatLng (lat.toFixed(prec), lon.toFixed(prec));
			            if (document.editplaces.icon.value == ""){
			                new google.maps.Marker({
			                    position: newval,
			                    map: map
			                });
			            } else {
			                new google.maps.Marker({
			                    position: newval,
			                    icon: document.editplaces.icon.value,
			                    map: map
			                });
			            }
			            // Trying to get the smaller yellow icon drawn in front.
			            new google.maps.Marker({
			                position: event.latLng,
			                icon: smicon,
			                map: map
			            });
			            //document.getElementById('resultDiv').innerHTML = "";
			            document.editplaces.save1.disabled = "";
			            document.editplaces.save2.disabled = "";
			            var childicon = "https://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_green.png";
			            /* for (i=0; i < childplaces.length; i++) {
                            map.addOverlay(childplaces[i]);
                        } */
			        }   
			    }, 200);        
			});

			map.addListener('dblclick', function(event) {       
			    clearTimeout(update_timeout);
			});

			map.addListener("zoom_changed", function() {
				document.editplaces.NEW_ZOOM_FACTOR.value = map.getZoom();
			});
<?php if(($place_long == null) || ($place_lati == null)) { ?>
			map.setCenter({ lat: <?=$parent_lati?>, lng: <?=$parent_long?> });
<?php }else { ?>
			map.setCenter({ lat: <?=$place_lati?>, lng: <?=$place_long?> });
<?php } ?>
			map.setZoom(<?=$zoomfactor?>);
<?php   if ($level < 3) { ?>
			var childicon = "https://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_green.png";
<?php
			$rows=
				PGV_DB::prepare("SELECT pl_place, pl_lati, pl_long, pl_icon FROM {$TBLPREFIX}placelocation WHERE pl_parent_id=?")
				->execute(array($placeid))
				->fetchAll();
			$i = 0;
			foreach ($rows as $row) {
				if ($row->pl_lati!==null && $row->pl_long!==null) {
					//delete leading zero
					$pl_lati = str_replace(array('N', 'S', ','), array('', '-', '.') , $row->pl_lati);
					$pl_long = str_replace(array('E', 'W', ','), array('', '-', '.') , $row->pl_long);
					if ($pl_lati >= 0) {
						$row->pl_lati = abs($pl_lati);
					} elseif ($pl_lati < 0) {
						$row->pl_lati = "-".abs($pl_lati);
					}
					if ($pl_long >= 0) {
						$row->pl_long = abs($pl_long);
					} elseif ($pl_long < 0) {
						$row->pl_long = "-".abs($pl_long);
					} ?>

			 	childplaces.push(new google.maps.Marker({
					position: {lat: <?=$row->pl_lati?>, lng: <?=$row->pl_long?>},
					icon: childicon,
					title: "<?=addslashes($row->pl_place)?>",
					map: map
				}));
			  	bounds.extend({ lat: <?=$row->pl_lati?>, lng: <?=$row->pl_long?>});
			  	map.setCenter(bounds.getCenter());
<?php
					$i++;
				}
			}
		}
		if ($show_marker == true) {
			if (($place_icon == NULL) || ($place_icon == "")) {
				if (($place_lati == null) || ($place_long == null)) {?>
					var icon_type = "modules/googlemap/images/marker_yellow.png";
					new google.maps.Marker({ position: {lat: <?=$parent_lati?>, lng: <?=$parent_long?>}, icon: icon_type, map: map});
<?php			} else { ?>
					new google.maps.Marker({ position: {lat: <?=$place_lati?>, lng: <?=$place_long?>}, icon: icon_type, map: map});
<?php			}
			}
			else { ?>
			var flagicon = "<?=$place_icon?>";
<?php			if (($place_lati == null) || ($place_long == null)) {?>
				new google.maps.Marker({ position: {lat: <?=$parent_lati?>, lng: <?=$parent_long?>}, icon: flagicon, map: map});
<?php			} else { ?>
				new google.maps.Marker({ position: {lat: <?=$place_lati?>, lng: <?=$place_long?>}, icon: flagicon, map: map});
<?php			}
			}
		} ?>
			// Our info window content
	}

	function edit_close() {
		if (window.opener.showchanges) window.opener.showchanges();
		// GUnload();
		window.close();
	}

	function setLoc(lat, lng, zoom) {
		prec = 20;
		for (i=0;i<document.editplaces.NEW_PRECISION.length;i++) {
			if (document.editplaces.NEW_PRECISION[i].checked) {
				prec = document.editplaces.NEW_PRECISION[i].value;
			}
		}

		if (lat < 0.0) {
			document.editplaces.NEW_PLACE_LATI.value = (lat.toFixed(prec) * -1);
			document.editplaces.LATI_CONTROL.value = "PL_S";
		} else {
			document.editplaces.NEW_PLACE_LATI.value = lat.toFixed(prec);
			document.editplaces.LATI_CONTROL.value = "PL_N";
		}
		if (lng < 0.0) {
			document.editplaces.NEW_PLACE_LONG.value = (lng.toFixed(prec) * -1);
			document.editplaces.LONG_CONTROL.value = "PL_W";
		} else {
			document.editplaces.NEW_PLACE_LONG.value = lng.toFixed(prec);
			document.editplaces.LONG_CONTROL.value = "PL_E";
		}
		document.editplaces.NEW_ZOOM_FACTOR.value = zoom;
		newval = new google.maps.LatLng (lat.toFixed(prec), lng.toFixed(prec));
		updateMap();
	}

	function createMarker(point, name, zoom) {

		var marker = new google.maps.Marker({
			position: point,
			draggable:true,
			icon: "modules/googlemap/images/marker_yellow.png",
			title: name + ': <?=PrintReady($pgv_lang["pl_use_this_value"])?> ' + point.lat() + ', ' + point.lng(),
			map: map
		});
		marker.addListener("click", function() {
			setLoc(point.lat(), point.lng(), zoom);
		});
		google.maps.event.addListener(marker, 'dragend', function(){
			var newpos = marker.getPosition();
			setLoc(newpos.lat(), newpos.lng(), zoom);
		});
		return marker;
	}

	function change_icon() {
		window.open('module.php?mod=googlemap&pgvaction=flags&countrySelected=<?php echo $selected_country ?>', '_blank', 'top=50, left=50, width=600, height=500, resizable=1, scrollbars=1');
		return false;
	}

	function remove_icon() {
		document.editplaces.icon.value = "";
		document.getElementById('flagsDiv').innerHTML = "<a href=\"javascript:;\" onclick=\"change_icon();return false;\"><?php echo $pgv_lang["pl_change_flag"]?></a>";
	}

	function addAddressToMap(response, status) {
	   // map.clearOverlays();
	   var bounds = new google.maps.LatLngBounds();
           var place, point, name, marker;
	   if (status != google.maps.GeocoderStatus.OK) {
	 	 alert("<?=$pgv_lang["pl_no_places_found"]?>");
	   } else {
		if(response.length>0) {
			for (i=0;i<response.length;i++) {
				place = response[i];
				point = place.geometry.location;
				name = place.formatted_address;
				zoomlevel = Math.round(Math.log(360 / (place.geometry.viewport.f.b - place.geometry.viewport.f.f) ) / Math.LN2) - 2;
				marker = createMarker(point, name, zoomlevel);
				// map.addOverlay(marker);
				if (place.geometry.viewport) {
					bounds.union(place.geometry.viewport);
				} else {
					bounds.extend(point);
				}
			}
			map.fitBounds(bounds);
			zoomlevel = map.getZoom()-1;
			if (zoomlevel < <?=$GOOGLEMAP_MIN_ZOOM?>) zoomlevel = <?=$GOOGLEMAP_MIN_ZOOM?>;
			if (zoomlevel > <?=$GOOGLEMAP_MAX_ZOOM?>) zoomlevel = <?=$GOOGLEMAP_MAX_ZOOM?>;
			if (document.editplaces.NEW_ZOOM_FACTOR.value<zoomlevel) {
				zoomlevel = document.editplaces.NEW_ZOOM_FACTOR.value;
				if (zoomlevel < <?=$GOOGLEMAP_MIN_ZOOM?>) zoomlevel = <?=$GOOGLEMAP_MIN_ZOOM?>;
				if (zoomlevel > <?=$GOOGLEMAP_MAX_ZOOM?>) zoomlevel = <?=$GOOGLEMAP_MAX_ZOOM?>;

			}
		}
	  }
	 }

	function showLocation_level(address) {
		<?php if (isset($countries[$place_name])) echo "address = '".$countries[$place_name]."';\n"; ?>
		address += '<?php if ($level>0) echo ", ", addslashes(PrintReady(implode(', ', array_reverse($where_am_i, true))));?>';
		if (document.editplaces.NEW_PRECISION[1].checked || document.editplaces.NEW_PRECISION[2].checked)
			geocoder.geocode({ componentRestrictions: { administrativeArea: address }}, addAddressToMap);
		else
			geocoder.geocode({ address: address }, addAddressToMap);
	}

	function showLocation_all(address) {
		geocoder.geocode({ address: address }, addAddressToMap);
	}

	function updatewholename() {
	}

	function paste_char(value, lang, mag) {
		document.editplaces.NEW_PLACE_NAME.value += value;
		language_filter = lang;
		magnify = mag;
	}

	function edit_close(newurl) {
		if (newurl)
			window.opener.location=newurl;
		else
			if (window.opener.showchanges)
				window.opener.showchanges();
		window.close();
	}
	//-->
</script>

<?php $i=0; ?>
<form method="post" id="editplaces" name="editplaces" action="module.php?mod=googlemap&amp;pgvaction=places_edit">
	<input type="hidden" name="action" value="<?php echo $action;?>record" />
	<input type="hidden" name="placeid" value="<?php echo $placeid;?>" />
	<input type="hidden" name="level" value="<?php echo $level;?>" />
	<input type="hidden" name="icon" value="<?php echo $place_icon;?>" />
	<input type="hidden" name="parent_id" value="<?php echo $parent_id;?>" />
	<input type="hidden" name="place_long" value="<?php echo $place_long;?>" />
	<input type="hidden" name="place_lati" value="<?php echo $place_lati;?>" />
	<input type="hidden" name="parent_long" value="<?php echo $parent_long;?>" />
	<input type="hidden" name="parent_lati" value="<?php echo $parent_lati;?>" />
	<input name="save1" type="submit" value="<?php echo $pgv_lang["save"];?>" /><br />

	<table class="facts_table">
	<tr>
		<td class="optionbox" colspan="2">
		<center><div id="map_pane" style="width: 100%; height: 300px"></div></center>
		</td>
	</tr>
	<tr>
		<td class="optionbox" colspan="2">
		</td>
	</tr>
	<tr>
		<td class="descriptionbox"><?php print_help_link("PLE_PLACES_help", "qm", "PLE_PLACES"); echo $factarray["PLAC"]?></td>
		<td class="optionbox"><input type="text" id="new_pl_name" name="NEW_PLACE_NAME" value="<?=htmlspecialchars($place_name)?>" size="25" class="address_input" tabindex="<?= ++$i?>" />
		<div id="INDI_PLAC_pop" style="display: inline;">
			<?=print_specialchar_link("NEW_PLACE_NAME", false)?>
		</div>
		<label for="new_pl_name"><a href="javascript:;" onclick="showLocation_level(document.getElementById('new_pl_name').value); return false">&nbsp;<?=$pgv_lang["pl_search_level"]?></a></label>&nbsp;&nbsp;|
	 	<label for="new_pl_name"><a href="javascript:;" onclick="showLocation_all(document.getElementById('new_pl_name').value); return false">&nbsp;<?=$pgv_lang["pl_search_all"]?></a></label>
		</td>
	</tr>
	<tr>
		<td class="descriptionbox"><?php print_help_link("PLE_PRECISION_help", "qm", "PLE_PRECISION"); echo $pgv_lang["pl_precision"]?></td>
		<?php
			$exp = explode(".", $place_lati);
			if (isset($exp[1])) {
				$precision1 = strlen($exp[1]);
			} else {
				$precision1 = -1;
			}
			$exp = explode(".", $place_long);
			if (isset($exp[1])) {
				$precision2 = strlen($exp[1]);
			} else {
				$precision2 = -1;
			}
			($precision1 > $precision2) ? ($precision = $precision1) : ($precision = $precision2);
			if ($precision == -1 ) ($level > 3) ? ($precision = 3) : ($precision = $level);
			elseif ($precision > 5) {
				$precision = 5;
			}
		?>
		<td class="optionbox">
			<input type="radio" id="new_prec_0" name="NEW_PRECISION" onchange="updateMap();" <?php if($precision==$GOOGLEMAP_PRECISION_0) echo "checked=\"checked\"";?> value="<?php echo $GOOGLEMAP_PRECISION_0;?>" tabindex="<?php echo ++$i;?>" />
			<label for="new_prec_0"><?php echo $pgv_lang["pl_country"];?></label>
			<input type="radio" id="new_prec_1" name="NEW_PRECISION" onchange="updateMap();" <?php if($precision==$GOOGLEMAP_PRECISION_1) echo "checked=\"checked\"";?> value="<?php echo $GOOGLEMAP_PRECISION_1;?>" tabindex="<?php echo ++$i;?>" />
			<label for="new_prec_1"><?php echo $pgv_lang["pl_state"];?></label>
			<input type="radio" id="new_prec_2" name="NEW_PRECISION" onchange="updateMap();" <?php if($precision==$GOOGLEMAP_PRECISION_2) echo "checked=\"checked\"";?> value="<?php echo $GOOGLEMAP_PRECISION_2;?>" tabindex="<?php echo ++$i;?>" />
			<label for="new_prec_2"><?php echo $pgv_lang["pl_city"];?></label>
			<input type="radio" id="new_prec_3" name="NEW_PRECISION" onchange="updateMap();" <?php if($precision==$GOOGLEMAP_PRECISION_3) echo "checked=\"checked\"";?> value="<?php echo $GOOGLEMAP_PRECISION_3;?>" tabindex="<?php echo ++$i;?>" />
			<label for="new_prec_3"><?php echo $pgv_lang["pl_neighborhood"];?></label>
			<input type="radio" id="new_prec_4" name="NEW_PRECISION" onchange="updateMap();"<?php if($precision==$GOOGLEMAP_PRECISION_4) echo "checked=\"checked\"";?> value="<?php echo $GOOGLEMAP_PRECISION_4;?>" tabindex="<?php echo ++$i;?>" />
			<label for="new_prec_4"><?php echo $pgv_lang["pl_house"];?></label>
			<input type="radio" id="new_prec_5" name="NEW_PRECISION" onchange="updateMap();"<?php if($precision>$GOOGLEMAP_PRECISION_4) echo "checked=\"checked\"";?> value="<?php echo $GOOGLEMAP_PRECISION_5;?>" />
			<label for="new_prec_5"><?php echo $pgv_lang["pl_max"];?></label>
		</td>
	</tr>
	<tr>
		<td class="descriptionbox"><?php print_help_link("PLE_LATLON_CTRL_help", "qm", "PLE_LATLON_CTRL");?><?php echo $factarray["LATI"];?></td>
		<td class="optionbox">
			<select name="LATI_CONTROL" tabindex="<?php echo ++$i;?>" onchange="updateMap();">
				<option value="" <?php if ($place_lati == null) echo " selected=\"selected\"";?>></option>
				<option value="PL_N" <?php if ($place_lati > 0) echo " selected=\"selected\""; echo ">", $pgv_lang["pl_north_short"]; ?></option>
				<option value="PL_S" <?php if ($place_lati < 0) echo " selected=\"selected\""; echo ">", $pgv_lang["pl_south_short"]; ?></option>
			</select>
			<input type="text" name="NEW_PLACE_LATI" value="<?php if ($place_lati != null) echo abs($place_lati);?>" size="20" tabindex="<?php echo ++$i;?>" onchange="updateMap();" /></td>
	</tr>
	<tr>
		<td class="descriptionbox"><?php print_help_link("PLE_LATLON_CTRL_help", "qm", "PLE_LATLON_CTRL");?><?php echo $factarray["LONG"];?></td>
		<td class="optionbox">
			<select name="LONG_CONTROL" tabindex="<?php echo ++$i;?>" onchange="updateMap();">
				<option value="" <?php if ($place_long == null) echo " selected=\"selected\"";?>></option>
				<option value="PL_E" <?php if ($place_long > 0) echo " selected=\"selected\""; echo ">", $pgv_lang["pl_east_short"]; ?></option>
				<option value="PL_W" <?php if ($place_long < 0) echo " selected=\"selected\""; echo ">", $pgv_lang["pl_west_short"]; ?></option>
			</select>
			<input type="text" name="NEW_PLACE_LONG" value="<?php if ($place_long != null) echo abs($place_long);?>" size="20" tabindex="<?php echo ++$i;?>" onchange="updateMap();" /></td>
	</tr>
	<tr>
		<td class="descriptionbox"><?php print_help_link("PLE_ZOOM_help", "qm", "PLE_ZOOM");?><?php echo $pgv_lang["pl_zoom_factor"];?></td>
		<td class="optionbox">
			<input type="text" name="NEW_ZOOM_FACTOR" value="<?php echo $zoomfactor;?>" size="20" tabindex="<?php echo ++$i;?>" onchange="updateMap();" /></td>
	</tr>
	<tr>
		<td class="descriptionbox"><?php print_help_link("PLE_ICON_help", "qm", "PLE_ICON");?><?php echo $pgv_lang["pl_flag"];?></td>
		<td class="optionbox">
			<div id="flagsDiv">
<?php
		if (($place_icon == NULL) || ($place_icon == "")) { ?>
				<a href="javascript:;" onclick="change_icon();return false;"><?php echo $pgv_lang["pl_change_flag"]?></a>
<?php   }
		else { ?>
				<img alt="<?php echo $pgv_lang["pl_flag"]?>" src="<?php echo $place_icon;?>"/>&nbsp;&nbsp;
				<a href="javascript:;" onclick="change_icon();return false;"><?php echo $pgv_lang["pl_change_flag"]?></a>&nbsp;&nbsp;
				<a href="javascript:;" onclick="remove_icon();return false;"><?php echo $pgv_lang["pl_remove_flag"]?></a>
<?php   } ?>
			</div></td>
	</tr>
	</table>
	<input name="save2" type="submit" value="<?php echo $pgv_lang["save"];?>" /><br />
</form>
<?php
$link = 'module.php?mod=googlemap&pgvaction=places&parent='.$placeid;
echo "<center><br /><br /><br /><a href=\"javascript:;\" onclick=\"edit_close('{$link}')\">", $pgv_lang["close_window"], "</a><br /></center>\n";

print_simple_footer();
?>
