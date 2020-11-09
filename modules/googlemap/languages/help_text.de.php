<?php
/**
 * German Language file for PhpGedView.
 *
 * PhpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2011  PGV Development Team
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
 * @version $Id: help_text.de.php 7015 2011-01-23 18:17:58Z canajun2eh $
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

$pgv_lang["GOOGLEMAP_CONFIG"]           = "GoogleMaps konfigurieren";
$pgv_lang["GOOGLEMAP_CONFIG_help"]      = "~#pgv_lang[GOOGLEMAP_CONFIG]#~<br /><br />Hier konfigurieren Sie alle Aspekte des Moduls GoogleMaps.";

$pgv_lang["GOOGLEMAP_ENABLE"]           = "Kartendarstellung aktivieren";
$pgv_lang["GOOGLEMAP_ENABLE_help"]      = "~#pgv_lang[GOOGLEMAP_ENABLE]#~<br /><br />Diese Option aktiviert oder deaktiviert die Kartendarstellung mit GoogleMaps.<br />Bei deaktivierter Kartendarstellung bleibt der Karteireiter für die Kartendarstellung zwar leer, der Link um die Darstellung zu verwalten ist aber weiterhin aktiv.";

$pgv_lang["GOOGLEMAP_API_KEY"]          = "GoogleMaps API Schlüssel";
$pgv_lang["GOOGLEMAP_API_KEY_help"]     = "~#pgv_lang[GOOGLEMAP_API_KEY]#~<br /><br />Tragen Sie hier Ihren Google-Map API Schlüssel (key) ein. Den Schlüssel bekommen Sie auf folgendem URL: <a target=\"_blank\" href=\"http://www.google.com/apis/maps/\" title=\"Hier klicken, um Google-Map Key zu beantragen\">http://www.google.com/apis/maps/</a>";

$pgv_lang["GOOGLEMAP_MAP_TYPE"]	        = "Standard Kartentyp";
$pgv_lang["GOOGLEMAP_MAP_TYPE_help"]    = "~#pgv_lang[GOOGLEMAP_MAP_TYPE]#~<br /><br />Darstellungstyp der Karte, die normalerweise angezeigt wird. Das ist entweder Straßenkarte, Satellitenfoto oder Kombination.";

$pgv_lang["GOOGLEMAP_MAP_SIZE"]	        = "Größe der Karte";
$pgv_lang["GOOGLEMAP_MAP_SIZE_help"]    = "~#pgv_lang[GOOGLEMAP_MAP_SIZE]#~<br /><br />Die Abmessungen der Karte (in Pixel), so, wie sie auf der Personenseite gezeigt wird.";

$pgv_lang["GOOGLEMAP_MAP_ZOOM"]	        = "Zoomfaktor der Karte";
$pgv_lang["GOOGLEMAP_MAP_ZOOM_help"]    = "~#pgv_lang[GOOGLEMAP_MAP_ZOOM]#~<br /><br />Kleinster und größter Zoomfaktor der Karte. 1 zeigt die gesamte Erde, 15 zeigt einzelne Häuser. Achtung: Stufe 15 wird von Google noch nicht an allen Orten angeboten!";

$pgv_lang["GOOGLEMAP_PRECISION"]        = "Genauigkeit der Breiten- und Längengrade";
$pgv_lang["GOOGLEMAP_PRECISION_help"]   = "~#pgv_lang[GOOGLEMAP_PRECISION]#~<br /><br />Hier wird die Genauigkeit (Nachkommastellen) für die jeweilige Hierarchiestufe bestimmt, wenn ein neuer geografischer Ort eingetragen wird. Beispielweise könnte für ein Land (DEU) die Genauigkeit '1' ( = eine Nachkommastelle) eingestellt werden, wogegen eine Stadt 4 oder 5 Stellen benötigt.";

$pgv_lang["GM_DEFAULT_LEVEL_0"]         = "Standardwert für oberste Stufe";
$pgv_lang["GM_DEFAULT_LEVEL_0_help"]    = "~#pgv_lang[GM_DEFAULT_LEVEL_0]#~<br /><br />Hier wird der Standardwert der Genauigkeit für die höchste Stufe in der Orte-Hierarchie bestimmt werden. Wenn ein Ort in der Datenbank nicht gefunden wird, wird sein Name als höchste Stufe (Staat) eingetragen und die Datenbank erneut durchsucht.";

$pgv_lang["GM_NOF_LEVELS"]              = "Anzahl der Stufen, die von Googlemap benutzt werden";
$pgv_lang["GM_NOF_LEVELS_help"]         = "~#pgv_lang[GM_NOF_LEVELS]#~<br /><br />Dieser Wert gibt an, wieviel Stufen in der Orte-Hierarchie von Googlemap genutzt werden.<br />Der Standardwert ist 4 (Staat, Bundesland, State, Kreis / Kreisfreie Stadt, Ort), was im Normalfall ausreicht. Ändern Sie diesen Wert, wenn Sie zusätzliche Stufen (wie z. B. Straßenangaben, Schulen oder Friedhöfe) nutzen wollen. Falls Sie eine Stufe entfernen, muss dieser Wert ebenfalss angepasst werden. Denken Sie aber daran, dass die Datei mit den Ortsdaten eine 4-stufige Struktur hat!";

$pgv_lang["GM_NAME_PREFIX"]             = "Präfix für Namen auf dieser Stufe";
$pgv_lang["GM_NAME_PREFIX_help"]        = "~#pgv_lang[GM_NAME_PREFIX]#~<br /><br />Dieser Wert wird allen Namen dieser Stufe vorangestellt. Es können mehrere Werte, durch Semikola getrennt, verwendet werden";

$pgv_lang["GM_NAME_POSTFIX"]            = "Suffix für Namen auf dieser Stufe";
$pgv_lang["GM_NAME_POSTFIX_help"]       = "~#pgv_lang[GM_NAME_POSTFIX]#~<br /><br />Dieser Wert wird allen Namen dieser Stufe angehängt. Es können mehrere Werte, durch Semikola getrennt, verwendet werden";

$pgv_lang["GM_NAME_PRE_POST"]           = "Reihenfolge für den Gebrauch von Präfix / Suffix";
$pgv_lang["GM_NAME_PRE_POST_help"]      = "~#pgv_lang[GM_NAME_PRE_POST]#~<br /><br />Dieses Feld bezeichnet die Reihenfolge, in der die Präfixe / Suffixe bei den Namen angewendet werden sollen. Mögliche Werte:<br /><ul><li>Kein Präfix / Suffix</li><li>Normaler Name, Präfix, Suffix, beide</li><li>Normaler Name, Suffix, Präfix, beidet</li><li>Präfix, Suffix, beide, normaler Name</li><li>Suffix, Präfix, beide, normaler Name</li><li>Präfix, Suffix, normaler Name, beide</li><li>Suffix, Präfix, normaler Name, beide</li></ul>";

$pgv_lang["PL_EDIT_LOCATION"]           = "Ortsdaten bearbeiten oder löschen";
$pgv_lang["PL_EDIT_LOCATION_help"]      = "~#pgv_lang[PL_EDIT_LOCATION]#~<br /><br />Hier können Sie die Ortsdaten ändern oder löschen. Ein Klick auf 'bearbeiten' öffnet ein neues Bearbeitungsfenster für die geografischen Ortsdaten.<br />Ein Klick auf 'löschen' ist nur möglich, wenn keine anderen Orte unterhalb dieser Hierarchie definiert sind.";

$pgv_lang["PL_ADD_LOCATION"]            = "Ortsdaten hinzufügen";
$pgv_lang["PL_ADD_LOCATION_help"]       = "~#pgv_lang[PL_ADD_LOCATION]#~<br /><br />Hiermit können Sie einen Ort in die Ortetabelle eintragen. Der Ort wird auf der aktuellen Hierarchiestufe hinzugefügt!";

$pgv_lang["PL_IMPORT_GEDCOM"]           = "Geografische Ortsdaten aus GEDCOM importieren";
$pgv_lang["PL_IMPORT_GEDCOM_help"]      = "~#pgv_lang[PL_IMPORT_GEDCOM]#~<br /><br />Die aktuelle GEDCOM-Datei wird durchsucht und alle Orte werden in die Orte-Tabelle eingetragen. Soweit Breiten- und Längengrade vorhanden sind, werden diese auch importiert.";

$pgv_lang["PL_IMPORT_ALL_GEDCOM"]       = "Geografische Ortsdaten aus allen GEDCOM importieren";
$pgv_lang["PL_IMPORT_ALL_GEDCOM_help"]  = "~#pgv_lang[PL_IMPORT_ALL_GEDCOM]#~<br /><br />Alle GEDCOM-Dateien werden durchsucht und alle Orte werden in die Orte-Tabelle eingetragen. Soweit Breiten- und Längengrade vorhanden sind, werden diese auch importiert.";

$pgv_lang["PL_IMPORT_FILE"]             = "Geografische Ortsdaten aus Datei importieren";
$pgv_lang["PL_IMPORT_FILE_help"]        = "~#pgv_lang[PL_IMPORT_FILE]#~<br /><br />Die Datei muß als CSV-Datei lokal vorliegen. Als Trennzeichen wird ';' (Semikolon) erwartet.";

$pgv_lang["PL_EXPORT_FILE"]             = "Ortsdaten exportieren";
$pgv_lang["PL_EXPORT_FILE_help"]        = "~#pgv_lang[PL_EXPORT_FILE]#~<br /><br />Mit dieser Option werden die Ortsdaten der aktuelle Ansicht und aller iht nachgeordneten Hierarchiestufen in eine Datei exportiert. Wenn also z.B. Deutschland ausgewählt ist und alle Bundesländer sichtbar sind, werden die Ortsdaten aller Bundesländer, Kreise/Städte und Gemeinden exportiert.";

$pgv_lang["PL_EXPORT_ALL_FILE"]         = "Alle Ortsdaten exportieren";
$pgv_lang["PL_EXPORT_ALL_FILE_help"]    = "~#pgv_lang[PL_EXPORT_ALL_FILE]#~<br /><br />Mit dieser Option werden alle Ortsdaten exportiert und auf den PC heruntergeladen.";

// Help texts for places_edit.php
$pgv_lang["PLE_EDIT"]               	= "GoogleMaps Orte editieren";
$pgv_lang["PLE_EDIT_help"]              = "~#pgv_lang[PLE_EDIT]#~<br /><br />Hier erfassen, ändern oder löschen Sie die Orte für das Modul GoogleMaps.";

$pgv_lang["PLE_PLACES"]                 = "Ortsname";
$pgv_lang["PLE_PLACES_help"]            = "~#pgv_lang[PLE_PLACES]#~<br /><br />Hier kann der Ortsname eingetragen bzw. geändert werden.";

$pgv_lang["PLE_PRECISION"]              = "Genauigkeit";
$pgv_lang["PLE_PRECISION_help"]         = "~#pgv_lang[PLE_PRECISION]#~<br /><br />Hier wird die Detailtiefe (Genauigkeit) der Kartendarstellung eingetragen. Dieser Wert bestimmt die Anzahl der Nachkommastellen für die Längen- und Breitengrade.";

$pgv_lang["PLE_LATLON_CTRL"]            = "Breiten- / Längengrad";
$pgv_lang["PLE_LATLON_CTRL_help"]       = "~#pgv_lang[PLE_LATLON_CTRL]#~<br /><br />Hier können Breiten- und Längengrad eingetragen werden. Zuerst bitte den Bereich (N/S oder O/W) auswählen. Danach den Breiten- oder Längengrad als Dezimalwert eintragen. <br />Der Dezimalwert errechnet sich anhand folgender Formel:<br />Grad_dezimal = ((Sekunden / 60) + Minuten) / 60 + Grad.";

$pgv_lang["PLE_ZOOM"]                   = "Zoomstufe";
$pgv_lang["PLE_ZOOM_help"]              = "~#pgv_lang[PLE_ZOOM]#~<br /><br />Hier wird die Vergrößerungsstufe eingetragen. Der Wert stellt die kleinste Zoomstufe dieses Ortes auf der Karte dar.";

$pgv_lang["PLE_ICON"]                   = "Ikone";
$pgv_lang["PLE_ICON_help"]              = "~#pgv_lang[PLE_ICON]#~<br /><br />Hier können Sie eine Ikone bestimmen oder entfernen. Mit dem Link kann die Flagge bestimmt werden, die zu diesem Ort angezeigt werden soll.";

$pgv_lang["PLE_FLAGS"]                  = "Flaggen";
$pgv_lang["PLE_FLAGS_help"]             = "~#pgv_lang[PLE_FLAGS]#~<br /><br />Aus dieser Liste wählen Sie das Land aus, aus dessen Flaggen Sie eine auswählen wollen. Wenn keine Flaggen angezeigt werden, sind auch noch keine Flaggen für dieses Land hinterlegt.";

$pgv_lang["PLIF_FILENAME"]              = "Dateiname";
$pgv_lang["PLIF_FILENAME_help"]         = "~#pgv_lang[PLIF_FILENAM]#~<br /><br />Durchsuchen Sie Ihren lokalen Computer nach der Datei die Ortsdaten im CSV-Format enthält.";
$pgv_lang["PLIF_LOCALFILE_help"]        = "~#pgv_lang[PLIF_FILENAM]#~<br /><br />Wählen Sie aus der Liste der bereits auf dem Server bestehenden Dateien die Datei die Ortsdaten im CSV-Format enthält.";

$pgv_lang["PLIF_CLEAN"]                 = "Bereinigen der Ortsdaten DB";
$pgv_lang["PLIF_CLEAN_help"]            = "~#pgv_lang[PLIF_CLEAN]#~<br /><br />Mit dieser Option kann die Ortsdatenbank gelöscht werden. Nur die (zusätzliche) Tabelle mit den Ortsdateninformationen für die Kartendarstellung wird in der Datenbank gelöscht, Die GEDCOM Datei mit ihren Ortsdaten ist davon niocht berührt!";

$pgv_lang["PLIF_UPDATE"]                = "Aktualisieren vorhandener Datensätze";
$pgv_lang["PLIF_UPDATE_help"]           = "~#pgv_lang[PLIF_UPDATE]#~<br /><br />Mit dieser Option kann man selektiv nur die vorhandenen Datensätze aktualisieren. Das kann man zum Eintragen der Längen- und Breitengrade von Orten benutzen, die aus einer GEDCOM-Datei importiert wurden. Neue Orte werden nicht in die Datenbank eingefügt.";

$pgv_lang["PLIF_OVERWRITE"]             = "Überschreiben der Ortsdaten";
$pgv_lang["PLIF_OVERWRITE_help"]        = "~#pgv_lang[PLIF_OVERWRITE]#~<br /><br />Überschreibt die Ortsdaten in der Datenbank mit den Daten aus der Datei.<br />Diese Option überschreibt Ortsdaten in der DB (Längengrad, Breitengrad, Vergrößerungsstufe und Flagge) mit den Daten aus der Datei, soweit vorhanden. Ist ein Datensatz in der DB noch nicht vorhanden, wird er angelegt, es sei denn, die Option 'Aktualisieren vorhandener Datensätze' ist ausgewählt.";

$pgv_lang["PLE_ACTIVE"]             	= "Liste inaktiver Orte";
$pgv_lang["PLE_ACTIVE_help"]        	= "~#pgv_lang[PLE_ACTIVE]#~<br /><br />Normalerweise werden nur die Orte angezeigt, die <b>sowohl</b> in einer GEDCOM-Datei <b>als auch</b> in der Googlemap-Tabelle definiert sind.<br /><br />Wenn diese Option aktiviert ist und \"Anzeigen\" wird angeklickt, enthält die Liste ALLE Orte dieser Stufe.<br /><br />Diese Option wird benutzt, um die Anzeige großer, importierter Listen zu beschleunigen, bei denen noch nicht alle Orte verwendet werden.<br /><br />ACHTUNG - Mit dieser Option kann die Anzeige großer Listen unter Umständen mehrere Minuten dauern!";

// Help text for placecheck.php
$pgv_lang["GOOGLEMAP_PLACECHECK"] 		= "Ortsverzeichnisüberprüfung";
$pgv_lang["GOOGLEMAP_PLACECHECK_help"] 	= "~#pgv_lang[GOOGLEMAP_PLACECHECK]#~<br /><br /><strong>Dieses Werkzeug</strong> vergleicht die Ortseinträge in Ihrer GEDCOM Datei mit den Einträgen in der GoogleMaps Tabelle 'placelocations'.<br /><br /><strong> Die Anzeige</strong> gilt für eine GEDCOM Datei, einen bestimmten Staat in der Datei oder auch nur für ein bestimmtes Bundesland.<br /><br /><strong>Die Orte</strong> werden alphabetisch gelistet, sodaß auch kleine Schreibfehler auffallen und bequem korrigiert werden können..<br /><br /> <strong>Aus</strong> dem Ergebnis der Überprüfung heraus können Sie Ortsnamen durch Anklicken auswählen um<br /><br /> <strong>1. </strong>Orte aus der GEDCOM Datei im Ortsverzeichnis zu lokalisieren. Dort werden alle Datensätze angezeigt, die mit diesem Ort verknüpft sind. <br /><br /> <strong>2. </strong>Orte aus der GECOM Datei, welche noch <strong>nicht</strong> in der GoogleMaps Tabelle definiert sind (rotmarkiert), im GoogleMaps Dialog \"Ort hinzufügen\" anzuzeigen.<br /><br /><strong>3. </strong>Orte aus der GEDCOM Datei, welche <strong>auch</strong> in der GoogleMaps Tabelle (möglicherweise ohne Koordinaten) definiert sind, im Dialog \"Ort bearbeiten\" anzeigen. Hier kann jeder Aspekt des Ortes für die GoogleMaps Anzeige definiert werden.<br /><br /><strong>Überfahren</strong> einer GoogleMaps Tabellenspalte mit der Maus zeigt die Zoomstufe für den jeweiligen Eintrag an.";
$pgv_lang["PLACECHECK_FILTER"] 			= "Ortsüberprüfung - Optionen für die Anzeige";
$pgv_lang["PLACECHECK_FILTER_help"] 	= "~#pgv_lang[PLACECHECK_FILTER]#~<br /><br />Dieser Bereich enthält Optionen, um verschiedene Aspekte der dargestellten Orte zu begrenzen oder zu erweitern.<br /><br />Es ist angedacht, die Optionen zukünftig zu erweitern.";
$pgv_lang["PLACECHECK_MATCH"] 			= "vollständig definierte Orte mit einschließen";
$pgv_lang["PLACECHECK_MATCH_help"] 		= "~#pgv_lang[PLACECHECK_MATCH]#~<br /><br />Normalerweise zeigt die Liste keine Orte an, die bereits für jede Stufe vollständig definiert sind.<br /><br />Wählen Sie diese Option, um diese Orte trotzdem mit anzuzeigen";

//wooc Options for Place Hierarchy display
$pgv_lang["GOOGLEMAP_PH"] 				= "GoogleMaps im Ortsverzeichnis nutzen";
$pgv_lang["GOOGLEMAP_PH_help"] 			= "~#pgv_lang[GOOGLEMAP_PH]#~<br /><br />Mit dieser Option kann das Modul GoogleMaps für das Ortsverzeichnis ein- oder ausgeschaltet werden. Zur korrekten Verwendung muss das Modul Googlemap natürlich auch aktiviert sein! Vor dem Einsatz empfiehlt es sich, alle Orte in die GoogleMaps Tabelle zu laden.";
$pgv_lang["GOOGLEMAP_PH_MAP_SIZE"]		= "Größe der Verzeichniskarte (in Pixel)";
$pgv_lang["GOOGLEMAP_PH_MAP_SIZE_help"]	= "~#pgv_lang[GOOGLEMAP_MAP_SIZE]#~<br /><br />Die Größe der Karte (in Pixel) im Ortsverzeichnis.";
$pgv_lang["GOOGLEMAP_PH_MARKER"] 		= "Typ des Orte Markierers in den Ortslisten";
$pgv_lang["GOOGLEMAP_PH_MARKER_help"]	= "~#pgv_lang[GOOGLEMAP_PH_MARKER]#~<br /><br />Hier bestimmen Sie, welche Art Markierer verwendet werden soll (Standard oder Flagge). Wenn dem Ort keine Flagge zugeordnet ist, wird der Standard Markierer verwendet.";
$pgv_lang["GM_DISP_SHORT_PLACE"] 		= "Verkürzte Ortsnamen anzeigen?";
$pgv_lang["GM_DISP_SHORT_PLACE_help"]	= "~#pgv_lang[GM_DISP_SHORT_PLACE]#~<br /><br />Hier bestimmen Sie, wie die Orte angezeigt werden sollen. Bei Ja werden nur die Namen der aktuellen Stufe angezeigt, bei Nein werden alle Stufennamen angezeigt.";
$pgv_lang["GM_DISP_COUNT"]				= "Anzeigen der Personen- und Familienzähler";
$pgv_lang["GM_DISP_COUNT_help"]			= "~#pgv_lang[GM_DISP_COUNT]#~<br /><br />Hier bestimmen Sie, ob die Anzahl der Personen und Familien, die einem Ort zugeordnet sind, angezeigt werden. Bei einer sehr großen Anzahl von Datensätzen pro Ort empfihelt es sich, dies Option abzuschalten!";
$pgv_lang["GOOGLEMAP_PH_WHEEL"] 		= "Mausrad für den Zoom benutzen?";
$pgv_lang["GOOGLEMAP_PH_WHEEL_help"] 	= "~#pgv_lang[GOOGLEMAP_PH_WHEEL]#~<br /><br />Hier bestimmen Sie, ob das Mausrad für die Zoomfunktion benutzt werden soll.";
$pgv_lang["GOOGLEMAP_PH_CONTROLS"]		= "Kartenwerkzeuge verbergen";
$pgv_lang["GOOGLEMAP_PH_CONTROLS_help"]	= "~#pgv_lang[GOOGLEMAP_PH_CONTROLS]#~<br /><br />Hiermit legen Sie fest, ob beim Überfahren der Karte mit der Maus die Kartenwerkzeuge (z.B. ob Karte oder Gelände) angezeigt werden oder nicht.";

// Pedigree map
$pgv_lang["PEDIGREE_MAP_help1"]			= "Um die Karte zu nutzen";
$pgv_lang["PEDIGREE_MAP_help2"]			= "~#pgv_lang[root_person]#~<br /><br />Wählen Sie den <strong>Probanden</strong> aus, entweder über die direkte Eingabe des Namens oder der ID oder klicken Sie auf die <strong>ID Suchen</strong> Ikone.";
$pgv_lang["PEDIGREE_MAP_help3"]			= "~#pgv_lang[generations]#~<br /><br />Wählen Sie die Anzahl der Generationen aus. Achtung, ein noch akzeptabler Wert von 8 gibt bis zu 255 Personen aus!";
$pgv_lang["PEDIGREE_MAP_help4"]			= "Klicken auf eine Person in der Liste rechts oder auf einen Marker auf der Karte öffnet das Infofenster am Geburtsort.";
$pgv_lang["PEDIGREE_MAP_help5"]			= "Ein Klick auf den Namen im Infofenster lädt diese Person als neuen Proband in die Karte.";

$pgv_lang["PEDIGREE_MAP_clustersize"]		= "Gruppengöße";
$pgv_lang["PEDIGREE_MAP_clustersize_help"]	= "~#pgv_lang[PEDIGREE_MAP_clustersize]#~<br /><br />Die Anzahl der Marker pro Markierungspunkt, bevor hinter dem Marker in einer Reihe neue Pins für die jüngeren Generationen angelegt werden. Diese 'Reihen' sind normalerweise nur in hohen Zoomstufen sichtbar!";
$pgv_lang["PEDIGREE_MAP_hidelines"]			= "Verberge Linien";
$pgv_lang["PEDIGREE_MAP_hidelines_help"]	= "~#pgv_lang[PEDIGREE_MAP_hidelines]#~<br /><br />Verbergen der Verbindungslinien, welche die Beziehung zwischen einem Kind und seinen Eltern anzeigen.";
$pgv_lang["PEDIGREE_MAP_hideflags"]			= "Verberge Flaggen";
$pgv_lang["PEDIGREE_MAP_hideflags_help"]	= "~#pgv_lang[PEDIGREE_MAP_hideflags]#~<br /><br />Verbergen der im GoogleMaps Modul konfigurierten Flaggen für Staaten und Länder. &nbsp; Damit weist man daraufhin, daß es sich um Marker in einem allgemeinen Bereich handelt und nicht um ein speziellen Ort,";
$pgv_lang["PEDIGREE_MAP_help"]				= "~#pgv_lang[PEDIGREE_MAP_help1]#~<br /><br />#pgv_lang[PEDIGREE_MAP_help4]#<br />#pgv_lang[PEDIGREE_MAP_help5]#<br /><br />#pgv_lang[PEDIGREE_MAP_help2]#<br /><br />#pgv_lang[PEDIGREE_MAP_help3]#<br /><br />#pgv_lang[PEDIGREE_MAP_clustersize_help]#<br /><br />#pgv_lang[PEDIGREE_MAP_hidelines_help]#<br /><br />#pgv_lang[PEDIGREE_MAP_hideflags_help]#<br /><br />";

?>
