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
 * Controller for the category object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

// TODO: As your extension matures, you should use Tx_Extbase_MVC_Controller_ActionController as base class, instead of the ScaffoldingController used below.
class Tx_NasMarket_Controller_categoryController extends Tx_Extbase_MVC_Controller_ActionController {
	
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
	 * List action for this controller. Displays all categories.
	 */
	public function indexAction() {
		$categories = $this->categoryRepository->findAll();
		$this->view->assign('categories', $categories);
	}

	/**
	 * Action that displays a single category
	 *
	 * @param Tx_NasMarket_Domain_Model_category $category The category to display
	 */
	public function showAction(Tx_NasMarket_Domain_Model_category $category) {
		$this->view->assign('category', $category);
	}

	/**
	 * Displays a form for creating a new category
	 *
	 * @param Tx_NasMarket_Domain_Model_category $newcategory A fresh category object taken as a basis for the rendering
	 * @dontvalidate $newcategory
	 */
	public function newAction(Tx_NasMarket_Domain_Model_category $newcategory = NULL) {
		$this->view->assign('newcategory', $newcategory);
	}

	/**
	 * Creates a new category and forwards to the index action.
	 *
	 * @param Tx_NasMarket_Domain_Model_category $newcategory A fresh category object which has not yet been added to the repository
	 */
	public function createAction(Tx_NasMarket_Domain_Model_category $newcategory) {
		$this->categoryRepository->add($newcategory);
		$this->flashMessageContainer->add('Your new category was created.');
		$this->redirect('index');
	}

	/**
	 * Displays a form to edit an existing category
	 *
	 * @param Tx_NasMarket_Domain_Model_category $category The category to display
	 * @dontvalidate $category
	 */
	public function editAction(Tx_NasMarket_Domain_Model_category $category) {
		$this->view->assign('category', $category);
	}

	/**
	 * Updates an existing category and forwards to the index action afterwards.
	 *
	 * @param Tx_NasMarket_Domain_Model_category $category The category to display
	 */
	public function updateAction(Tx_NasMarket_Domain_Model_category $category) {
		$this->categoryRepository->update($category);
		$this->flashMessageContainer->add('Your category was updated.');
		$this->redirect('index');
	}

	/**
	 * Deletes an existing category
	 *
	 * @param Tx_NasMarket_Domain_Model_category $category The category to be deleted
	 */
	public function deleteAction(Tx_NasMarket_Domain_Model_category $category) {
		$this->categoryRepository->remove($category);
		$this->flashMessageContainer->add('Your category was removed.');
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