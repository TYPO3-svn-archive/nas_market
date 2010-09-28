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
 * View helper for rendering the Image-Thumb
 */
class Tx_NasMarket_ViewHelpers_Format_ShowThumbViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Show the Thumbnail instead of the big image
	 *
	 * @param string image name of the image
	 * @return string name of the thumb
	 */
	public function render($image) {
		//t3lib_div::debug($image);
		
		$temp_name = explode('.',$image);
        $ending = $temp_name[count($temp_name)-1];
        unset($temp_name[count($temp_name)-1]);
        $thumbname = implode('.',$temp_name).'_thumb.'.$ending;
        
		return $thumbname;
	}
	
}
?>