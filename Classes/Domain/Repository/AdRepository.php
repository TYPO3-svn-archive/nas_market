<?php
/***************************************************************
*  Copyright notice
*
*  (c)  TODO - INSERT COPYRIGHT
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
 * Repository for Tx_NasMarket_Domain_Model_ad
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_NasMarket_Domain_Repository_AdRepository extends Tx_Extbase_Persistence_Repository {
	
	/**
	* Finds all ads but sorted
	*
	* @param string orderBy clause
	* @param string type descending or ascending
	* @return array Ads
	*/
	public function findAllOrderedBy($orderBy = 'endtime',$type=''){
		$query = $this->createQuery();
		    
		$orderType = Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING;
		if ($type == 'ascending') $orderType = Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING;
		$query->setOrderings(array($orderBy => $orderType));
		#t3lib_div::debug($query);
		return $query->execute();
	}
	
	/**
	 * Find all ads by the search Criteria
	 *
	 * @param string swords Words the title of the ad should contain
	 * @param string swhere Name of Place the ad should be in
	 * @param string scat Base Cat the Ad should be in
	 * @param string orderBy clause
	 * @param string type descending or ascending
	 * @return array Ads
	 */
	public function getBySearchCrits($swords,$swhere,$scat,$orderBy,$orderType){
		$orderType = Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING;
		if ($orderType == 'ascending') $orderType = Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING;
		
		$query = $this->createQuery();
		$sword_constraint = $query->like('title','%'.$swords.'%');
		$query->matching($sword_constraint);
		$query->setOrderings(array($orderBy => $orderType));
		
		$results = $query->execute();
		$returner = array();
		foreach ($results as $result){
			$adder = false;
			if ($swords != '') $adder = true;
			if ($swhere != ''){
				if ($result->getDifferentLocation() == 1){
					if (preg_match("/".$swhere."/i",$result->getDlCity()) or preg_match("/".$swhere."/i",$result->getDlZip())){
						$adder = true;
					} else {
						$adder = false;
					}
				} else {
					if (preg_match("/".$swhere."/i",$result->getPoster()->getCity()) or preg_match("/".$swhere."/i",$result->getPoster()->getZip())){
						$adder = true;
					} else {
						$adder = false;
					}
				}
			}
			if ($scat != 0){
				$adder = false;
				$catRep = t3lib_div::makeInstance('Tx_NasMarket_Domain_Repository_CategoryRepository');
				$actCat = $result->getCategory();
				$actCat = $actCat->current();
				if ($actCat->getUid() == $scat){
					$adder = true;
				} else {
					$parent = $actCat->getParentcat();
					if ($parent) {
						if ($parent->getUid() == $scat) {
							$adder = true;
						} else {
							$basecat = $parent->getParentcat();
							if ($basecat){
								if ($basecat->getUid() == $scat){
									$adder = true;
								}
							}
						}
					}
				}
			}
			if ($adder) {
				$returner[] = $result;
			}
		}
			
		return $returner;
	}

}
?>