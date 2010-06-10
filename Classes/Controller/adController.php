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
 * Controller for the ad object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

// TODO: As your extension matures, you should use Tx_Extbase_MVC_Controller_ActionController as base class, instead of the ScaffoldingController used below.
class Tx_NasMarket_Controller_adController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_NasMarket_Domain_Repository_adRepository
	 */
	protected $adRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->adRepository = t3lib_div::makeInstance('Tx_NasMarket_Domain_Repository_adRepository');
	}
	/**
	 * List action for this controller. Displays all ads.
	 */
	public function indexAction() {
		$ads = $this->adRepository->findAll();
		$this->view->assign('ads', $ads);
	}

	/**
	 * Action that displays a single ad
	 *
	 * @param Tx_NasMarket_Domain_Model_ad $ad The ad to display
	 */
	public function showAction(Tx_NasMarket_Domain_Model_ad $ad) {
		$this->view->assign('ad', $ad);
	}

	/**
	 * Displays a form for creating a new ad
	 *
	 * @param Tx_NasMarket_Domain_Model_ad $newad A fresh ad object taken as a basis for the rendering
	 * @dontvalidate $newad
	 */
	public function newAction(Tx_NasMarket_Domain_Model_ad $newad = NULL) {
		$this->view->assign('newad', $newad);
	}

	/**
	 * Creates a new ad and forwards to the index action.
	 *
	 * @param Tx_NasMarket_Domain_Model_ad $newad A fresh ad object which has not yet been added to the repository
	 */
	public function createAction(Tx_NasMarket_Domain_Model_ad $newad) {
		$this->adRepository->add($newad);
		$this->flashMessageContainer->add('Your new ad was created.');
		$this->redirect('index');
	}

	/**
	 * Displays a form to edit an existing ad
	 *
	 * @param Tx_NasMarket_Domain_Model_ad $ad The ad to display
	 * @dontvalidate $ad
	 */
	public function editAction(Tx_NasMarket_Domain_Model_ad $ad) {
		$this->view->assign('ad', $ad);
	}

	/**
	 * Updates an existing ad and forwards to the index action afterwards.
	 *
	 * @param Tx_NasMarket_Domain_Model_ad $ad The ad to display
	 */
	public function updateAction(Tx_NasMarket_Domain_Model_ad $ad) {
		$this->adRepository->update($ad);
		$this->flashMessageContainer->add('Your ad was updated.');
		$this->redirect('index');
	}

	/**
	 * Deletes an existing ad
	 *
	 * @param Tx_NasMarket_Domain_Model_ad $ad The ad to be deleted
	 */
	public function deleteAction(Tx_NasMarket_Domain_Model_ad $ad) {
		$this->adRepository->remove($ad);
		$this->flashMessageContainer->add('Your ad was removed.');
		$this->redirect('index');
	}
	

	
	/**
	 * list action
	 *
	 * @return string The rendered list action
	 */
	public function listAction() {
	}
	
}
?>