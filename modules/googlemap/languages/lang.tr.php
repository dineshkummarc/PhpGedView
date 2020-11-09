<?php
/**
 * Turkish Language file for PhpGedView.
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2011  PGV Development Team.  All rights reserved.
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
 * @author Adem GENÇ uzayuydu@gmail.com http://www.muttafi.com
 * @version $Id: lang.tr.php 7047 2011-07-26 00:04:19Z canajun2eh $
 */

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

$pgv_lang["googlemap"]              = "Harita";
$pgv_lang["no_gmtab"]               = "Bu kişi için harita verisi yok";
$pgv_lang["gm_disabled"]            = "GoogleMap modülü devredişi";

$pgv_lang["gm_redraw_map"]          = "Sıfırla";
$pgv_lang["gm_map"]                 = "Harita";
$pgv_lang["gm_satellite"]           = "Uydu";
$pgv_lang["gm_hybrid"]              = "Karışık";

// Configuration texts
$pgv_lang["gm_manage"]              = "Googlemap yapılandırma yönetimi";
$pgv_lang["configure_googlemap"]    = "GoogleMap Yapılandırma";
$pgv_lang["gm_admin_error"]         = "Sayfa sadece Yöneticiler için";
$pgv_lang["gm_db_error"]            = "veritabanında yerkonumu tablosu bulunamadı";
$pgv_lang["gm_table_created"]       = "yerkonumu tablo oluşturuldu";
$pgv_lang["googlemap_enable"]       = "GoogleMap Etkinleştir";
$pgv_lang["googlemapkey"]           = "GoogleMap API keyi";
$pgv_lang["gm_map_type"]            = "Varsayılan harita tipi";
$pgv_lang["gm_map_size"]            = "Haritanın boyutu (piksel olarak)";
$pgv_lang["gm_map_size_x"]          = "Genişlik";
$pgv_lang["gm_map_size_y"]          = "Yükseklik";
$pgv_lang["gm_map_zoom"]            = "Haritanın zum faktörü";
$pgv_lang["gm_digits"]              = "basamaklar";
$pgv_lang["gm_min"]                 = "Enaz.";
$pgv_lang["gm_max"]                 = "Enfazla.";
$pgv_lang["gm_default_level0"]      = "Varsayılan en üst değer";
$pgv_lang["gm_nof_levels"]          = "Seviyelerin sayısı";
$pgv_lang["gm_config_per_level"]    = "Seviye başına yapılandırma";
$pgv_lang["gm_name_prefix"]         = "Önek";
$pgv_lang["gm_name_postfix"]        = "Sonek";
$pgv_lang["gm_name_pre_post"]       = "Önek / Sonek sırala";
$pgv_lang["gm_level"]               = "Değer";
$pgv_lang["gm_pp_none"]             = "Önek/sonek yok";
$pgv_lang["gm_pp_n_pr_po_b"]        = "Normal, önek, sonek, her ikisi";
$pgv_lang["gm_pp_n_po_pr_b"]        = "Normal, sonek, önek, her ikisi";
$pgv_lang["gm_pp_pr_po_b_n"]        = "Önek, sonek, her ikisi, normal";
$pgv_lang["gm_pp_po_pr_b_n"]        = "Sonek, önek, her ikisi, normal";
$pgv_lang["gm_pp_pr_po_n_b"]        = "Önek, sonek, normal, her ikisi";
$pgv_lang["gm_pp_po_pr_n_b"]        = "Sonek, önek, normal, her ikisi";
$pgv_lang["googlemap_coord"]        = "Harita koordinatları göster";

//wooc place hierarchy
$pgv_lang["gm_place_hierarchy"]  	= "Hiyerarşi Yerler için Googlemap kullan";
$pgv_lang["gm_ph_map_size"]			= "Hiyerarşi Yerler haritanın boyutu (piksel)";
$pgv_lang["gm_ph_marker_type"]		= "Hiyerarşi Yerler haritanın tipi";
$pgv_lang["gm_standard_marker"]		= "Standart";
$pgv_lang["gm_no_coord"]			= "Bu yerin hiçbir koordinatları yok";
$pgv_lang["gm_ph_placenames"]		= "Kısa yerisimleri göster";
$pgv_lang["gm_ph_count"]			= "Bireylerin ve ailelerin sayacını göster ";
$pgv_lang["gm_ph_wheel"]			= "Zum için fare tekerini kullan";
$pgv_lang["gm_ph_controls"]			= "Harıta kontrolleri gizle";

