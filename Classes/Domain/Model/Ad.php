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
 * Market-Ad
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
	 */
	protected $description;
	
	/**
	 * offer or search
	 * @var string
	 */
	protected $type1;
	
	/**
	 * private or commercial
	 * @var string
	 */
	protected $type2;
	
	/**
	 * images
	 * @var string
	 */
	protected $images;
	
	/**
	 * different location than own address
	 * @var boolean
	 */
	protected $different_location;
	
	/**
	 * different location ZIP
	 * @var string
	 */
	protected $dl_zip;
	
	/**
	 * different location city
	 * @var string
	 */
	protected $dl_city;
	
	/**
	 * different location address
	 * @var string
	 */
	protected $dl_address;
	
	/**
	 * different location country
	 * @var string
	 */
	protected $dl_country;
	
	/**
	 * show phone nr in ad
	 * @var boolean
	 */
	protected $show_phone;
	
	/**
	 * show email addr in ad
	 * @var string
	 */
	protected $show_email;
	
	/**
	 * duration in days
	 * @var string
	 */
	protected $duration;
	
	/**
	 * price
	 * @var float
	 */
	protected $price;
	
	/**
	 * category
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_Category>
	 */
	protected $category;
	
	/**
	 * feuser
	 * @var Tx_NasMarket_Domain_Model_FeUser
	 */
	protected $feuser;
	
	
	
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
	 * Setter for type1
	 *
	 * @param string $type1 offer or search
	 * @return void
	 */
	public function setType1($type1) {
		$this->type1 = $type1;
	}

	/**
	 * Getter for type1
	 *
	 * @return string offer or search
	 */
	public function getType1() {
		return $this->type1;
	}
	
	/**
	 * Setter for type2
	 *
	 * @param string $type2 private or commercial
	 * @return void
	 */
	public function setType2($type2) {
		$this->type2 = $type2;
	}

	/**
	 * Getter for type2
	 *
	 * @return string private or commercial
	 */
	public function getType2() {
		return $this->type2;
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
	 * Setter for different_location
	 *
	 * @param boolean $different_location different location than own address
	 * @return void
	 */
	public function setDifferent_location($different_location) {
		$this->different_location = $different_location;
	}

	/**
	 * Getter for different_location
	 *
	 * @return boolean different location than own address
	 */
	public function getDifferent_location() {
		return $this->different_location;
	}
	
	/**
	 * Returns the boolean state of different_location
	 *
	 * @return bool The state of different_location
	 */
	public function isDifferent_location() {
		$this->getDifferent_location();
	}
	
	/**
	 * Setter for dl_zip
	 *
	 * @param string $dl_zip different location ZIP
	 * @return void
	 */
	public function setDl_zip($dl_zip) {
		$this->dl_zip = $dl_zip;
	}

	/**
	 * Getter for dl_zip
	 *
	 * @return string different location ZIP
	 */
	public function getDl_zip() {
		return $this->dl_zip;
	}
	
	/**
	 * Setter for dl_city
	 *
	 * @param string $dl_city different location city
	 * @return void
	 */
	public function setDl_city($dl_city) {
		$this->dl_city = $dl_city;
	}

	/**
	 * Getter for dl_city
	 *
	 * @return string different location city
	 */
	public function getDl_city() {
		return $this->dl_city;
	}
	
	/**
	 * Setter for dl_address
	 *
	 * @param string $dl_address different location address
	 * @return void
	 */
	public function setDl_address($dl_address) {
		$this->dl_address = $dl_address;
	}

	/**
	 * Getter for dl_address
	 *
	 * @return string different location address
	 */
	public function getDl_address() {
		return $this->dl_address;
	}
	
	/**
	 * Setter for dl_country
	 *
	 * @param string $dl_country different location country
	 * @return void
	 */
	public function setDl_country($dl_country) {
		$this->dl_country = $dl_country;
	}

	/**
	 * Getter for dl_country
	 *
	 * @return string different location country
	 */
	public function getDl_country() {
		return $this->dl_country;
	}
	
	/**
	 * Setter for show_phone
	 *
	 * @param boolean $show_phone show phone nr in ad
	 * @return void
	 */
	public function setShow_phone($show_phone) {
		$this->show_phone = $show_phone;
	}

	/**
	 * Getter for show_phone
	 *
	 * @return boolean show phone nr in ad
	 */
	public function getShow_phone() {
		return $this->show_phone;
	}
	
	/**
	 * Returns the boolean state of show_phone
	 *
	 * @return bool The state of show_phone
	 */
	public function isShow_phone() {
		$this->getShow_phone();
	}
	
	/**
	 * Setter for show_email
	 *
	 * @param string $show_email show email addr in ad
	 * @return void
	 */
	public function setShow_email($show_email) {
		$this->show_email = $show_email;
	}

	/**
	 * Getter for show_email
	 *
	 * @return string show email addr in ad
	 */
	public function getShow_email() {
		return $this->show_email;
	}
	
	/**
	 * Setter for duration
	 *
	 * @param string $duration duration in days
	 * @return void
	 */
	public function setDuration($duration) {
		$this->duration = $duration;
	}

	/**
	 * Getter for duration
	 *
	 * @return string duration in days
	 */
	public function getDuration() {
		return $this->duration;
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
	 * Setter for category
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_Category> $category category
	 * @return void
	 */
	public function setCategory(Tx_Extbase_Persistence_ObjectStorage $category) {
		$this->category = $category;
	}

	/**
	 * Getter for category
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_Category> category
	 */
	public function getCategory() {
		return $this->category;
	}
	
	/**
	 * Adds a Category
	 *
	 * @param Tx_NasMarket_Domain_Model_Category The Category to be added
	 * @return void
	 */
	public function addCategory(Tx_NasMarket_Domain_Model_Category $category) {
		$this->category->attach($category);
	}
	
	/**
	 * Removes a Category
	 *
	 * @param Tx_NasMarket_Domain_Model_Category The Category to be removed
	 * @return void
	 */
	public function removeCategory(Tx_NasMarket_Domain_Model_Category $category) {
		$this->category->detach($category);
	}
	
	/**
	 * Setter for feuser
	 *
	 * @param Tx_NasMarket_Domain_Model_FeUser $feuser feuser
	 * @return void
	 */
	public function setFeuser(Tx_NasMarket_Domain_Model_FeUser $feuser) {
		$this->feuser = $feuser;
	}

	/**
	 * Getter for feuser
	 *
	 * @return Tx_NasMarket_Domain_Model_FeUser feuser
	 */
	public function getFeuser() {
		return $this->feuser;
	}
	
}
?>