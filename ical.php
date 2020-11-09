<?php
/**
 * Outputs calendar events in the iCalendar (RFC 2445 http://www.ietf.org/rfc/rfc2445.txt) format.
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
 * @subpackage Export
 * @version $Id: ical.php 7164 2017-09-05 11:35:41Z canajun2eh $
 *
 * @TODO This currently generates the file with only descendants of  the root person. We have to retrieve ancestors descendants, aunts, uncles and cousins, nieces nephews and great-aunts/uncles etc.
 * @TODO Add a menu item in the "Other" menu in the individual page to "Export Birthday and Anniversary Events". This should bring the user to a page with options to select events of what relationship to user should be included. Options should be ancestors, descendants, siblings, aunts & uncles, in-laws, cousins etc
 * @TODO Add support to export all events in a calendar (day month or year) in the iCal format. Option to be recurring or one time should be available.
 * @TODO Format tested in Outlook 2003. Should be validated by testing other iCalendar apps such as iCal on the Mac
 */

define('PGV_SCRIPT_NAME', 'ical.php');
require './config.php';
require_once PGV_ROOT.'includes/classes/class_person.php';
require_once PGV_ROOT.'includes/classes/class_family.php';
require_once PGV_ROOT.'includes/functions/functions_ical.php';

//Basic http auth needed for non browser authentication. If the user is not logged in and fails basic auth, nothing will be returned
basicHTTPAuthenticateUser();

global $icalEvents, $icalType;
$icalEvents = array(); //array of all ical events

if (!empty($_REQUEST['events'])) {
	// The Todays, Upcoming, and Yahrzeit blocks use this script to produce the ical file from a list of events
	$icalType = 'all';
	processEventsList(safe_GET('events'));
} else {
	// This script is being referenced directly
	$icalType = 'lr'; // default to living relatives
	if (!empty($_REQUEST['ict'])) $icalType = strtolower(safe_GET('ict'));
	if (!in_array($icalType, array('all', 'lr'))) $icalType = 'all';

	$indi = Person::getInstance(safe_GET_xref('pid')); //get indi
	generateRelativesIcal($indi);
}

//output the iCal
outputIcal();

?>