// Texts used on the Places location page
$pgv_lang["edit_place_locations"]   = "Coğrafi yer konumları düzenle";
$pgv_lang["pl_no_places_found"]     = "Yerler bulunamadı";
$pgv_lang["pl_zoom_factor"]         = "Zum faktörü ";
$pgv_lang["pl_place_icon"]          = "İkon";
$pgv_lang["pl_edit"]                = "Coğrafi konumu düzenle";
$pgv_lang["pl_add_place"]           = "Yer ekle";
$pgv_lang["pl_import_gedcom"]       = "Geçerli GEDCOMdan içeri aktar";
$pgv_lang["pl_import_all_gedcom"]   = "Tüm GEDCOMlardan içeri aktar";
$pgv_lang["pl_import_file"]         = "Dosyadan içeri aktar";
$pgv_lang["pl_export_file"]         = "Dosyaya geçerli görüneni dışarı aktar";
$pgv_lang["pl_export_all_file"]     = "Dosyaya tüm konumları dışarı aktar";
$pgv_lang["pl_north_short"]         = "K";
$pgv_lang["pl_south_short"]         = "G";
$pgv_lang["pl_east_short"]          = "D";
$pgv_lang["pl_west_short"]          = "B";
$pgv_lang["pl_places_localfile"]	  = "İçerdiği yerlerin sunucudaki dosya (CSV)";
$pgv_lang["pl_places_filename"]     = "İçerdiği yerlerin dosyası (CSV)";
$pgv_lang["pl_clean_db"]            = "İçeri aktarmadan önce tüm yer-konumları temizlesin mi?";
$pgv_lang["pl_update_only"]         = "Sadece mevcut yerleri güncelle?";
$pgv_lang["pl_overwrite_data"]      = "Dosyadan veri ile konum-verinin üzerine yazılsın mı?";
$pgv_lang["pl_no_places_found"]     = "Yerler bulunamadı";
$pgv_lang["pl_use_this_value"]      = "Bu değeri kullan";
$pgv_lang["pl_precision"]           = "Hassasiyet";
$pgv_lang["pl_country"]             = "Ülke";
$pgv_lang["pl_state"]               = "İl";
$pgv_lang["pl_city"]                = "İlçe";
$pgv_lang["pl_neighborhood"]        = "Kasaba/Semt";
$pgv_lang["pl_house"]               = "Ev";
$pgv_lang["pl_max"]                 = "En fazla";
$pgv_lang["pl_delete"]              = "Coğrafi konumu sil";
$pgv_lang["pl_search_level"]		= "Bu duzeyde ara";
$pgv_lang["pl_search_all"]			= "Tümünü ara";
$pgv_lang["pl_unknown"]				= "Bilinmiyor";

$pgv_lang["pl_flag"]                = "Bayrak";
$pgv_lang["flags_edit"]             = "Bayrak seç";
$pgv_lang["pl_change_flag"]         = "Bayrağı değiştir";
$pgv_lang["pl_remove_flag"]         = "Bayrağı kaldır";

$pgv_lang["pl_remove_location"]     = "Bu konumu kaldır?";
$pgv_lang["pl_delete_error"]        = "Konum kaldırılmaz: bu konumda alt-konumları içeriyor";
$pgv_lang["list_inactive"]        	= "Aktik olmayan yerleri göstermek için buray tıklayın";

