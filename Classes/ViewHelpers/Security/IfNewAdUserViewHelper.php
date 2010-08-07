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
 * View helper for checking access rights.
 */
class Tx_NasMarket_ViewHelpers_Security_IfNewAdUserViewHelper extends Tx_Fluid_ViewHelpers_IfViewHelper {

	/**
	 * Checks, if the given frontend user has access to the new-Ad-Page
	 *
	 * @param mixed $person The person to be tested for login
	 * @return string The output
	 */
	public function render() {
		$accessControllService = t3lib_div::makeInstance('Tx_NasMarket_Service_AccessControlService');
		//original Line
		//if ($accessControllService->isLoggedIn($person) || $accessControllService->backendAdminIsLoggedIn()) {
		$settings = $this->templateVariableContainer->get('settings');
		//t3lib_div::debug($settings,'UH');
		if ($accessControllService->isInNewAddUG($settings['newAdUG'])) {
			return $this->renderThenChild();
		} else {
			return $this->renderElseChild();
		}
	}
	
}
?>