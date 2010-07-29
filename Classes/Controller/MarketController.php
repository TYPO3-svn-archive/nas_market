<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Nadine Schwingler <schwingler@kennziffer.com>, kennziffer.com
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
 * Controller for the questionnaire object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_NasMarket_Controller_MarketController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_NasMarket_Domain_Repository_CategoryRepository
	 */
	protected $categoryRepository;
        
        /**
	 * @var Tx_NasMarket_Domain_Repository_AdRepository
	 */
	protected $adRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->categoryRepository = t3lib_div::makeInstance('Tx_NasMarket_Domain_Repository_CategoryRepository');
                $this->adRepository = t3lib_div::makeInstance('Tx_NasMarket_Domain_Repository_AdRepository');
		//t3lib_div::devLog('settings', 'test' , 0, $this->settings);
	}
	/**
	 * List action for this controller. Displays all questions.
	 */
	public function indexAction() {
		$categories = $this->categoryRepository->findAll();
                $ads = $this->adRepository->findAll();
		//t3lib_div::debug($categories);
		$this->view->assign('categories', $categories);
                $this->view->assign('ads', $ads);
        }	
}
?>