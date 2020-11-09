<?php
/**
 * German Language file for PhpGedView.
 *
 * PhpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2011  PGV Development Team. All rights reserved.
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
 * @subpackage GoogleMap
 * @translator Christian Helms
 * @translator Gerd Kroll
 * @version $Id: lang.de.php 7014 2011-01-23 18:02:32Z canajun2eh $
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

$pgv_lang["googlemap"]              = "Karte";
$pgv_lang["no_gmtab"]               = "Keine Karteninformation für diese Person";
$pgv_lang["gm_disabled"]            = "Kartendarstellung deaktiviert";

$pgv_lang["gm_redraw_map"]          = "Karte neu zeichnen";
$pgv_lang["gm_map"]                 = "Karte";
$pgv_lang["gm_physical"]            = "Gelände";
$pgv_lang["gm_satellite"]           = "Satellit";
$pgv_lang["gm_hybrid"]              = "Kombination";

// Configuration texts
$pgv_lang["gm_manage"]              = "Kartendarstellung anpassen";
$pgv_lang["configure_googlemap"]    = "GoogleMaps konfigurieren";
$pgv_lang["gm_admin_error"]         = "Nur für Verwalter";
$pgv_lang["gm_db_error"]            = "Tabelle 'placelocation' in Datenbank nicht vorhanden";
$pgv_lang["gm_table_created"]       = "Tabelle 'placelocation' neu angelegt";
$pgv_lang["googlemap_enable"]       = "GoogleMaps aktivieren";
$pgv_lang["googlemapkey"]           = "GoogleMaps API Schlüssel";
$pgv_lang["gm_map_type"]            = "Standarddarstellung";
$pgv_lang["gm_map_size"]            = "Größe der Karte (in Pixel)";
$pgv_lang["gm_map_size_x"]          = "Breite";
$pgv_lang["gm_map_size_y"]          = "Höhe";
$pgv_lang["gm_map_zoom"]            = "Zoomfaktor der Karte";
$pgv_lang["gm_digits"]              = "Nachkommastellen";
$pgv_lang["gm_min"]                 = "Min.";
$pgv_lang["gm_max"]                 = "Max.";
$pgv_lang["gm_default_level0"]      = "Standardwert der höchsten Stufe";
$pgv_lang["gm_nof_levels"]          = "Anzahl der Stufen";
$pgv_lang["gm_config_per_level"]    = "Konfiguration pro Stufe";
$pgv_lang["gm_name_prefix"]         = "Präfix";
$pgv_lang["gm_name_postfix"]        = "Suffix";
$pgv_lang["gm_name_pre_post"]       = "Reihenfolge von Präfix / Suffix";
$pgv_lang["gm_level"]               = "Stufe";
$pgv_lang["gm_pp_none"]             = "Kein Präfix / Suffix";
$pgv_lang["gm_pp_n_pr_po_b"]        = "Normal, Präfix, Suffix, beide";
$pgv_lang["gm_pp_n_po_pr_b"]        = "Normal, Suffix, Präfix, beide";
$pgv_lang["gm_pp_pr_po_b_n"]        = "Präfix, Suffix, beide, normal";
$pgv_lang["gm_pp_po_pr_b_n"]        = "Suffix, Präfix, beide, normal";
$pgv_lang["gm_pp_pr_po_n_b"]        = "Präfix, Suffix, normal, beide";
$pgv_lang["gm_pp_po_pr_n_b"]        = "Suffix, Präfix, normal, beide";
$pgv_lang["googlemap_coord"]        = "Koordinaten auf der Karte anzeigen";

// Place hierarchy
$pgv_lang["gm_place_hierarchy"]  	= "GoogleMaps im Ortsverzeichnis verwenden";
$pgv_lang["gm_ph_map_size"]		    = "Größe der Karte im Ortsverzeichnis (in Pixel)";
$pgv_lang["gm_ph_marker_type"]		= "Art des Ortemarkierers im Ortsverzeichnis";
$pgv_lang["gm_standard_marker"]		= "Standard";
$pgv_lang["gm_no_coord"]			= "Dieser Ort ist ohne Koordinaten";
$pgv_lang["gm_ph_placenames"]		= "Kurze Ortsbezeichner anzeigen?";
$pgv_lang["gm_ph_count"]			= "Anzahl der Personen und Familien anzeigen";
$pgv_lang["gm_ph_wheel"]			= "Mausrad zum Zoomen verwenden?";
$pgv_lang["gm_ph_controls"]			= "Einstellungswerkzeuge ausblenden";


// Texts used on the Places location page
$pgv_lang["edit_place_locations"]   = "Geografische Ortskoordinaten bearbeiten";
$pgv_lang["pl_no_places_found"]		= "Keine Ortseinträge vorgefunden";
$pgv_lang["pl_zoom_factor"]         = "Zoomfaktor";
$pgv_lang["pl_place_icon"]          = "Ikone";
$pgv_lang["pl_edit"]                = "Geografische Ortsdaten bearbeiten";
$pgv_lang["pl_add_place"]           = "Ort hinzufügen";
$pgv_lang["pl_import_gedcom"]       = "Aus aktueller GEDCOM-Datei importieren";
$pgv_lang["pl_import_all_gedcom"]   = "Aus allen GEDCOM-Dateien importieren";
$pgv_lang["pl_import_file"]         = "Aus Datei importieren";
$pgv_lang["pl_export_file"]         = "Aktuelle Ansicht in Datei exportieren";
$pgv_lang["pl_export_all_file"]     = "Alle Orte in Datei exportieren";
$pgv_lang["pl_north_short"]         = "N";
$pgv_lang["pl_south_short"]         = "S";
$pgv_lang["pl_east_short"]          = "O";
$pgv_lang["pl_west_short"]          = "W";
$pgv_lang["pl_places_localfile"]	= "Serverdatei mit den Ortsdaten (CSV)";
$pgv_lang["pl_places_filename"]     = "Datei mit den Ortsdaten (CSV)";
$pgv_lang["pl_clean_db"]            = "Alle Ortsdaten vor dem Import löschen?";
$pgv_lang["pl_update_only"]         = "Nur die vorhandenen Orte aktualisieren?";
$pgv_lang["pl_overwrite_data"]      = "Überschreiben der Ortsdaten mit den Daten aus der Datei?";
$pgv_lang["pl_no_places_found"]     = "Keine Orte gefunden";
$pgv_lang["pl_use_this_value"]      = "Diesen Wert verwenden";
$pgv_lang["pl_precision"]           = "Genauigkeit";
$pgv_lang["pl_country"]             = "Staat";
$pgv_lang["pl_state"]               = "Bundesland";
$pgv_lang["pl_city"]                = "Kreis / kreisfreie Stadt";
$pgv_lang["pl_place"]				= "Ort";
$pgv_lang["pl_neighborhood"]        = "Stadt / Ortsteil";
$pgv_lang["pl_house"]               = "Haus";
$pgv_lang["pl_max"]                 = "Max";
$pgv_lang["pl_delete"]              = "Geografischen Ort entfernen";
$pgv_lang["pl_search_level"]		= "Nur auf dieser Stufe suchen";
$pgv_lang["pl_search_all"]			= "Auf allen Stufen suchen";
$pgv_lang["pl_unknown"]				= "Unbekannt";

$pgv_lang["pl_flag"]                = "Flagge";
$pgv_lang["flags_edit"]             = "Flagge auswählen";
$pgv_lang["pl_change_flag"]         = "Flagge ändern";
$pgv_lang["pl_remove_flag"]         = "Flagge entfernen";
$pgv_lang["pl_no_flags"]			= "Das Verzeichnis <b>places/flags</b> existiert nicht.<br /><br />Für das Anzeigen von Flaggen, kopieren Sie das Verzeichnis <b>images/flags</b> ins Verzeichnis <b>places</b> oder laden Sie die Flaggen aus der PGV-Vollversion herunter.";
$pgv_lang["pl_remove_location"]     = "Diese Ortsdaten entfernen?";
$pgv_lang["pl_delete_error"]        = "Ortsdaten konnten nicht entfernt werden, weil noch weitere, von ihnen abhängige Ortsdaten vorhanden sind.";
$pgv_lang["list_inactive"]        	= "Liste auch mit nicht verknüpften Orten";


$pgv_lang["edit_place_locations"]   = "Geografische Orsteinträge bearbeiten";
$pgv_lang["pl_no_places_found"]     = "Keine Orte gefunden";
$pgv_lang["pl_zoom_factor"]         = "Zoomfaktor";
$pgv_lang["pl_place_icon"]          = "Icon";
$pgv_lang["pl_edit"]                = "Geografische Ortseinträge editieren";
$pgv_lang["pl_add_place"]           = "Ort hinzufügen";
$pgv_lang["pl_import_gedcom"]       = "Von aktueller GEDCOM-Datei importieren";
$pgv_lang["pl_import_all_gedcom"]   = "Von allen GEDCOM-Dateien importieren";
$pgv_lang["pl_import_file"]         = "Aus Datei importieren";
$pgv_lang["pl_export_file"]         = "Aktuelle Liste in Datei exportieren";
$pgv_lang["pl_export_all_file"]     = "Alle Orte in Datei exportieren";
$pgv_lang["pl_north_short"]         = "N";
$pgv_lang["pl_south_short"]         = "S";
$pgv_lang["pl_east_short"]          = "E";
$pgv_lang["pl_west_short"]          = "W";
$pgv_lang["pl_places_localfile"]	= "Server-Datei mit den Orten (CSV)";
$pgv_lang["pl_places_filename"]     = "Lokale-Datei mit den Orten (CSV)";
$pgv_lang["pl_clean_db"]            = "Alle vorhandenen Ortseinträge vor Import entfernen?";
$pgv_lang["pl_update_only"]         = "Nur die existierenden Orte aktualisieren?";
$pgv_lang["pl_overwrite_data"]      = "Orte-Daten mit den Daten aus Datei überschreiben?";
$pgv_lang["pl_use_this_value"]      = "Diese Werte verwenden";
$pgv_lang["pl_precision"]           = "Genauigkeit";
$pgv_lang["pl_country"]             = "Staat";
$pgv_lang["pl_state"]               = "Bundesland, Land";
$pgv_lang["pl_city"]                = "Kreis / kreisfreie Stadt";
$pgv_lang["pl_neighborhood"]        = "Gemeinde";
$pgv_lang["pl_house"]               = "Haus";
$pgv_lang["pl_max"]                 = "Max";
$pgv_lang["pl_delete"]              = "Geografischen Ortseintrag entfernen";

//Placecheck specific text
$pgv_lang["placecheck"]				= "Ortseinträge prüfen";
$pgv_lang["placecheck_text"]		= "Hier werden alle Orte aus der gewählten GEDCOM Datei angezeigt. Die Orte, die sowohl in den GooleMaps-Tabellen als auch in dieser GEDCOM Datei definiert sind, nicht angezeigt.";
$pgv_lang["placecheck_top"]			= "Orte der obersten Stufe";
$pgv_lang["placecheck_one"]			= "Orte auf Stufe Eins";
$pgv_lang["placecheck_select1"]		= "Oberste Stufe bestimmen...";
$pgv_lang["placecheck_select2"]		= "Nächste Stufe auswählen...";
$pgv_lang["placecheck_key"]			= "Bedeutung der unterschiedlichen Farben";
$pgv_lang["placecheck_key1"]		= "Weder der Ort noch seine Koordinaten existieren in der GoogleMaps Tabelle definiert.";
$pgv_lang["placecheck_key2"]		= "Für diesen Ort fehlen noch die Koordinaten in der GoogleMaps Tabelle.";
$pgv_lang["placecheck_key3"]		= "Für diese Hierarchiestufe fehlt der Ortsname in der GEDCOM Datei. Sie sollten diesen GoogleMaps Ort als &quot;unbekannt&quot; mit den Koordinaten ihrer übergeordneten Stufe versehen, bevor Sie weitere Orte zur nächsten Stufe hinzufügen";
$pgv_lang["placecheck_key4"]		= "Diese Hierarchiestufe ist zwar in Ihrer GEDCOM Datei nicht definiert, sie existiert aber als 'unbekannt' in der GoogleMaps Tabelle mit Koordinaten vorhanden.<br />Sie müssen nichts unternehmen, bevor die fehlende Stufe eingetragen wird";
$pgv_lang["placecheck_head"]		= "Ortsverzeichnis für eine GEDCOM Datei";
$pgv_lang["placecheck_gedheader"]	= "GEDCOM Datei mit Ortsdaten<br />(2 PLAC tag)";
$pgv_lang["placecheck_gm_header"]	= "GoogleMaps Tabellendaten";
$pgv_lang["placecheck_unique"]		= "Insgesamt eindeutige Orte";
$pgv_lang["placecheck_zoom"]        = "Zoom=";
$pgv_lang["placecheck_options"]     = "Ortseinträge überprüfen - Optionen für die Liste";
$pgv_lang["placecheck_filter_text"] = "Filteroptionen der Liste";
$pgv_lang["placecheck_match"] 		= "Vollständig definierte Orte auch anzeigen: ";
$pgv_lang["placecheck_lati"] 		= "Breitengrad";
$pgv_lang["placecheck_long"] 		= "Längengrad";

// Pedigree map
$pgv_lang["pedigree_map"]				= "Vorfahrenkarte";
$pgv_lang["pm_grandparent"] 			= "Großeltern";
$pgv_lang["pm_grandmother"] 			= "Großmutter";
$pgv_lang["pm_grandfather"] 			= "Großvater";
$pgv_lang["pm_gt"]						= "Gt";
$pgv_lang["pm_zoom_in"]					= "Hineinzoomen";
$pgv_lang["pm_zoom_out"]				= "Herauszoomen";
$pgv_lang["zoom_in_here"]				= "Hier hineinzoomen";
$pgv_lang["zoom_out_here"]				= "Hier herauszoomen";
$pgv_lang["centre_map"]					= "Hier neu zentrieren";
$pgv_lang["pm_individual_displayed"]	= "Person gefunden von insgesamt möglichen ";
$pgv_lang["pm_2individuals_displayed"]	= "Personen gefunden von insgesamt möglichen ";	// For Polish 2,3,4 or 22,23,24 or 32,33,34 etc.
$pgv_lang["pm_individuals_displayed"]	= "Personen gefunden von insgesamt möglichen";
$pgv_lang["pm_individual_private"]		= "Person unterliegt dem Datenschutz.";
$pgv_lang["pm_individuals_private"]		= "Personen unterliegen dem Datenschutz.";
$pgv_lang["pm_missing_birth"]			= "Person ohne Koordinaten für den Geburtsort:";
$pgv_lang["pm_2missing_births"]			= "Personen ohne Koordinaten für den Geburtsort:";	// For Polish 2,3,4 or 22,23,24 or 32,33,34 etc.
$pgv_lang["pm_missing_births"]			= "Personen ohne Koordinaten für den Geburtsort:";
$pgv_lang["pm_missings"]				= "Keine Vorfahren in der Datenbank vorhanden.";
$pgv_lang["pm_from"]					= "Vorfahren bei";
$pgv_lang["pm_for"]						= "für";
$pgv_lang["pm_gens"]					= "Generationen.";
$pgv_lang["pm_root"]					= "Proband";

?>
