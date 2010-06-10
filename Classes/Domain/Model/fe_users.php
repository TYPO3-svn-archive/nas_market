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
 * fe_users additions
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_NasMarket_Domain_Model_fe_users extends Tx_Extbase_DomainObject_AbstractValueObject {
	
	/**
	 * agbs accepted
	 * @var boolean
	 */
	protected $agbs_accepted;
	
	/**
	 * ads type
	 * @var string
	 */
	protected $ads_type;
	
	
	
	/**
	 * Setter for agbs_accepted
	 *
	 * @param boolean $agbs_accepted agbs accepted
	 * @return void
	 */
	public function setAgbs_accepted($agbs_accepted) {
		$this->agbs_accepted = $agbs_accepted;
	}

	/**
	 * Getter for agbs_accepted
	 *
	 * @return boolean agbs accepted
	 */
	public function getAgbs_accepted() {
		return $this->agbs_accepted;
	}
	
	/**
	 * Returns the boolean state of agbs_accepted
	 *
	 * @return bool The state of agbs_accepted
	 */
	public function isAgbs_accepted() {
		$this->getAgbs_accepted();
	}
	
	/**
	 * Setter for ads_type
	 *
	 * @param string $ads_type ads type
	 * @return void
	 */
	public function setAds_type($ads_type) {
		$this->ads_type = $ads_type;
	}

	/**
	 * Getter for ads_type
	 *
	 * @return string ads type
	 */
	public function getAds_type() {
		return $this->ads_type;
	}
	
}
?>