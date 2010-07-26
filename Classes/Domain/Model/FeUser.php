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
 * FeUser
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_NasMarket_Domain_Model_FeUser extends Tx_Extbase_Domain_Model_FrontendUser  {
	
	/**
	 * agb accepted
	 * @var boolean
	 */
	protected $agb_accepted;
	
	/**
	 * standard for show email in ads
	 * @var boolean
	 */
	protected $show_email;
	
	/**
	 * standard for show phone in ads
	 * @var boolean
	 */
	protected $show_phone;
	
	
	
	/**
	 * Setter for agb_accepted
	 *
	 * @param boolean $agb_accepted agb accepted
	 * @return void
	 */
	public function setAgb_accepted($agb_accepted) {
		$this->agb_accepted = $agb_accepted;
	}

	/**
	 * Getter for agb_accepted
	 *
	 * @return boolean agb accepted
	 */
	public function getAgb_accepted() {
		return $this->agb_accepted;
	}
	
	/**
	 * Returns the boolean state of agb_accepted
	 *
	 * @return bool The state of agb_accepted
	 */
	public function isAgb_accepted() {
		$this->getAgb_accepted();
	}
	
	/**
	 * Setter for show_email
	 *
	 * @param boolean $show_email standard for show email in ads
	 * @return void
	 */
	public function setShow_email($show_email) {
		$this->show_email = $show_email;
	}

	/**
	 * Getter for show_email
	 *
	 * @return boolean standard for show email in ads
	 */
	public function getShow_email() {
		return $this->show_email;
	}
	
	/**
	 * Returns the boolean state of show_email
	 *
	 * @return bool The state of show_email
	 */
	public function isShow_email() {
		$this->getShow_email();
	}
	
	/**
	 * Setter for show_phone
	 *
	 * @param boolean $show_phone standard for show phone in ads
	 * @return void
	 */
	public function setShow_phone($show_phone) {
		$this->show_phone = $show_phone;
	}

	/**
	 * Getter for show_phone
	 *
	 * @return boolean standard for show phone in ads
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
	
}
?>