//Placecheck specific text
$pgv_lang["placecheck"]				= "Yerleri Kontrol Et";
$pgv_lang["placecheck_text"]		= "Bu seçilmiş GEDCOM dosyasından bütün yerleri listeleyecek. Varsayılan yoluyla bu GEDCOM dosyası ve GoogleMap tabloları arasında tamamen eşlenen yerler içermeyecek";
$pgv_lang["placecheck_top"]			= "En üst Değer Yeri";
$pgv_lang["placecheck_one"]			= "Bir Yer Değeri";
$pgv_lang["placecheck_select1"]		= "En üst Değeri seç...";
$pgv_lang["placecheck_select2"]		= "Sonraki Değer Seç...";
$pgv_lang["placecheck_key"]			= "Aşağıda kullanılan durum renkleri";
$pgv_lang["placecheck_key1"]		= "bu yerini ve koordinatlarını GoogleMap tablolarda mevcut değil";
$pgv_lang["placecheck_key2"]		= "bu GoogleMap tablolarında mevcut, ancak hiçbir koordinatlar içermiyor";
$pgv_lang["placecheck_key3"]		= "bu yer değeri GEDCOM dosyanızda boş dur. Eklenmeli<br />GoogleMap ebeveyninden koordinatlar ile \"bilinmeyen (unknown)\" olarak yerleştir<br />Sizden önce düzey sonraki düzeye yeri ekle";
$pgv_lang["placecheck_key4"]		= "bu yer değeri GEDCOM dosyanızda boştur fakat \"bilinmeyen (unknown)\" olarak vardır<br />GoogleMap koordinatlarla tabloya yerleştirir. Hareket gerekli değil<br />eksik değere kadar girebilirsin";
$pgv_lang["placecheck_head"]		= "GEDCOM dosya için yer listesi";
$pgv_lang["placecheck_gedheader"]	= "GEDCOM Dosya Yer Verisi<br/>(2 PLAC tag)";
$pgv_lang["placecheck_gm_header"]	= "GoogleMap Tablo Veri Yerler";
$pgv_lang["placecheck_unique"]		= "Toplam benzersiz yerler";
$pgv_lang["placecheck_zoom"]        = "Zum=";
$pgv_lang["placecheck_options"]     = "Liste Seçenekleri Yerleri Kontrol Et";
$pgv_lang["placecheck_filter_text"] = "Liste filtreleme seçenekleri";
$pgv_lang["placecheck_match"] 		= "Tam uyumlu yerleri içer: ";
$pgv_lang["placecheck_lati"] 		= "Enlem";
$pgv_lang["placecheck_long"] 		= "Boylam";
$pgv_lang["gm_physical"]		= "Topografik";
$pgv_lang["pl_countries"]		= "Ülkeler";
$pgv_lang["pl_county"]			= "İlçe";
$pgv_lang["pl_place"]			= "Kasaba/Semt";
$pgv_lang["pedigree_map"]				= "Soyağacı Haritası";
$pgv_lang["pm_grandparent"] 			= "Büyükebeveyn";
$pgv_lang["pm_grandmother"] 			= "Anneanne";
$pgv_lang["pm_grandfather"] 			= "Büyükbaba";
$pgv_lang["pm_zoom_in"]					= "Zum&nbsp;yakın";
$pgv_lang["pm_zoom_out"]				= "Zum&nbsp;uzak";
$pgv_lang["zoom_in_here"]				= "Zum&nbsp;yakın&nbsp;buraya";
$pgv_lang["zoom_out_here"]				= "Zum&nbsp;uzak&nbsp;buraya";
$pgv_lang["centre_map"]					= "Merkez&nbsp;harita&nbsp;buraya";
$pgv_lang["pm_individual_displayed"]	= "normal toplamı üzerinden görüntülenen birey";
$pgv_lang["pm_2individuals_displayed"]	= "normal toplamı üzerinden görüntülenen bireyler";	// For Polish 2,3,4 or 22,23,24 or 32,33,34 etc.
$pgv_lang["pm_individuals_displayed"]	= "normal toplamı üzerinden görüntülenen bireyler";
$pgv_lang["pm_individual_private"]		= "bireysel özeldir.";
$pgv_lang["pm_individuals_private"]		= "özel bireylerindir.";
$pgv_lang["pm_missing_birth"]			= "kişinin doğum yeri harita koordinatları eksik:";
$pgv_lang["pm_2missing_births"]			= "kişilerin doğum yeri harita koordinatları eksik:";	// For Polish 2,3,4 or 22,23,24 or 32,33,34 etc.
$pgv_lang["pm_missing_births"]			= "kişilerin doğum yeri harita koordinatları eksik:";
$pgv_lang["pm_missings"]				= "Veritabaında atalar yok.";
$pgv_lang["pm_for"]						= "için";
$pgv_lang["pm_gens"]					= "nesiller";
$pgv_lang["pm_root"]					= "Kök";
?>
