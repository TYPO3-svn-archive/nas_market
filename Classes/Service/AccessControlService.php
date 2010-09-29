<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Nadine Schwingler <naddy@schattenhandel.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General protected License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General protected License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General protected License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * An access control service
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class Tx_NasMarket_Service_AccessControlService implements t3lib_Singleton {

	/**
	 * Tests, if the user is in the correct ug
	 *
	 * @param int $ug ID of the Usergroup for New Ads
	 * @return bool The result; TRUE if the user is in the UG for new ads; other: false
	 */
	public function isInNewAddUG($ug) {
                if($this->hasLoggedInFrontendUser() && !empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
                    $groups = $this->getFrontendUserGroups();
                    if (in_array($ug, $groups)){
                        return TRUE;
                    }
                }
                //t3lib_div::debug($groups,'ACS');
                return FALSE;
	}
	
	/**
	 * Tests, if the user has accepted the business-terms
	 *
	 * @return bool The result; TRUE if the user hast accepted; other: false
	 */
	public function hasTermsAccepted() {
                if($this->hasLoggedInFrontendUser() && !empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
                    if ($GLOBALS['TSFE']->fe_user->user['tx_nasmarket_agb_accepted'] == 1){
                        return TRUE;
                    }
                }
                return FALSE;
	}	
		
	public function backendAdminIsLoggedIn() {
		return $GLOBALS['TSFE']->beUserLogin === 1 ? TRUE : FALSE;
	}
	
	public function hasLoggedInFrontendUser() {
		return $GLOBALS['TSFE']->loginUser === 1 ? TRUE : FALSE;
	}
	
	public function getFrontendUserGroups() {
		if($this->hasLoggedInFrontendUser()) {
			return $GLOBALS['TSFE']->fe_user->groupData['uid'];
		}
		return array();
	}
	
	public function getFrontendUserUid() {
		if($this->hasLoggedInFrontendUser() && !empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
			return intval($GLOBALS['TSFE']->fe_user->user['uid']);
		}
		return NULL;
	}
			
}
?>