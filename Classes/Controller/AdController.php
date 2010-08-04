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

class Tx_NasMarket_Controller_AdController extends Tx_Extbase_MVC_Controller_ActionController {
	
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
                parent::initializeAction();
                
		$this->categoryRepository = t3lib_div::makeInstance('Tx_NasMarket_Domain_Repository_CategoryRepository');
                $this->adRepository = t3lib_div::makeInstance('Tx_NasMarket_Domain_Repository_AdRepository');
		//t3lib_div::devLog('settings', 'test' , 0, $this->settings);
	}
	
        /**
	 * New action for this controller.
	 *
	 * @return void
	 */
	public function newAction() {
                $categories = $this->categoryRepository->findAllByParent();
                $ads = $this->adRepository->findAll();
		$this->view->assign('categories', $categories);
                $this->view->assign('ads', $ads);
        }
        
        /**
	 * Sets the Sub-Cats
	 *
	 * @return void
	 * @ajax
	 */
	public function cat2Action() {
            //t3lib_div::devLog('test', 'test', 0, array($_POST,$_GET));
            $parentCat = $this->categoryRepository->findByUid($this->request->getArgument('parentCat'));
            $categories = $this->categoryRepository->findAllByParent($parentCat,'title');
            $this->view->assign('categories',$categories);
            
            $rendered = $this->view->render();
            
            echo $rendered;
            exit;
        }
        
        /**
	 * Sets the 2. Sub-Cats
	 *
	 * @return void
	 * @ajax
	 */
	public function cat3Action() {
            //t3lib_div::devLog('test', 'test', 0, array($_POST,$_GET));
            $parentCat = $this->categoryRepository->findByUid($this->request->getArgument('parentCat'));
            $categories = $this->categoryRepository->findAllByParent($parentCat,'title');
            $this->view->assign('categories',$categories);
            
            $rendered = $this->view->render();
            
            echo $rendered;
            exit;
        }
}
?>