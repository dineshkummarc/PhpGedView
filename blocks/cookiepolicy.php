<?php
/**
 * Cookie policy Block
 *
 * This block will show the cookie policy disclaimer required by the EU Cookie Law
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2016  PGV Development Team.  All rights reserved.
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
 * @version $Id: cookiepolicy.php 7123 2016-01-25 23:21:47Z canajun2eh $
 * @author Pasquale Ceres
 * @package PhpGedView
 * @subpackage Blocks
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

define('PGV_COOKIEPOLICY_PHP', '');

$PGV_BLOCKS["print_block_cookie_policy"]["name"]		= $pgv_lang["block_cookiepolicy"];
$PGV_BLOCKS["print_block_cookie_policy"]["descr"]		= "block_cookiepolicy_descr";
$PGV_BLOCKS["print_block_cookie_policy"]["type"]		= "gedcom";		// Show this block only on Welcome page
$PGV_BLOCKS["print_block_cookie_policy"]["canconfig"]	= true;
$PGV_BLOCKS["print_block_cookie_policy"]["config"]		= array(
	"cache"=>-1,
	"cookiepolicy_link"=>"",
	);

function print_block_cookie_policy($block=true, $config="", $side, $index) {
	global $pgv_lang, $PGV_BLOCKS, $ctype, $PGV_IMAGES, $PGV_IMAGE_DIR;

	if (empty($config)) {
		$config=$PGV_BLOCKS["print_block_cookie_policy"]["config"];
	}

	$id = 'cookie_policy';
	$title = print_help_link("index_cookiepolicy_help", "qm","",false,true);
	if ($PGV_BLOCKS["print_block_cookie_policy"]["canconfig"]) {
		if ($ctype=="gedcom" && PGV_USER_GEDCOM_ADMIN || $ctype=="user" && PGV_USER_ID) {
			if ($ctype=="gedcom") {
				$name = PGV_GEDCOM;
			} else {
				$name = PGV_USER_NAME;
			}
			$title .= "<a href=\"javascript: configure block\" onclick=\"window.open('".encode_url("index_edit.php?name={$name}&ctype={$ctype}&action=configure&side={$side}&index={$index}")."', '_blank', 'top=50,left=50,width=600,height=350,scrollbars=1,resizable=1'); return false;\">";
			$title .= "<img class=\"adminicon\" src=\"$PGV_IMAGE_DIR/".$PGV_IMAGES["admin"]["small"]."\" width=\"15\" height=\"15\" border=\"0\" alt=\"".$pgv_lang["config_block"]."\" /></a>";
		}
	}
	$title .= $pgv_lang["block_cookiepolicy_title"];


	$content=$pgv_lang["block_cookiepolicy_body"];


	if (!empty($config["cookiepolicy_link"])) {
		$content = str_replace("<link>",$config["cookiepolicy_link"],print_text("block_cookiepolicy_body_extlink", 0, 1));
	} else {
		$content = print_text("block_cookiepolicy_body", 0, 1);
	}

	global $THEME_DIR;
	if ($block) {
		require $THEME_DIR.'templates/block_small_temp.php';
	} else {
		require $THEME_DIR.'templates/block_main_temp.php';
	}
}

function print_block_cookie_policy_config($config) {
	global $pgv_lang, $ctype, $PGV_BLOCKS;
	if (empty($config)) $config = $PGV_BLOCKS["print_block_cookie_policy"]["config"];
	if (!isset($config["cache"])) $config["cache"] = $PGV_BLOCKS["print_block_cookie_policy"]["config"]["cache"];
?>
	<tr>
		<td class="descriptionbox wrap width33">
			<?php
				print_help_link("cookiepolicy_link_help", "qm");
				print $pgv_lang["block_cookiepolicy_link"];
			?>
		</td>
	<td class="optionbox">
		<input type="text" name="cookiepolicy_link" size="50" value="<?php print $config["cookiepolicy_link"] ?>" />
		<br /><sup><?php print $pgv_lang["cookiepolicy_link_advice"] ?></sup>
	</td></tr>

	<?php

	// Cache file life
	if ($ctype=="gedcom") {
  		print "<tr><td class=\"descriptionbox wrap width33\">";
			print_help_link("cache_life_help", "qm");
			print $pgv_lang["cache_life"];
		print "</td><td class=\"optionbox\">";
			print "<input type=\"text\" name=\"cache\" size=\"2\" value=\"".$config["cache"]."\" />";
		print "</td></tr>";
	}
}
?>
