<?php
/**
* Functions used for debugging
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
* @subpackage Display
* @version $Id: functions_debug.php 7167 2017-09-29 18:41:55Z canajun2eh $
*/

if (!defined('PGV_PHPGEDVIEW')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

define('PGV_FUNCTIONS_DEBUG_PHP', '');

/**
 * This function produces a hexadecimal dump of the input string for debugging purposes.
 *
 * The input string is expected to be in UTF-8.  UTF-8 characters are from 1 to 4 bytes long.
 *
 * The dump consists of a ruler line, followed by the UTF-8 input string.  Each UTF-8 character is separated
 * into up to 4 bytes, which are then printed in hexadecimal, vertically, under the original UTF-8 character.
 *
 * Thus, the dump will consist of at least 4 lines:
 * 		ruler, UTF-8 character, left nibble of 1st byte, right nibble of 1st byte
 *
 * The dump will contain up to 3 additional pairs of lines, each corresponding to the left and right nibbles
 * of the following 2nd, 3rd, and 4th bytes of the original UTF-8 character.
*/

function DumpString($input) {
	if (empty($input)) return false;

	$UTF8 = array();
	$hex1L = '';
	$hex1R = '';
	$hex2L = '';
	$hex2R = '';
	$hex3L = '';
	$hex3R = '';
	$hex4L = '';
	$hex4R = '';

	$pos = 0;
	while (true) {
		// Separate the input string into UTF8 characters
		$byte0 = ord(substr($input, $pos, 1));
		$charLen = 1;
		if (($byte0 & 0xE0) == 0xC0) $charLen = 2;  // 2-byte sequence
		if (($byte0 & 0xF0) == 0xE0) $charLen = 3;  // 3-byte sequence
		if (($byte0 & 0xF8) == 0xF0) $charLen = 4;  // 4-byte sequence
		$thisChar = substr($input, $pos, $charLen);
		$UTF8[] = $thisChar;

		// Separate the current UTF8 character into hexadecimal digits
		$byte = bin2hex(substr($thisChar, 0, 1));
		$hex1L .= substr($byte, 0, 1);
		$hex1R .= substr($byte, 1, 1);

		if ($charLen > 1) {
			$byte = bin2hex(substr($thisChar, 1, 1));
			$hex2L .= substr($byte, 0, 1);
			$hex2R .= substr($byte, 1, 1);
		} else {
			$hex2L .= ' ';
			$hex2R .= ' ';
		}

		if ($charLen > 2) {
			$byte = bin2hex(substr($thisChar, 2, 1));
			$hex3L .= substr($byte, 0, 1);
			$hex3R .= substr($byte, 1, 1);
		} else {
			$hex3L .= ' ';
			$hex3R .= ' ';
		}

		if ($charLen > 3) {
			$byte = bin2hex(substr($thisChar, 3, 1));
			$hex4L .= substr($byte, 0, 1);
			$hex4R .= substr($byte, 1, 1);
		} else {
			$hex4L .= ' ';
			$hex4R .= ' ';
		}

		$pos += $charLen;
		if ($pos>=strlen($input)) break;
	}

	$pos = 0;
	$lastPos = count($UTF8);
	$haveByte4 = (trim($hex4L)!='');
	$haveByte3 = (trim($hex3L)!='');
	$haveByte2 = (trim($hex2L)!='');

	// We're ready: now output everything
	echo '<br /><code><span dir="ltr">';
	while (true) {
		$lineLength = $lastPos - $pos;
		if ($lineLength>100) $lineLength = 100;

		// Line 1: ruler
		$thisLine = substr('      '.$pos, -6).' ';
		$thisLine .= substr('........10........20........30........40........50........60........70........80........90.......100', 0, $lineLength);
		echo str_replace(' ', '&nbsp;', $thisLine), '<br />';

		// Line 2: UTF8 character string
		$thisLine = '';
		for ($i=$pos; $i<($pos+$lineLength); $i++) {
			if (ord(substr($UTF8[$i], 0, 1)) < 0x20) {
				$thisChar = "&nbsp;";
			} else {
				$thisChar = $UTF8[$i];
				switch ($thisChar) {
				case '&':
					$thisChar = '&amp;';
					break;
				case '<':
					$thisChar = '&lt;';
					break;
				case ' ':
				case PGV_UTF8_LRM:
				case PGV_UTF8_RLM:
				case PGV_UTF8_LRO:
				case PGV_UTF8_RLO:
				case PGV_UTF8_LRE:
				case PGV_UTF8_RLE:
				case PGV_UTF8_PDF:
					$thisChar = '&nbsp;';
					break;
				}
			}
//			$thisLine .= PGV_UTF8_LRM;
			$thisLine .= $thisChar;
		}
//		echo '&nbsp;&nbsp;UTF8&nbsp;', $thisLine, '<br />';
		echo '&nbsp;&nbsp;UTF8&nbsp;', PGV_UTF8_LRO, $thisLine, PGV_UTF8_PDF, '<br />';

		// Line 3:  First hexadecimal byte
		$thisLine = 'Byte 1 ';
		$thisLine .= substr($hex1L, $pos, $lineLength);
		$thisLine .= '<br />';
		$thisLine .= '       ';
		$thisLine .= substr($hex1R, $pos, $lineLength);
		$thisLine .= '<br />';
		echo str_replace(array(' ', '<br&nbsp;/>'), array('&nbsp;', '<br />'), $thisLine);

		// Line 4:  Second hexadecimal byte
		if ($haveByte2) {
			$thisLine = 'Byte 2 ';
			$thisLine .= substr($hex2L, $pos, $lineLength);
			$thisLine .= '<br />';
			$thisLine .= '       ';
			$thisLine .= substr($hex2R, $pos, $lineLength);
			$thisLine .= '<br />';
			echo str_replace(array(' ', '<br&nbsp;/>'), array('&nbsp;', '<br />'), $thisLine);
		}

		// Line 5:  Third hexadecimal byte
		if ($haveByte3) {
			$thisLine = 'Byte 3 ';
			$thisLine .= substr($hex3L, $pos, $lineLength);
			$thisLine .= '<br />';
			$thisLine .= '       ';
			$thisLine .= substr($hex3R, $pos, $lineLength);
			$thisLine .= '<br />';
			echo str_replace(array(' ', '<br&nbsp;/>'), array('&nbsp;', '<br />'), $thisLine);
		}

		// Line 6:  Fourth hexadecimal byte
		if ($haveByte4) {
			$thisLine = 'Byte 4 ';
			$thisLine .= substr($hex4L, $pos, $lineLength);
			$thisLine .= '<br />';
			$thisLine .= '       ';
			$thisLine .= substr($hex4R, $pos, $lineLength);
			$thisLine .= '<br />';
			echo str_replace(array(' ', '<br&nbsp;/>'), array('&nbsp;', '<br />'), $thisLine);
		}
		echo '<br />';
		$pos += $lineLength;
		if ($pos >= $lastPos) break;
	}

	echo '</span></code>';
	return true;
}
?>
