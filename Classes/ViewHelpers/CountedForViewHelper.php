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
class Tx_NasMarket_ViewHelpers_CountedForViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Render the calculated End-Day of the Ad
	 *
	 * @param array $each The array or SplObjectStorage to iterated over
	 * @param string $as The name of the iteration variable
	 * @param int $length The length of the iteration
	 * @param string $key The name of the variable to store the current array key
	 * @param boolean $reverse If enabled, the iterator will start with the last element and proceed reversely
	 * @return string Rendered string
	 */
	public function render($each, $as, $length, $key = '' , $reverse = FALSE) {
		$output = '';
		if ($each === NULL) {
			return '';
		}
		if (is_object($each)) {
			if (!$each instanceof Traversable) {
				throw new Tx_Fluid_Core_ViewHelper_Exception('ForViewHelper only supports arrays and objects implementing Traversable interface' , 1248728393);
			}
			$each = $this->convertToArray($each);
		}

		if ($reverse === TRUE) {
			$each = array_reverse($each);
		}
		
		//limit the array
		$each = array_slice($each,0,$length);
		
		$output = '';
		foreach ($each as $keyValue => $singleElement) {
			$this->templateVariableContainer->add($as, $singleElement);
			if ($key !== '') {
				$this->templateVariableContainer->add($key, $keyValue);
			}
			$output .= $this->renderChildren();
			$this->templateVariableContainer->remove($as);
			if ($key !== '') {
				$this->templateVariableContainer->remove($key);
			}
		}
		return $output;
	}

	/**
	 * Turns the given object into an array.
	 * The object has to implement the Traversable interface
	 *
	 * @param Traversable $object The object to be turned into an array. If the object implements Iterator the key will be preserved.
	 * @return array The resulting array
	 * @author Bastian Waidelich <bastian@typo3.org>
	 */
	protected function convertToArray(Traversable $object) {
		$array = array();
		foreach ($object as $keyValue => $singleElement) {
			$array[$keyValue] = $singleElement;
		}
		return $array;
	}
	
}
?>