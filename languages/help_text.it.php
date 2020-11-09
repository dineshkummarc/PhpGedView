<?php
/**
 * Italian Language file
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
 *
 * @author Pasquale Ceres
 * @package PhpGedView
 * @subpackage Languages
 * @version $Id: help_text.it.php 7126 2016-02-01 19:41:57Z canajun2eh $
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

$pgv_lang["index_cookiepolicy_help"]	= "~#pgv_lang[block_cookiepolicy]#~<br /><br />Questo blocco mostra la politica sui cookie adottata da questo sito.";
$pgv_lang["cookiepolicy_link_help"]		= "~#pgv_lang[block_cookiepolicy_link]#~<br /><br />Lasciare questo campo vuoto se si vuole usare il messaggio standard.<br /><br />Se si vuole usare il testo standard e fornire inoltre un link ad un file di testo o ad una pagina HTML che contenga dettagli sulla politica di gestione dei cookie specifica per il sito, si può inserirne l'URL qui.<br /><br />Per esempio, <b>http://foo.bar.com/policy/cookies.txt</b> potrebbe puntare ad un file di testo, mentre <b>http://foo.bar.com/policy/cookies.htm</b> punta ad una pagina formattata in HTML, e <b>http://foo.bar.com/policy/cookies.doc</b> punta ad un documento in formato Microsoft Word.";
$pgv_lang["cookiepolicy_link_advice"]	= "Lasciare vuoto per usare il testo standard.<br />Inserire un'URL come ad esempio <b>http://foo.bar.com/policy/cookies.txt</b> per puntare ad una pagina sulla politica dei cookie specifica per il sito.";

$pgv_lang["cache_life_help"]			= "~#pgv_lang[cache_life]#~<br /><br />Per migliorare le prestazioni, questo blocco Pagina di Benvenuto PhpGedView viene salvato in un file di cache.  Si può configurare la frequenza con cui il file di cache di questo blocco viene rigenerato.<br /><br /><ul><li><b>-1</b> indica che il file di cache non viene mai rigenerato automaticamente.  Per averne una copia fresca, si devono cancellare tutti i file di cache.  Ciò si può fare dalla pagina Pagina di Benenuto Personalizzata.</li><li><b>0</b> (Zero) indica che questo blocco non viene mai messo in cache, ed ogni volta che il blocco viene mostrato sulla Pagina di Benvenuto PhpGedView, se ne vede una copia fresca.  Questa configurazione viene usata automaticamente per blocchi che cambiano frequentemente, come ad esempio i blocchi #pgv_lang[logged_in_users_block]# e #pgv_lang[random_media_block]#.</li><li><b>1</b> (Uno) indica che una copia fresca del file di cache di questo blocco viene generata quotidianamente, <b>2</b> indica che una copia fresca viene generata ogni 2 giorni, <b>7</b> indica che una copia fresca viene generata settimanalmente, ecc.</li></ul>";

//-- GENERAL
$pgv_lang["help_header"]			= "Informazioni su:";

$pgv_lang["search_exclude_tags_help"]	= "~#pgv_lang[search_tagfilter]#~<br /><br />L'opzione <b>#pgv_lang[search_tagfon]#</b> costringer&agrave la funzione Ricerca ad ignorare i seguenti tag GEDCOM:<div style=\"padding-left:30px;\"><b>_PGVU</b> - Autore dell'ultima modifica<br /><b>CHAN</b> - Data dell'ultima modifica<br /><b>FILE</b> - #factarray[FILE]#<br /><b>FORM</b> - #factarray[FORM]#<br /><b>TYPE</b> - #factarray[TYPE]#<br /><b>SUBM</b> - #factarray[SUBM]#<br /><b>REFN</b> - #factarray[REFN]#</div><br />In aggiunta ai precedenti tag che possono essere selezionati opzionalmente, la funzione Ricerca esclude sempre i seguenti tag:<div style=\"padding-left:30px;\"><b>_UID</b> - #factarray[_UID]#<br /><b>RESN</b> - #factarray[RESN]#</div><br /><br />";

?>
