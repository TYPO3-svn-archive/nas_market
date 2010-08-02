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
 * View helper for rendering the first Parent-Cat
 */
class Tx_NasMarket_ViewHelpers_Format_FirstCatViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Render the first Cat with parent of the ad
	 *
	 * @param $cats The Categories of the ad
	 * @return string Formattet FirstCat
	 */
	public function render($cats) {
		$output = '';
		foreach ($cats as $cat){
			$parent = $cat->getParentcat();
			if ($parent){
				$output .= $parent->getTitle();
				$output .= ' => ';
			}
			$output .= $cat->getTitle();
		}
		return $output;
	}
	
}
?>