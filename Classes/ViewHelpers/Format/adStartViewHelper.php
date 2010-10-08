<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Nadine Schwingler <naddy@schattenhandel.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * View helper for rendering end_date
 */
class Tx_NasMarket_ViewHelpers_Format_AdStartViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Render the Start-Day of the Ad
	 *
	 * @param Tx_NasMarket_Domain_Model_Ad $ad Ad to be displayed
	 * @return string Formatted start date
	 */
	public function render($ad) {
		//t3lib_div::debug($ad);
		$output = '';
		$output = date('d.m.Y',$ad->getStarttime());
		return $output;
	}
	
}
?>