<?php
/**
 * Czech texts
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2016  PGV Development Team.  All rights reserved.
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
 *
 * @author PGV Developers
 * @package PhpGedView
 * @subpackage Languages
 * @version $Id: admin.cz.php 7144 2016-11-05 01:39:25Z canajun2eh $
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

$pgv_lang["analytics_config"]		= "Webová Analytika";
$pgv_lang["google_analytics"]		= "Google Analytika";
$pgv_lang["USE_GOOGLE_ANALYTICS"]	= "Aktivace Google Analytika?";
$pgv_lang["PGV_GOOGLE_ANALYTICS"]	= "Google Analytika císlo úctu";
$pgv_lang["piwik_analytics"]		= "Piwik Analytika";
$pgv_lang["USE_PIWIK_ANALYTICS"]	= "Aktivace Piwik Analytika?";
$pgv_lang["PGV_PIWIK_URL"]			= "Serveru Adresa Piwik Analytika";
$pgv_lang["PGV_PIWIK_SITE"]			= "Tato stránka je císlo v Piwik Analytika";
$pgv_lang["clustrmaps_analytics"]	= "ClustrMaps Analytika";
$pgv_lang["USE_CLUSTRMAPS_ANALYTICS"] = "Aktivace ClustrMaps Analytika?";
$pgv_lang["PGV_CLUSTRMAPS_SITE"] 	= "URL této PhpGedView stránce";
$pgv_lang["PGV_CLUSTRMAPS_SERVER"] 	= "Císlo ClustrMaps serveru";

$pgv_lang["module_admin"]			= "Správa Modulu";
$pgv_lang["mod_admin_installed"]	= "Instalované Moduly";
$pgv_lang["mod_admin_tabs"]			= "Správa Záložek";
$pgv_lang["mod_admin_menus"]		= "Správa Menus";
$pgv_lang["mod_admin_intro"]		= "Níže je seznam všech modulu nainstalovaných v daném prípade PhpGedView. Moduly jsou instalovány jejich umístením v <i>modules</i> adresáre. Zde si mužete nastavit úroven prístupu na GEDCOM pro každý modul. Pokud modul obsahuje karty pro jednotlivé stránky nebo menu pro seznam nabídky, mužete také nastavit úroven prístupu a poradí každého z nich.";
$pgv_lang["mod_admin_active"]		= "Cinný";
$pgv_lang["mod_admin_name"]			= "Název Modulu";
$pgv_lang["mod_admin_description"]	= "Popis";
$pgv_lang["mod_admin_version"]		= "Verze / PGV";
$pgv_lang["mod_admin_hastab"]		= "Záložce?";
$pgv_lang["mod_admin_hasmenu"]		= "Menu?";
$pgv_lang["mod_admin_access_level"]	= "Prístup Úroven";
$pgv_lang["mod_admin_order"]		= "Poradí";
$pgv_lang["mod_admin_config"]		= "Nastavení Modulu";
$pgv_lang["mod_admin_settings"]		= "Nastavení Konfigurace Modulu";
$pgv_lang["ret_module_admin"]		= "Návrat na stránce Modulu Správy";
$pgv_lang["ret_admin"]				= "Návrat na stránce Správa";

$pgv_lang["enter_comment"]	= "Mužete zadat komentár zde.";
$pgv_lang["upload_a_gedcom"] 		= "Nahrát soubor GEDCOM";
$pgv_lang["start_entering"] 		= "Zacnete zadávat údaje";
$pgv_lang["add_gedcom_from_path"] 	= "Pridat GEDCOM z umístení souboru";
$pgv_lang["get_started_instructions"]	= "Vyberte si jednu z následujících možností, abyste mohli zacít používat PhpGedView";

$pgv_lang["admin_users_exists"]		= "Následující správci již existují:";
$pgv_lang["install_step_1"] = "Zkontrolujte Prostredí";
$pgv_lang["install_step_2"] = "Pripojení k Databázi";
$pgv_lang["install_step_3"] = "Vytvorit Tabulky";
$pgv_lang["install_step_4"] = "Konfigurace Stránek";
$pgv_lang["install_step_5"] = "Jazyky";
$pgv_lang["install_step_6"] = "Uložit Konfiguraci";
$pgv_lang["install_step_7"] = "Vytvorit správce uživatele";
$pgv_lang["install_wizard"] = "Instalacní Asistent";
$pgv_lang["basic_site_config"] = "Základní Nastavení";
$pgv_lang["adv_site_config"] = "Pokrocilé Nastavení";
$pgv_lang["config_not_saved"] = "*Vaše nastavení se neuloží<br />dokud kroku 6";
$pgv_lang["download_config"] = "Stáhnete config.php";
$pgv_lang["site_unavailable"] = "Tato stránka je momentálne nedostupná";
$pgv_lang["to_manage_users"] = "Chcete-li spravovat uživatele, použijte <a href=\"useradmin.php\">Uživatele Správy</a> stránku.";
$pgv_lang["db_tables_created"] = "Databázové tabulky úspešne vytvoren";
$pgv_lang["config_saved"] = "Konfigurace byla úspešne uložena";
$pgv_lang["checking_errors"]		= "Kontrola chyb ...";
$pgv_lang["checking_php_version"]		= "Kontrola požadovanou verzi PHP:";
$pgv_lang["failed"]		= "Neúspešný";
$pgv_lang["pgv_requires_version"]		= "PhpGedView vyžaduje PHP verze #PGV_REQUIRED_PHP_VERSION# nebo vyšší.";
$pgv_lang["using_php_version"]		= "Nacházíte se pomocí PHP verze #PGV_ACTUAL_PHP_VERSION#";
$pgv_lang["checking_db_support"]		= "Kontrola minimální podporou databáze:";
$pgv_lang["no_db_extensions"]		= "Nemusíte mít žádnou z podporovaných typu databází.";
$pgv_lang["db_ext_support"]		= "Máte podporu pro #DBEXT#";
$pgv_lang["checking_config.php"]		= "Kontrola config.php:";
$pgv_lang["config.php_missing"]		= "config.php nebyl nalezen.";
$pgv_lang["config.php_missing_instr"]		= "Tento pruvodce instalací nebude moci napsat své nastavení do souboru config.php. Mužete vytvorit kopii souboru config.dist a prejmenujte jej na config.php. Strídave, po dokoncení tohoto pruvodce instalací budete mít možnost stáhnout nastavení a nahrát výsledný soubor config.php.";
$pgv_lang["config.php_not_writable"]		= "config.php není zapisovatelný.";
$pgv_lang["config.php_not_writable_instr"]		= "Tento pruvodce instalací nebudou moci napsat své nastavení souboru config.php. Mužete nastavit oprávnení k zápisu souboru, nebo po dokoncení tohoto pruvodce budete mít možnost stáhnout nastavení a nahrát výsledný soubor config.php.";
$pgv_lang["passed"]		= "Prošel";
$pgv_lang["config.php_writable"]		= "config.php je prítomen a zapisovat.";
$pgv_lang["checking_warnings"]		= "Kontrola varování ...";
$pgv_lang["checking_timelimit"]		= "Kontrola schopnost menit lhuta:";
$pgv_lang["cannot_change_timelimit"]		= "Nelze zmenit lhuta.";
$pgv_lang["cannot_change_timelimit_instr"]		= "Ty nemusí být schopen spustit všechny funkce na velkých databázích s mnoha jednotlivcu.";
$pgv_lang["current_max_timelimit"]		= "Váš maximální lhuta je";
$pgv_lang["check_memlimit"]		= "Kontrola schopnost menit limit pameti:";
$pgv_lang["cannot_change_memlimit"]		= "Nelze zmenit limit pameti.";
$pgv_lang["cannot_change_memlimit_instr"]		= "Ty nemusí být schopen spustit všechny funkce na velkých databázích s mnoha jednotlivcu.";
$pgv_lang["current_max_memlimit"]		= "Vaše aktuální limit pameti je";
$pgv_lang["check_upload"]		= "Kontrola možností nahrávání souboru:";
$pgv_lang["current_max_upload"]		= "Vaše maximální nahrávání velikost souboru je:";
$pgv_lang["check_gd"]		= "Kontrola GD knihovny:";
$pgv_lang["cannot_use_gd"]		= "Nemusíte mít knihovnu GD. Nebudete moci automaticky vytváret miniatury obrazu.";
$pgv_lang["check_sax"]		= "Kontrola SAX XML knihovny:";
$pgv_lang["cannot_use_sax"]		= "Nemáte na SAX XML knihovnu. Nebudete moci spustit žádné zprávy nebo nejaké jiné pomocné funkce.";
$pgv_lang["check_dom"]		= "Kontrola DOM XML knihovnu:";
$pgv_lang["cannot_use_dom"]		= "Nemusíte mít knihovnu DOM XML. Nebudete moci exportovat XML.";
$pgv_lang["check_calendar"]		= "Kontrola Pokrocilé Kalendár knihovny:";
$pgv_lang["cannot_use_calendar"]		= "Nemáte pokrocilé kalendáre podporu. Nebudete moci spustit nekteré pokrocilé funkce kalendáre.";
$pgv_lang["warnings_passed"]		= "Všechny varovné kontroly prošel.";
$pgv_lang["warning_instr"]		= "Pokud se kterýkoli z varování neprojdou mužete být stále schopen bežet PhpGedView na tomto serveru, ale nekteré funkce muže být zakázána, nebo mužete zaznamenat snížení výkonu.";

$pgv_lang["associated_files"]		= "Související soubory:";
$pgv_lang["remove_all_files"]		= "Odstrante všechny jiné než podstatné soubory";
$pgv_lang["warn_file_delete"]		= "Tento soubor obsahuje duležité informace, jako jsou jazykové nastavení nebo probíhajících zmen údaju. Jste si jisti, že chcete smazat tento soubor?";
$pgv_lang["deleted_files"]          = "Smazané soubory:";
$pgv_lang["index_dir_cleanup_inst"]	= "Chcete-li odstranit soubor nebo podadresár z indexového seznamu pretáhnete ji do koše, nebo zvolte svuj polícko. Klepnete na tlacítko Odstranit na trvalé odstranení oznacené soubory.<br /><br />Soubory oznacené <img src=\"./images/RESN_confidential.gif\" alt=\"\" /> jsou nezbytné pro správné fungování a nemuže být odstranen.<br />Soubory oznacené <img src=\"./images/RESN_locked.gif\" alt=\"\" /> mají duležité nastavení nebo nevyrízené zmeny údaju a mely by být odstraneny, pokud jste si jisti, že víte, co deláte.<br /><br />";
$pgv_lang["index_dir_cleanup"]		= "Vycištení Index adresár";
$pgv_lang["clear_cache_succes"]		= "Tyto soubory mezipameti byly odstraneny.";
$pgv_lang["clear_cache"]			= "Vymazat soubory mezipameti";
$pgv_lang["sanity_err0"]			= "Chyby:";
$pgv_lang["sanity_err1"]			= "Musíte mít PHP verze #PGV_REQUIRED_PHP_VERSION# nebo vyšší.";
$pgv_lang["sanity_err2"]			= "Soubor nebo adresár <i>#GLOBALS[whichFile]#</i> neexistuje. Overte si prosím, že soubor nebo adresár existuje, nebyl mis-pojmenovaný, a oprávnení ke ctení jsou nastaveny správne.";
$pgv_lang["sanity_err3"]			= "Soubor <i>#GLOBALS[whichFile]#</i> zatím nenahrál správne. Prosím, zkuste soubor nahrát znovu.";
$pgv_lang["sanity_err4"]			= "Soubor <i>config.php</i> je poškozen.";
$pgv_lang["sanity_err5"]			= "Soubor <i>config.php</i> není zapisovatelný.";
$pgv_lang["sanity_err6"]			= "Adresár <i>#GLOBALS[INDEX_DIRECTORY]#</i> není zapisovatelný.";
$pgv_lang["sanity_warn0"]			= "Varování:";
$pgv_lang["sanity_warn1"]			= "<i>#GLOBALS[MEDIA_DIRECTORY]#</i> adresár není zapisovatelný. Nebudete moci nahrát multimediální soubory nebo vytváret náhledy v PhpGedView.";
$pgv_lang["sanity_warn2"]			= "<i>#GLOBALS[MEDIA_DIRECTORY]#thumbs</i> adresár není zapisovatelný. Nebudete moci nahrát miniatur nebo generovat náhledy v PhpGedView.";
$pgv_lang["sanity_warn3"]			= "Knihovna GD neexistuje. PhpGedView bude i nadále fungovat, ale nekteré z funkcí, jako je napríklad náhledy generace a kruhu diagram, nebude fungovat bez knihovny GD. Podívejte se prosím <a href='http://www.php.net/manual/en/ref.image.php'>http://www.php.net/manual/en/ref.image.php</a pro více informací.";
$pgv_lang["sanity_warn4"]			= "Knihovna XML neexistuje. PhpGedView bude i nadále fungovat, ale nekteré z funkcí, jako je generování sestav a webových služeb, nebude fungovat bez knihovny XML. Podívejte se prosím <a href='http://www.php.net/manual/en/ref.xml.php'>http://www.php.net/manual/en/ref.xml.php</a> pro více informací.";
$pgv_lang["sanity_warn5"]			= "Knihovna DOM XML neexistuje. PhpGedView bude i nadále fungovat, ale nekteré z funkcí, jako je Export funkcí gramps v výstrižku, stahovat a webových služeb, nebude fungovat. Podívejte se prosím <a href='http://www.php.net/manual/en/ref.domxml.php'>http://www.php.net/manual/en/ref.domxml.php</a> pro více informací.";
$pgv_lang["sanity_warn6"]			= "Knihovna Kalendár neexistuje. PhpGedView bude i nadále fungovat, ale nekteré z funkcí, jako je konverze na jiných kalendárích, jako napr. hebrejština nebo ve francouzštine, nebude fungovat. Je to nezbytné pro beh PhpGedView. Podívejte se prosím <a href='http://www.php.net/manual/en/ref.calendar.php'>http://www.php.net/manual/en/ref.calendar.php</a> pro více informací.";
$pgv_lang["ip_address"]				= "IP adresa";
$pgv_lang["date_time"]				= "Datum a cas";
$pgv_lang["log_message"]			= "Zpráva Protokolu";
$pgv_lang["searchtype"]				= "Typ hledání";
$pgv_lang["query"]					= "Dotaz";
$pgv_lang["user"]					= "Overený uživatel";
$pgv_lang["editors"]				= "Editoru";
$pgv_lang["gedcom_admins"]			= "Správci GEDCOM";
$pgv_lang["site_admins"]			= "Správci Webu";
$pgv_lang["nobody"]					= "Nikdo";
$pgv_lang["thumbnail_deleted"]		= "Miniatury soubor úspešne odstranen.";
$pgv_lang["thumbnail_not_deleted"]	= "Miniatury soubor nelze odstranit.";
$pgv_lang["step2"]				= "Krok 2 z 4:";
$pgv_lang["refresh"]				= "Obnovit";
$pgv_lang["move_file_success"]		= "Média a miniatury souboru úspešne presunuty.";
$pgv_lang["media_folder_corrupt"]	= "Adresár médií je poškozen.";
$pgv_lang["media_file_not_deleted"]	= "Soubor média nemohl být odstranen.";
$pgv_lang["gedcom_deleted"]		= "GEDCOM soubor [#GED#] byl úspešne smazán.";
$pgv_lang["gedadmin"]				= "Správce GEDCOM";
$pgv_lang["full_name"]			= "Celé jméno";
$pgv_lang["error_header"] 		= "Soubor GEDCOM, [#GEDCOM#], není na zadaném míste.";
$pgv_lang["confirm_delete_file"]	= "Jste si jisti, že chcete smazat tento soubor?";
$pgv_lang["confirm_folder_delete"] = "Jste si jisti, že chcete smazat tento adresár?";
$pgv_lang["confirm_remove_links"]	= "Jste si jisti, že chcete odstranit všechna pripojení k tomuto objektu?";
$pgv_lang["PRIV_PUBLIC"]			= "Zobrazit verejne";
$pgv_lang["PRIV_USER"]				= "Zobrazit jen autentifikovaným uživatelum";
$pgv_lang["PRIV_NONE"]				= "Ukázat jen administrátorum";
$pgv_lang["PRIV_HIDE"]				= "Skrýt i administrátorum";
$pgv_lang["manage_gedcoms"]		= "Správa GEDCOM souboru a úprava privátnosti";
$pgv_lang["keep_media"]				= "Mejte mediální pripojení";
$pgv_lang["current_links"]			= "Pripojení";
$pgv_lang["add_more_links"]			= "Pridat pripojení";
$pgv_lang["enter_pid_or_name"]		= "Zadejte individuální ID nebo název";
$pgv_lang["set_links"]				= "Nastavit pripojení";
$pgv_lang["add_or_remove_links"]	= "Správa pripojení";

$pgv_lang["keep"]					= "Udržovat";
$pgv_lang["unlink"]					= "Rozpojit";
$pgv_lang["nav"]					= "Navigátor";
$pgv_lang["fam_nav"]				= "Navigátor Rodina";
$pgv_lang["remove"]					= "Odstranit";
$pgv_lang["keep_link"]				= "Uchovávejte pripojení v seznamu";
$pgv_lang["remove_link"]			= "Odebrat pripojení ze seznamu";
$pgv_lang["open_nav"]				= "Otevrená Navigátor Rodiny";
$pgv_lang["link_exists"]			= "Toto pripojení již existuje";
$pgv_lang["id_not_valid"]			= "Není platný Osoba, Rodina nebo Zdroj ID";
$pgv_lang["add_fam_other_links"]	= "Pridejte Rodina, a Hledání spojení";
$pgv_lang["search_add_links"]		= "Hledat osob se pridat k Pridat Pripojení seznamu.";
$pgv_lang["enter_name"]				= "Zadejte název";
$pgv_lang["add_indi_to_link_list"]	= "Kliknete název pridat tuto osobu Pridat Pripojení seznamu.";
$pgv_lang["click_choose_head"]		= "Kliknete #GLOBALS[tempStringHead]# zvolte osobu jako hlava rodiny.";
$pgv_lang["click_choose_head_text"]	= "Kliknete zvolte osobu jako hlava rodiny.";
$pgv_lang["head"]					= "Hlava";
$pgv_lang["id_empty"]				= "Pri pridávání spojení, muže ID pole nesmí být prázdné.";
$pgv_lang["link_deleted"]			= "Pripojení k #GLOBALS[remLinkId]# vypouští";
$pgv_lang["link_added"]				= "Pripojení k #GLOBALS[addLinkId]# pridané";
$pgv_lang["no_update_CHANs"]		= "Nenechte si aktualizovat CHAN (Poslední Zmena) záznamy";
$pgv_lang["no_CHANs_update"]		= "Ne CHAN (Poslední Zmena) záznamy byly aktualizovány";

$pgv_lang["files_in_backup"]		= "Soubory zahrnuté v této zálohování";
$pgv_lang["created_remotelinks"]	= "Tabulka <i>Remotelinks</i> (vzdálené pripojení) byla úspešne vytvorena.";
$pgv_lang["created_remotelinks_fail"] 	= "Není možné vytvorit tabulku <i>Remotelinks</i> (vzdálené pripojení).";
$pgv_lang["created_indis"]			= "Tabulka <i>Individuals</i> (osoby) byla úspešne vytvorena.";
$pgv_lang["created_indis_fail"]	= "Není možné vytvorit tabulku <i>Individuals</i> (osoby).";
$pgv_lang["created_fams"]			= "Tabulka <i>Families</i> (rodiny) byla úspešne vytvorena.";
$pgv_lang["created_fams_fail"]	= "Není možné vytvorit tabulku <i>Families</i> (rodiny).";
$pgv_lang["created_sources"]		= "Tabulka <i>Sources</i> (zdroje) byla úspešne vytvorena.";
$pgv_lang["created_sources_fail"]	= "Není možné vytvorit tabulku <i>Sources</i> (zdroje).";
$pgv_lang["created_other"]			= "Tabulka <i>Other</i> (ostatní) byla úspešne vytvorena.";
$pgv_lang["created_other_fail"]	= "Není možné vytvorit tabulku <i>Other</i> (ostatní).";
$pgv_lang["created_places"]			= "Tabulka <i>Places</i> (místa) byla úspešne vytvorena.";
$pgv_lang["created_places_fail"]	= "Není možné vytvorit tabulku <i>Places</i> (místa).";
$pgv_lang["created_placelinks"] 	= "Tabulka <i>Place links</i> (místo pripojení) byla úspešne vytvorena.";
$pgv_lang["created_placelinks_fail"]	= "Není možné vytvorit tabulku <i>Place links</i> (místo pripojení).";
$pgv_lang["created_media_fail"]	= "Není možné vytvorit tabulku <i>Media</i> (média).";
$pgv_lang["created_media_mapping_fail"]	= "Není možné vytvorit tabulku <i>Media mappings</i> (mediální pripojení).";
$pgv_lang["no_thumb_dir"]			= "Thumbnail adresár pro miniatury neexistuje a nemohl být vytvoren.";
$pgv_lang["folder_created"]		= "Vytvorena složka";
$pgv_lang["folder_no_create"]		= "Složka nemohla být vytvorena";
$pgv_lang["security_no_create"]		= "Upozornení zabezpecení: Nelze vytvorit soubor <b><i>index.php</i></b> ve složce ";
$pgv_lang["security_not_exist"]		= "Upozornení zabezpecení: Soubor <b><i>index.php</i></b> neexistuje ve složce ";
$pgv_lang["label_delete"]           	= "Vymazat";
$pgv_lang["progress_bars_info"]			= "Stavové lišty pod dáme vám vedet, jak import pokracuje. Pokud lhuta vyprší Dovoz se zastaví a budete vyzváni ke stisknutí <b>Pokracovat</b>. Pokud nevidíte <b>Pokracovat</b>, musíte restartovat importem s menším casovém limitu.";
$pgv_lang["upload_replacement"]			= "Nahrát Výmena";
$pgv_lang["about_user"]			= "Nejprve musíte vytvorit administrátorský úcet.  Administrátor bude mít práva aktualizovat konfiguracní soubory, prohlížet si soukromá data a vytváret další úcty.";
$pgv_lang["access"]				= "Prístup";
$pgv_lang["add_gedcom"]			= "Pridat další GEDCOM";
$pgv_lang["add_new_gedcom"]		= "Vytvorit nový GEDCOM";
$pgv_lang["add_new_language"]		= "Pridat soubory a nastavení nového jazyka";
$pgv_lang["add_user"]			= "Pridat nového uživatele";
$pgv_lang["admin_gedcom"]			= "Spravovat GEDCOM";
$pgv_lang["admin_gedcoms"]		= "Kliknete zde spravovat soubory GEDCOM";
$pgv_lang["admin_geds"]					= "Správa dat a GEDCOM";
$pgv_lang["admin_info"]					= "Informacní";
$pgv_lang["admin_site"]					= "Správa webu";
$pgv_lang["admin_user_warnings"]		= "Jeden nebo více uživatelských úctu upozornení";
$pgv_lang["admin_verification_waiting"] = "Uživatelské úcty vyžadující overení adminem";
$pgv_lang["administration"]		= "Správa";
$pgv_lang["ALLOW_CHANGE_GEDCOM"]	= "Povolit prepínání mezi GEDCOM soubory";
$pgv_lang["ALLOW_USER_THEMES"]		= "Umožnit uživatelum vybrat si vlastní motiv";
$pgv_lang["ansi_encoding_detected"]	= "Rozpoznáno kódování ANSI.  PhpGedView pracuje nejlépe se soubory s kódováním UTF-8.";
$pgv_lang["ansi_to_utf8"]		= "Prevést kódování v tomto GEDCOM souboru z ANSI (ISO-8859-1) na UTF-8?";
$pgv_lang["apply_privacy"]				= "Použít nastavení ochrany osobních údaju?";
$pgv_lang["back_useradmin"]				= "Návrat na Správu Uživatelu";
$pgv_lang["bytes_read"]				= "Nactené bajty:";
$pgv_lang["can_admin"]			= "Uživatel muže administrovat";
$pgv_lang["can_edit"]			= "Úroven prístupových práv";
$pgv_lang["change_id"]			= "Zmenit ID osob na:";
$pgv_lang["choose_priv"]				= "Vyberte míru soukromí:";
$pgv_lang["cleanup_places"]		= "Vycištení míst";
$pgv_lang["cleanup_users"]				= "Vycistit uživatele";
$pgv_lang["click_here_to_continue"]	= "Pro pokracování kliknete sem.";
$pgv_lang["click_here_to_go_to_pedigree_tree"]	= "Kliknete sem pro vstup do rodokmenu.";
$pgv_lang["comment"]							= "Administrátora komentáre uživatele";
$pgv_lang["comment_exp"]						= "Administrátora varování k datu";
$pgv_lang["config_help"]		= "Nápoveda konfigurace";
$pgv_lang["config_still_writable"]	= "Do vašeho souboru config.php je ješte možné zapisovat. Pokud jste již dokoncili nastavování svých stránek, meli byste kvuli bezpecnosti zmenit práva k tomuto souboru zpet na možnost 'jen pro ctení'.";
$pgv_lang["configuration"]		= "Konfigurace";
$pgv_lang["configure"]			= "Konfigurace PhpGedView";
$pgv_lang["configure_head"]		= "Nastavení PhpGedView";
$pgv_lang["confirm_gedcom_delete"]	= "Opravdu chcete smazat tento GEDCOM";
$pgv_lang["confirm_user_delete"]	= "Jste si jistí, že chcete smazat uživatele";
$pgv_lang["create_user"]		= "Vytvorit uživatele";
$pgv_lang["current_users"]		= "Seznam všech uživatelu";
$pgv_lang["daily"]			= "Denne";
$pgv_lang["dataset_exists"]			= "GEDCOM soubor s tímto názvem byl již do databáze importován.";
$pgv_lang["unsync_warning"] 					= "Tento soubor GEDCOM je <em>není</em> synchronizovány s databází. To nemusí obsahovat nejnovejší verzi vašich dat. Chcete-li znovu importovat z databáze, spíše než soubor, meli byste si stáhnout a znovu nahrát.";
$pgv_lang["date_registered"]	= "Datum zapsáno";
$pgv_lang["day_before_month"]		= "Den pred mesícem (DD MM YYYY)";
$pgv_lang["DEFAULT_GEDCOM"]		= "Implicitní GEDCOM";
$pgv_lang["default_user"]		= "Vytvorit implicitního administrátora.";
$pgv_lang["del_gedrights"]						= "GEDCOM již není aktivní, odebrat uživatelské odkazy.";
$pgv_lang["del_proceed"]						= "Pokracovat";
$pgv_lang["del_unvera"]							= "Uživatel není overen správcem.";
$pgv_lang["del_unveru"]							= "Uživatel se nepodarilo overit behem 7 dnu.";
$pgv_lang["do_not_change"]		= "Nemenit";
$pgv_lang["download_gedcom"]		= "Stáhnout GEDCOM";
$pgv_lang["download_here"]	= "Kliknete sem pro stažení.";
$pgv_lang["download_note"]		= "POZNÁMKA: Velké databáze muže trvat dlouhou dobu procesu pred stažením. Pokud krát PHP pred skoncení stahování, muže stažený soubor nemusí být kompletní.<br /><br />Ujistete se, že soubor byl stažen správne, zkontrolujte, zda se poslední rádek souboru ve formátu GEDCOM je <b>0&nbsp;TRLR</b> nebo že poslední rádek souboru ve formátu XML, je <b>&lt;/database&gt;</b>. Tyto soubory jsou textové, mužete použít libovolný vhodný textový editor, ale ujistete se, že <u>není</u> uložit stažený soubor poté, co jste ho zkontrolovat.<br /><br />Obecne platí, že by to mohlo trvat tolik casu ke stažení jako trvalo importovat puvodní soubor GEDCOM.";
$pgv_lang["editaccount"]			= "Umožnit tomuto uživateli upravovat informace o svém úctu";
$pgv_lang["empty_dataset"]			= "Chcete vymazat stará data a nahradit je novými?";
$pgv_lang["empty_lines_detected"]	= "Ve vašem GEDCOM souboru byly nalezeny prázdné rádky. Pri cištení budou tyto rádky odstraneny.";
$pgv_lang["enable_disable_lang"]				= "Konfigurace podporovaných jazyku";
$pgv_lang["error_ban_server"]					= "Neplatná IP adresa.";
$pgv_lang["error_delete_person"]				= "Musíte vybrat osobu, jejíž vzdálené pripojení, které chcete smazat.";
$pgv_lang["error_header_write"]	= "Do souboru GEDCOM <b>#GEDCOM#</b> nelze zapisovat. Zkontrolujte vlastnosti a prístupová práva souboru.";
$pgv_lang["error_remove_site"]					= "Vzdálený server nemohl být odstranen.";
$pgv_lang["error_remove_site_linked"]			= "Vzdálený server nelze odstranit, protože jeho pripojení seznam není prázdný.";
$pgv_lang["error_remote_duplicate"]				= "Tato vzdálená databáze je již v seznamu jako <i>#GLOBALS[whichFile]#</i>";
$pgv_lang["error_siteauth_failed"]				= "Nepodarilo se overit na vzdálené strane";
$pgv_lang["error_url_blank"]					= "Prosím, nenechávejte dálkové stránky titul nebo URL prázdné";
$pgv_lang["error_view_info"]					= "Musíte vybrat osobu, jejíž údaje chcete zobrazit.";
$pgv_lang["example_date"]		= "Ukázka neplatného datového formátu z vašeho souboru GEDCOM:";
$pgv_lang["example_place"]						= "Príklad nesprávném míste z vašeho souboru GEDCOM:";
$pgv_lang["fbsql"]			= "FrontBase";
$pgv_lang["found_record"]			= "Nalezen záznam";
$pgv_lang["ged_download"]		= "Stáhnout";
$pgv_lang["ged_import"]			= "Importovat";
$pgv_lang["ged_export"]							= "Vyvážet";
$pgv_lang["ged_check"]							= "Overit";
$pgv_lang["gedcom_adm_head"]	= "Správa GEDCOMu";
$pgv_lang["gedcom_config_write_error"]	= "C h y b a !!! Nelze zapisovat do souboru <i>#GLOBALS[whichFile]#</i>. Zkontrolujte prosím, zda je pro správné oprávnení pro zápis.";
$pgv_lang["gedcom_downloadable"] 	= "Tento souboru GEDCOM muže být stažen po internetu!<br />Prosím prectete si odstavec o BEZPECNOSTI v souboru <a href=\"readme.txt\">readme.txt</a> a zjednejte nápravu";
$pgv_lang["gedcom_file"]		= "Soubor GEDCOM:";
$pgv_lang["gedcom_not_imported"]	= "Tento souboru GEDCOM ješte nebyl importován.";
$pgv_lang["ibase"]			= "InterBase";
$pgv_lang["ifx"]			= "Informix";
$pgv_lang["img_admin_settings"]		= "Upravit nastavení nakládání s obrázky";
$pgv_lang["autoContinue"]						= "Automaticky stisknete «Pokracovat» tlacítko";
$pgv_lang["import_complete"]			= "Importování je hotovo";
$pgv_lang["import_options"]						= "Možnosti o dovozu";
$pgv_lang["import_progress"]	= "Prubeh dovozu...";
$pgv_lang["import_statistics"]					= "Statistiky dovozu";
$pgv_lang["import_time_exceeded"]				= "Lhuta bylo dosaženo. Klepnete na tlacítko Pokracovat níže obnovení importu souboru GEDCOM.";
$pgv_lang["inc_languages"]		= " Jazyky";
$pgv_lang["INDEX_DIRECTORY"]		= "Adresár Index souboru";
$pgv_lang["invalid_dates"]		= "Rozpoznány nesprávné datové formáty, vycištením budou tyto formáty zmeneny do podoby DD MMM YYYY (napr. 1 JAN 2004).";
$pgv_lang["BOM_detected"]						= "Znacka poradí bajtu (BOM) byla zjištena na zacátku souboru. Na vycištení, bude tento speciální kód být odstraneny.";
$pgv_lang["invalid_header"]		= "Znacka poradí bajtu (BOM) byla zjištena na zacátku souboru. Na vycistit, bude tento speciální kód odstranit.";
$pgv_lang["label_added_servers"]				= "Vzdálené Serveru";
$pgv_lang["label_banned_servers"]				= "Zakazují stránky podle IP";
$pgv_lang["label_families"]						= "Rodiny";
$pgv_lang["label_gedcom_id2"]					= "Databáze ID:";
$pgv_lang["label_individuals"]					= "Osoby";
$pgv_lang["label_manual_search_engines"]		= "Rucne oznacit vyhledávace podle IP";
$pgv_lang["label_new_server"]					= "Pridat nové stránky";
$pgv_lang["label_password_id"]					= "Heslo";
$pgv_lang["label_server_info"]					= "Všech osoby a rodiny, kterí jsou dálkove spojeny prostrednictvím webu:";
$pgv_lang["label_server_url"]					= "URL / IP stránce";
$pgv_lang["label_username_id"]					= "Uživatelské jméno";
$pgv_lang["label_view_local"]					= "Zobrazit místní informace o osobe";
$pgv_lang["label_view_remote"]					= "Zobrazit vzdálené informace o osobe";
$pgv_lang["LANG_SELECTION"] 					= "Podporované jazyky";
$pgv_lang["LANGUAGE_DEFAULT"]					= "Nemáte-li nakonfigurován jazyky se vaše stránky budou podporovat.<br />PhpGedView bude používat své výchozí akce.";
$pgv_lang["last_login"]			= "Naposledy prihlášen";
$pgv_lang["lasttab"]							= "Poslední prohlížené karta pro osobu";
$pgv_lang["leave_blank"]		= "Pokud chcete zachovat stávající heslo, nechte polícko pro heslo prázdné.";
$pgv_lang["link_manage_servers"]				= "Spravovat Weby";
$pgv_lang["logfile_content"]	= "Obsah zápis souboru";
$pgv_lang["macfile_detected"]	= "Byl nalezen soubor pro Macintosh. Pri cištení bude tento soubor preveden na soubor pro DOS.";
$pgv_lang["mailto"]			= "E-mail";
$pgv_lang["merge_records"]			= "Sloucit záznamy";
$pgv_lang["message_to_all"]						= "Poslat zprávu všem uživatelum";
$pgv_lang["messaging"]			= "Vnitrní zprávy PhpGedView";
$pgv_lang["messaging2"]			= "Vnitrní zprávy s e-maily";
$pgv_lang["messaging3"]			= "E-mail";
$pgv_lang["month_before_day"]		= "Mesíc pred dnem (MM DD YYYY)";
$pgv_lang["monthly"]			= "Mesícne";
$pgv_lang["msql"]			= "Mini SQL";
$pgv_lang["mssql"]			= "Microsoft SQL Server";
$pgv_lang["mysql"]			= "MySQL";
$pgv_lang["never"]					= "Nikdy";
$pgv_lang["no_logs"]			= "Vypnout";
$pgv_lang["no_messaging"]		= "Není možné kontaktovat";
$pgv_lang["oci8"]			= "Oracle 7+";
$pgv_lang["page_views"]							= "&nbsp;&nbsp;zobrazení stránek za&nbsp;&nbsp;";
$pgv_lang["performing_validation"]	= "Provádení validace (zkontrolování) GEDCOMu, vyberte potrebné možnosti a kliknete na 'Pokracovat'";
$pgv_lang["pgsql"]			= "PostgreSQL";
$pgv_lang["pgv_config_write_error"] 		= "Chyba!!! Není možné zapisovat do konfiguracního souboru PhpGedView. Prosím, prekontrolujte prístupová práva k souboru a složce a zkuste to znovu.";
$pgv_lang["PGV_MEMORY_LIMIT"]		= "Maximální velikost pameti";
$pgv_lang["PGV_SESSION_SAVE_PATH"]	= "Cesta pro ukládání session";
$pgv_lang["PGV_SESSION_TIME"]		= "Vypršení platnosti session";
$pgv_lang["PGV_SIMPLE_MAIL"] = "V externích e-mailech používat jednoduché e-mailové hlavicky";
$pgv_lang["PGV_SMTP_ACTIVE"]					= "Pomocí SMTP odesílat externí e-maily";
$pgv_lang["PGV_SMTP_HOST"]						= "Odchozí server (SMTP) název";
$pgv_lang["PGV_SMTP_HELO"]						= "Odeslání název domény";
$pgv_lang["PGV_SMTP_PORT"]						= "SMTP Port";
$pgv_lang["PGV_SMTP_AUTH"]						= "Použít jméno a heslo";
$pgv_lang["PGV_SMTP_AUTH_USER"]					= "Uživatelské jméno";
$pgv_lang["PGV_SMTP_AUTH_PASS"]					= "Heslo";
$pgv_lang["PGV_SMTP_SSL"]						= "Zabezpecené pripojení";
$pgv_lang["PGV_SMTP_FROM_NAME"] 				= "Jméno odesílatele";
$pgv_lang["PGV_STORE_MESSAGES"]		= "Umožnit online ukládání zpráv:";
$pgv_lang["phpinfo"]							= "PHP Informace";
$pgv_lang["place_cleanup_detected"]	= "Neplatné místo kódování byly zjišteny. Tyto chyby by mely být opraveny.";
$pgv_lang["please_be_patient"]			= "Prosím o strpení";
$pgv_lang["privileges"]			= "Práva";
$pgv_lang["reading_file"]			= "Ctení souboru GEDCOM";
$pgv_lang["readme_documentation"]	= "README dokumentace";
$pgv_lang["remove_ip"]							= "Odstrante IP";
$pgv_lang["REQUIRE_ADMIN_AUTH_REGISTRATION"]	= "Požadovat správce schválit nové uživatelské registrací";
$pgv_lang["review_readme"]	= "Dríve, než budete pokracovat v konfiguraci PhpGedView, meli byste si procíst soubor <a href=\"readme.txt\" target=\"_blank\">readme.txt</a>.<br /><br />";
$pgv_lang["seconds"]							= "&nbsp;&nbsp;sekund";
$pgv_lang["select_an_option"]		= "Vyberte jednu z možností:";
$pgv_lang["SERVER_URL"]			= "URL PhpGedView";
$pgv_lang["show_phpinfo"]		= "Ukázat stránku PHPInfo";
$pgv_lang["siteadmin"]							= "Správce webu";
$pgv_lang["sqlite"]			= "SQLite";
$pgv_lang["sybase"]			= "Sybase";
$pgv_lang["sync_gedcom"]						= "Synchronizace uživatelských nastavení s daty GEDCOM";
$pgv_lang["system_time"]		= "Aktuální systémový cas:";
$pgv_lang["user_time"]							= "Aktuální Uživatel Cas:";
$pgv_lang["TBLPREFIX"]			= "Prefix pred názvy tabulek v databázi";
$pgv_lang["themecustomization"]					= "Prizpusobení Motivu";
$pgv_lang["time_limit"]							= "Casový limit:";
$pgv_lang["title_manage_servers"]				= "Spravovat Weby";
$pgv_lang["title_view_conns"]					= "Zobrazit Pripojení";
$pgv_lang["translator_tools"]					= "Prekladatel nástroje";
$pgv_lang["update_myaccount"]		= "Aktualizovat muj úcet";
$pgv_lang["update_user"]		= "Aktualizovat uživatelský úcet";
$pgv_lang["upload_gedcom"]		= "Nahrát GEDCOM";
$pgv_lang["USE_REGISTRATION_MODULE"]	= "Umožnit uživatelum požadovat registraci úctu";
$pgv_lang["user_auto_accept"]					= "Automaticky prijímat zmeny provedené tímto uživatelem";
$pgv_lang["user_contact_method"]	= "Uprednostnovaný zpusob kontaktu";
$pgv_lang["user_create_error"]		= "Není možné pridat uživatele. Prosím vratte se zpet a zkuste to znovu.";
$pgv_lang["user_created"]		= " Uživatel byl úspešne vytvoren.";
$pgv_lang["user_default_tab"]					= "Výchozí karta pro zobrazení na strane osoby informace";
$pgv_lang["user_path_length"]					= "Maximální délka dráhy vztahu soukromí";
$pgv_lang["user_relationship_priv"]				= "Omezit prístup k príbuzným lidí";
$pgv_lang["users_admin"]						= "Správci webu";
$pgv_lang["users_gedadmin"]						= "Správci GEDCOM";
$pgv_lang["users_total"]						= "Celkový pocet uživatelu";
$pgv_lang["users_unver"]						= "Neoverené Uživatelem";
$pgv_lang["users_unver_admin"]					= "Neoverené Správcem";
$pgv_lang["usr_deleted"]						= "Zrušen uživatel: ";
$pgv_lang["usr_idle"]							= "Pocet mesícu od posledního prihlášení k úctu uživatele na považovány za neaktivní: ";
$pgv_lang["usr_idle_toolong"]					= "Uživatelský úcet je neaktivní príliš dlouho: ";
$pgv_lang["usr_no_cleanup"]						= "Nic našel pro vycištení";
$pgv_lang["usr_unset_gedcomid"]					= "Smazat GEDCOM ID pro ";
$pgv_lang["usr_unset_rights"]					= "Smazat GEDCOM práva pro ";
$pgv_lang["usr_unset_rootid"]					= "Unset root ID for ";
$pgv_lang["valid_gedcom"]		= "Validní GEDCOM.  Žádné opravy nebyly treba.";
$pgv_lang["validate_gedcom"]		= "Potvrdit platnost GEDCOMu";
$pgv_lang["verified"]			= "Uživatel potvrdil registraci";
$pgv_lang["verified_by_admin"]		= "Uživatel byl adminem povolen";
$pgv_lang["verify_gedcom"]						= "Overte GEDCOM";
$pgv_lang["verify_upload_instructions"]	= "Soubor GEDCOM se stejným názvem byl nalezen. Pokud se rozhodnete pokracovat, bude starý GEDCOM soubor nahrazen souborem, který jste nahráli, a proces importu zacne znovu. Pokud se rozhodnete zrušit, bude starý GEDCOM zustávají beze zmeny.";
$pgv_lang["view_changelog"]						= "Zobrazit soubor changelog.txt";
$pgv_lang["view_logs"]			= "Zobrazit logfiles";
$pgv_lang["view_readme"]						= "Zobrazit soubor readme.txt";
$pgv_lang["visibleonline"]			= "Viditelný pro jiné uživatele, když je online";
$pgv_lang["visitor"]							= "Návštevník";
$pgv_lang["warn_users"]							= "Uživatelé s upozorneními";
$pgv_lang["weekly"]			= "Týdne";
$pgv_lang["welcome_new"]			= "Vítejte na svých nových stránkách v PhpGedView. Úspešne jste nainstalovali PhpGedView (jinak byste nevideli tuto stránku), a tak se mužete pustit do nastavování systému podle vašich potreb.<br />";
$pgv_lang["yearly"]			= "Rocne";
$pgv_lang["admin_OK_subject"]					= "Schválení úctu na webu #SERVER_NAME#";
$pgv_lang["admin_OK_message"]					= "Správce na PhpGedView webu #SERVER_NAME# schválil svou žádost o úcet.\r\n\r\nNyní mužete se prihlásit pomocí prístupu tímto: #SERVER_NAME#";

$pgv_lang["batch_update"]="Provádet dávkové aktualizace / úpravy na GEDCOM";

// Text for the Gedcom Checker
$pgv_lang["gedcheck"]     = "Overovatel GEDCOM";          // Module title
$pgv_lang["gedcheck_text"]= "Tento modul kontroluje formát souboru GEDCOM proti <a href=\"http://phpgedview.sourceforge.net/ged551-5.pdf\">5.5.1 GEDCOM Specification</a>. Kontroluje také pro radu bežných chyb ve vašich datech. Všimnete si, že existuje spousta rozšírení verze, a variace na specifikace, takže by nemel být na prípadné problémy, které nejsou oznaceny jako \"Závažný\". Vysvetlení pro všechny chyby lze nalézt ve specifikaci, tak prosím zkontrolujte, že predtím, než požádat o pomoc.";
$pgv_lang["gedcheck_sync"] = "Úpravy provedené v databázi nejsou synchronizovány do souboru #GLOBALS[ged]#. Obsah souboru nemusí být aktuální. Mužete synchronizovat jej s databází nyní provedením <b><a \"#GLOBALS[ged_link]#\">vývozu</a></b>.";
$pgv_lang["gedcheck_nothing"] = "Žádné chyby nalézt na této úrovni duležitosti.";
$pgv_lang["level"]        = "Úrovni";                   // Levels of checking
$pgv_lang["critical"]     = "Závažný";
$pgv_lang["error"]        = "Chyba";
$pgv_lang["warning"]      = "Upozornení";
$pgv_lang["info"]         = "Udání";
$pgv_lang["open_link"]    = "Otevrené spojení na";           // Where to open links
$pgv_lang["same_win"]     = "Stejnou kartu / okne";
$pgv_lang["new_win"]      = "Nová karta / okne";
$pgv_lang["context_lines"]= "Kontext v GEDCOM"; // Number of lines either side of error
$pgv_lang["all_rec"]      = "Všechny záznamy";             // What to show
$pgv_lang["err_rec"]      = "Záznamy s chybami";
$pgv_lang["missing"]      = "nezvestný";                 // General error messages
$pgv_lang["multiple"]     = "mnohonásobný";
$pgv_lang["invalid"]      = "neplatný";
$pgv_lang["too_many"]     = "príliš mnoho";
$pgv_lang["too_few"]      = "príliš málo";
$pgv_lang["no_link"]      = "není odkaz zpet";
$pgv_lang["data"]         = "data";                    // Specific errors (used with general errors)
$pgv_lang["see"]          = "zobrazit";
$pgv_lang["noref"]        = "Nic odkazuje tohoto záznamu";
$pgv_lang["tag"]          = "štítek";
$pgv_lang["spacing"]      = "rádkování";
$pgv_lang["ADVANCED_NAME_FACTS"] = "Pokrocilé fakta jméno";
$pgv_lang["ADVANCED_PLAC_FACTS"] = "Pokrocilé fakta místo";
$pgv_lang["SURNAME_TRADITION"]		= "Tradice príjmení"; // Default surname inheritance
$pgv_lang["tradition_spanish"]		= "Španelský";
$pgv_lang["tradition_portuguese"]	= "Portugalský";
$pgv_lang["tradition_icelandic"]	= "Islandský";
$pgv_lang["tradition_paternal"]		= "Otcovský";
$pgv_lang["tradition_polish"]		= "Polský";
$pgv_lang["tradition_none"]			= "Žádný";

// -- The following text is used to build the phrase "i years, j months, k days, l hours, m minutes"
// -- for use in text such as "xxx ago" or "after xxx" or "in xxx"
$pgv_lang["elapsedYear1"]	=	"1 rok";
$pgv_lang["elapsedYear2"]	=	"#pgv_lang[global_num1]# roky";	// used in Polish for 2,3,4 or 22,23,24 or 32,33,34 etc.
$pgv_lang["elapsedYears"]	=	"#pgv_lang[global_num1]# roky";
$pgv_lang["elapsedMonth1"]	=	"1 mesíc";
$pgv_lang["elapsedMonth2"]	=	"#pgv_lang[global_num1]# mesíce";	// used in Polish for 2,3,4 or 22,23,24 or 32,33,34 etc.
$pgv_lang["elapsedMonths"]	=	"#pgv_lang[global_num1]# mesíce";
$pgv_lang["elapsedDay1"]	=	"1 den";
$pgv_lang["elapsedDay2"]	=	"#pgv_lang[global_num1]# dny";		// used in Polish for 2,3,4 or 22,23,24 or 32,33,34 etc.
$pgv_lang["elapsedDays"]	=	"#pgv_lang[global_num1]# dny";
$pgv_lang["elapsedHour1"]	=	"1 hodina";
$pgv_lang["elapsedHour2"]	=	"#pgv_lang[global_num1]# hodin";	// used in Polish for 2,3,4 or 22,23,24 or 32,33,34 etc.
$pgv_lang["elapsedHours"]	=	"#pgv_lang[global_num1]# hodin";
$pgv_lang["elapsedMinute1"]	=	"1 minuta";
$pgv_lang["elapsedMinute2"]	=	"#pgv_lang[global_num1]# minuty";	// used in Polish for 2,3,4 or 22,23,24 or 32,33,34 etc.
$pgv_lang["elapsedMinutes"]	=	"#pgv_lang[global_num1]# minuty";

$pgv_lang["elapsedAgo"]		=	"Pred #pgv_lang[global_string1]#";

?>
