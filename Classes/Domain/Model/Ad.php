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
	 * starttime
	 * @var int
	 */
	protected $starttime;
	
	/**
	 * endtime
	 * @var int
	 */
	protected $endtime;
	
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
	 * @var int
	 */
	protected $type1;
	
	/**
	 * private or commercial
	 * @var int
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
	protected $differentLocation;
	
	/**
	 * different location ZIP
	 * @var string
	 */
	protected $dlZip;
	
	/**
	 * different location city
	 * @var string
	 */
	protected $dlCity;
	
	/**
	 * different location address
	 * @var string
	 */
	protected $dlAddress;
	
	/**
	 * different location country
	 * @var string
	 */
	protected $dlCountry;
	
	/**
	 * show phone nr in ad
	 * @var boolean
	 */
	protected $showPhone;
	
	/**
	 * show email addr in ad
	 * @var boolean
	 */
	protected $showEmail;
	
	/**
	 * duration in days
	 * @var int
	 */
	protected $duration;
	
	/**
	 * price
	 * @var float
	 */
	protected $price;
	
	/**
	 * pricetype
	 * @var int
	 */
	protected $pricetype;
	
	/**
	 * category
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_NasMarket_Domain_Model_Category>
	 */
	protected $category;
	
	/**
	 * The Ads Poster
	 *
	 * @var Tx_NasMarket_Domain_Model_Poster
	 */
	protected $poster;
	
	/**
	 * Constructor of the Ad
	 *
	 * @return void
	 */	
	public function __construct() {    
		$this->showEmail = false;
		$this->showPhone = false;
	}
	
	/**
	 * Setter for starttime
	 *
	 * @param int $starttime starttime
	 * @return void
	 */
	public function setStarttime($starttime) {
		$this->starttime = $starttime;
	}

	/**
	 * Getter for starttime
	 *
	 * @return int starttime
	 */
	public function getStarttime() {
		return $this->starttime;
	}
	
	/**
	 * Setter for endtime
	 *
	 * @param int $endtime endtime
	 * @return void
	 */
	public function setEndtime($endtime) {
		$this->endtime = $endtime;
	}

	/**
	 * Getter for endtime
	 *
	 * @return int endtime
	 */
	public function getEndtime() {
		return $this->endtime;
	}
	
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
	 * @param int $type1 offer or search
	 * @return void
	 */
	public function setType1($type1) {
		$this->type1 = $type1;
	}

	/**
	 * Getter for type1
	 *
	 * @return int offer or search
	 */
	public function getType1() {
		return $this->type1;
	}
	
	/**
	 * Setter for type2
	 *
	 * @param int $type2 private or commercial
	 * @return void
	 */
	public function setType2($type2) {
		$this->type2 = $type2;
	}

	/**
	 * Getter for type2
	 *
	 * @return int private or commercial
	 */
	public function getType2() {
		return $this->type2;
	}
	
	/**
	 * Setter for images
	 *
	 * @param array $images images
	 * @return void
	 */
	public function setImages($images) {
		$this->images = implode(',',$images);
	}

	/**
	 * Getter for images
	 *
	 * @return array images
	 */
	public function getImages() {
		return explode(',',$this->images);
	}
	
	/**
	 * Setter for different_location
	 *
	 * @param boolean $differentLocation different location than own address
	 * @return void
	 */
	public function setDifferentLocation($differentLocation) {
		$this->differentLocation = $differentLocation;
	}

	/**
	 * Getter for different_location
	 *
	 * @return boolean different location than own address
	 */
	public function getDifferentLocation() {
		return $this->differentLocation;
	}
	
	/**
	 * Returns the boolean state of different_location
	 *
	 * @return bool The state of different_location
	 */
	public function isDifferentLocation() {
		$this->getDifferentLocation();
	}
	
	/**
	 * Setter for dl_zip
	 *
	 * @param string $dlZip different location ZIP
	 * @return void
	 */
	public function setDlZip($dlZip) {
		$this->dlZip = $dlZip;
	}

	/**
	 * Getter for dl_zip
	 *
	 * @return string different location ZIP
	 */
	public function getDlZip() {
		return $this->dlZip;
	}
	
	/**
	 * Setter for dl_city
	 *
	 * @param string $dlCity different location city
	 * @return void
	 */
	public function setDlCity($dlCity) {
		$this->dlCity = $dlCity;
	}

	/**
	 * Getter for dl_city
	 *
	 * @return string different location city
	 */
	public function getDlCity() {
		return $this->dlCity;
	}
	
	/**
	 * Setter for dl_address
	 *
	 * @param string $dlAddress different location address
	 * @return void
	 */
	public function setDlAddress($dlAddress) {
		$this->dlAddress = $dlAddress;
	}

	/**
	 * Getter for dl_address
	 *
	 * @return string different location address
	 */
	public function getDlAddress() {
		return $this->dlAddress;
	}
	
	/**
	 * Setter for dl_country
	 *
	 * @param string $dlCountry different location country
	 * @return void
	 */
	public function setDlCountry($dlCountry) {
		$this->dlCountry = $dlCountry;
	}

	/**
	 * Getter for dl_country
	 *
	 * @return string different location country
	 */
	public function getDlCountry() {
		return $this->dlCountry;
	}
	
	/**
	 * Setter for show_phone
	 *
	 * @param boolean $showPhone show phone nr in ad
	 * @return void
	 */
	public function setShowPhone($showPhone) {
		$this->showPhone = $showPhone;
	}

	/**
	 * Getter for show_phone
	 *
	 * @return bool show phone nr in ad
	 */
	public function getShowPhone() {
		return $this->showPhone;
	}
	
	/**
	 * Returns the boolean state of show_phone
	 *
	 * @return bool The state of show_phone
	 */
	public function isShowPhone() {
		$this->getShowPhone();
	}
	
	/**
	 * Setter for show_email
	 *
	 * @param boolean $showEmail show email addr in ad
	 * @return void
	 */
	public function setShowEmail($showEmail) {
		$this->showEmail = $showEmail;
	}

	/**
	 * Getter for show_email
	 *
	 * @return bool show email addr in ad
	 */
	public function getShowEmail() {
		return $this->showEmail;
	}
	
	/**
	 * Returns the boolean state of show_email
	 *
	 * @return bool The state of show_email
	 */
	public function isShowEmail() {
		$this->getShowEmail();
	}
	
	/**
	 * Setter for duration
	 *
	 * @param int $duration duration in days
	 * @return void
	 */
	public function setDuration($duration) {
		$starttime = $this->getStarttime();
		$temp_time = mktime(0,0,0,date('m',$starttime),date('d',$starttime)+$duration,date('Y',$starttime));
		$this->duration = $duration;
		$this->setEndtime($temp_time);
	}

	/**
	 * Getter for duration
	 *
	 * @return int duration in days
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
	 * Setter for pricetype
	 *
	 * @param int $pricetype VHB or FP
	 * @return void
	 */
	public function setPricetype($price_type) {
		$this->pricetype = $price_type;
	}

	/**
	 * Getter for pricetype
	 *
	 * @return int VHB or FP
	 */
	public function getPricetype() {
		return $this->pricetype;
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
	 * Sets the poster value
	 *
	 * @param Tx_NasMarket_Domain_Model_Poster $poster The Poster of the Ad
	 * @return void
	 */
	public function setPoster(Tx_NasMarket_Domain_Model_Poster $poster) {
		$this->poster = $poster;
	}

	/**
	 * Returns the poster value
	 *
	 * @return Tx_NasMarket_Domain_Model_Poster
	 */
	public function getPoster() {
		return $this->poster;
	}
	
}
?>