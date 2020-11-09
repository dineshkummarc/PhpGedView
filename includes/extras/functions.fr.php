<?php
/**
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2017  PGV Development Team.  All rights reserved.
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
 * @version $Id: functions.fr.php 7165 2017-09-13 15:26:12Z canajun2eh $
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

define('PGV_FUNCTIONS_FR_PHP', '');

////////////////////////////////////////////////////////////////////////////////
// Create an ordinal suffix for a number.
////////////////////////////////////////////////////////////////////////////////
function ordinal_suffix_fr($n) {
	if ($n==1)
		return 'er';
	return 'ème';
}

////////////////////////////////////////////////////////////////////////////////
// Localise a date. "[qualifier] date [qualifier] date [qualifier]"
////////////////////////////////////////////////////////////////////////////////
function date_localisation_fr(&$q1, &$d1, &$q2, &$d2, &$q3) {
	global $pgv_lang;

	// Years in the French Revolutionary calendar are displayed in roman numerals.
	// They need a prefix of "an"
	// Although the French Revolutionary calendar was no longer used after Year 9, it's still possible
	// to have years greater than 9 in there.
	$d1=preg_replace("/(\b[IVXLCDM]+$)/", "an $1", $d1);
	$d2=preg_replace("/(\b[IVXLCDM]+$)/", "an $1", $d2);

	if (isset($pgv_lang[$q1]))
		$q1=$pgv_lang[$q1];
	if (isset($pgv_lang[$q2]))
		$q2=$pgv_lang[$q2];
	if (isset($pgv_lang[$q3]))
		$q3=$pgv_lang[$q3];
}

?>
