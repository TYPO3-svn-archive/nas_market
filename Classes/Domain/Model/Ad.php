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
 * ad
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_NasMarket_Domain_Model_Ad extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * title
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;
	
	/**
	 * description
	 * @var string
	 * @validate NotEmpty
	 */
	protected $description;
	
	/**
	 * images
	 * @var string
	 */
	protected $images;
	
	/**
	 * price
	 * @var float
	 * @validate NotEmpty
	 */
	protected $price;
	
	/**
	 * duration of ad
	 * @var integer
	 */
	protected $duraction;
	
	/**
	 * is active
	 * @var boolean
	 */
	protected $active;
	
	/**
	 * categories
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_Category>
	 */
	protected $categories;
	
	
	
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
	 * Setter for description
	 *
	 * @param string $description description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Getter for description
	 *
	 * @return string description
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Setter for images
	 *
	 * @param string $images images
	 * @return void
	 */
	public function setImages($images) {
		$this->images = $images;
	}

	/**
	 * Getter for images
	 *
	 * @return string images
	 */
	public function getImages() {
		return $this->images;
	}
	
	/**
	 * Setter for price
	 *
	 * @param float $price price
	 * @return void
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * Getter for price
	 *
	 * @return float price
	 */
	public function getPrice() {
		return $this->price;
	}
	
	/**
	 * Setter for duraction
	 *
	 * @param integer $duraction duration of ad
	 * @return void
	 */
	public function setDuraction($duraction) {
		$this->duraction = $duraction;
	}

	/**
	 * Getter for duraction
	 *
	 * @return integer duration of ad
	 */
	public function getDuraction() {
		return $this->duraction;
	}
	
	/**
	 * Setter for active
	 *
	 * @param boolean $active is active
	 * @return void
	 */
	public function setActive($active) {
		$this->active = $active;
	}

	/**
	 * Getter for active
	 *
	 * @return boolean is active
	 */
	public function getActive() {
		return $this->active;
	}
	
	/**
	 * Returns the boolean state of active
	 *
	 * @return bool The state of active
	 */
	public function isActive() {
		$this->getActive();
	}
	
	/**
	 * Setter for categories
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_Category> $categories categories
	 * @return void
	 */
	public function setCategories(Tx_Extbase_Persistence_ObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * Getter for categories
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_Category> categories
	 */
	public function getCategories() {
		return $this->categories;
	}
	
	/**
	 * Adds a Category
	 *
	 * @param Tx_NasMarket_Domain_Model_Category The Category to be added
	 * @return void
	 */
	public function addCategory(Tx_NasMarket_Domain_Model_Category $category) {
		$this->categories->attach($category);
	}
	
	/**
	 * Removes a Category
	 *
	 * @param Tx_NasMarket_Domain_Model_Category The Category to be removed
	 * @return void
	 */
	public function removeCategory(Tx_NasMarket_Domain_Model_Category $category) {
		$this->categories->detach($category);
	}
	
}
?>