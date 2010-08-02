<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Nadine Schwingler <naddy@schattenhandel.de>
*  			
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
 * Market Category
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_NasMarket_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * title
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;
	
	/**
	 * parent category
	 * @var Tx_NasMarket_Domain_Model_Category
	 */
	protected $parentcat;
	
	/**
	 * children categories
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_Category>
	 */
	protected $children;
	
	/**
	 * category image
	 * @var string
	 */
	protected $image;
	
	
	
	/**
	 * Setter for title
	 *
	 * @param string $title title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Getter for title
	 *
	 * @return string title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Setter for parent
	 *
	 * @param Tx_NasMarket_Domain_Model_Category $parent parent category
	 * @return void
	 */
	public function setParentcat(Tx_NasMarket_Domain_Model_Category $parent) {
		$this->parentcat = $parent;
	}

	/**
	 * Getter for parent
	 *
	 * @return Tx_NasMarket_Domain_Model_Category parent category
	 */
	public function getParentcat() {
		if ($this->parent instanceof Tx_Extbase_Persistence_LazyLoadingProxy) {
			$this->parentcat->_loadRealInstance();
		}
		return $this->parentcat;
	}
	
	/**
	 * Setter for children
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_Category> $children children
	 * @return void
	 */
	public function setChildren(Tx_Extbase_Persistence_ObjectStorage $children) {
		$this->children = $children;
	}

	/**
	 * Getter for children
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_children> children
	 */
	public function getChildren() {
		return $this->children;
	}
	
	/**
	 * Adds a Child
	 *
	 * @param Tx_NasMarket_Domain_Model_Category The Category to be category
	 * @return void
	 */
	public function addChild(Tx_NasMarket_Domain_Model_Category $category) {
		$this->children->attach($category);
	}
	
	/**
	 * Removes a Child
	 *
	 * @param Tx_NasMarket_Domain_Model_Category The Category to be removed
	 * @return void
	 */
	public function removeChild(Tx_NasMarket_Domain_Model_Category $category) {
		$this->children->detach($category);
	}
	
	/**
	 * Setter for image
	 *
	 * @param string $image category image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Getter for image
	 *
	 * @return string category image
	 */
	public function getImage() {
		return $this->image;
	}
	
}
?>