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
 * Controller for the market object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

// TODO: As your extension matures, you should use Tx_Extbase_MVC_Controller_ActionController as base class, instead of the ScaffoldingController used below.
class Tx_NasMarket_Controller_marketController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_NasMarket_Domain_Repository_categoryRepository
	 */
	protected $categoryRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->categoryRepository = t3lib_div::makeInstance('Tx_NasMarket_Domain_Repository_categoryRepository');
	}
        
	/**
	 * Index action for this controller. Displays all categories.
	 */
	public function indexAction() {
		$categories = $this->categoryRepository->findAll();
                $market = array();
                $market['title'] = 'Test-Übergabe';
                //$market['categories'] = $categories;
                //t3lib_div::devLog('Flex Form Array pi1', 'market', 0, $this->settings);
                $this->view->assign('market', $market);
                $this->view->assign('categories', $categories);
	}
        
        /**
	 * List action for this controller. Displays all categories.
	 */
	public function menuAction() {
		//$this->view->assign('market', $market);
	}
}
?>