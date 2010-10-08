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
		t3lib_div::devLog('settings', 'test' , 0, $this->settings);
	}
	/**
	 * Standard action for this controller. Displays the whole Market
	 */
	public function indexAction() {
		$categories = $this->categoryRepository->findAllByParent();
		//Workaround for empty Category in selection
		$empty_cat = array();
		$empty_cat[] = array('uid' => 0);
		$categories = array_merge($empty_cat,$categories);
		
		$ads = $this->getPreviewAds();
		$sStuff = $this->request->getArguments();
			
		//t3lib_div::devLog('ads', 'test' , 0, array($ads[0]->getTitle()));
		$this->view->assign('categories', $categories);
		$this->view->assign('ads', $ads);
		$this->view->assign('sStuff', $sStuff);
	}
	
	/**
	 * Action to show the Search results
	 */
	public function searchAction() {
		$categories = $this->categoryRepository->findAllByParent();
		//Workaround for empty Category in selection
		$empty_cat = array();
		$empty_cat[] = array('uid' => 0);
		$categories = array_merge($empty_cat,$categories);
		$ads = $this->getSearchResults();
		$sStuff = $this->request->getArguments();
		$sStuff_baseCat = $this->categoryRepository->findBaseCatByUid(intval($sStuff['scat']));
		$sStuff['scat'] = $sStuff_baseCat;
		
		//t3lib_div::devLog('search', 'test' , 0, $sStuff);
		
		if (count($ads) == 0) {
			$sStuff['scat'] = 0;
			$this->forward('index');
		}
		$this->view->assign('categories', $categories);
		$this->view->assign('ads', $ads);
		$this->view->assign('sStuff', $sStuff);
	}
	
	/**
	 * Action to show only the Search-Bar
	 */
	public function searchBarIndexAction() {
		$categories = $this->categoryRepository->findAllByParent();
		$this->view->assign('categories', $categories);
	}
	
	/**
	 * Action to show only the CatTree
	 */
	public function catTreeIndexAction() {
		$categories = $this->categoryRepository->findAllByParent();
		$this->view->assign('categories', $categories);
	}
	
	/**
	 * Action to show only the Previews
	 */
	public function PreviewIndexAction() {
		$ads = $this->getPreviewAds();
		$this->view->assign('ads', $ads);
	}
	
	/**
	 * get the Ads in the right PreviewOrder
	 */
	public function getPreviewAds(){
		switch ($this->settings['previewSorting']) {
			case 'ENDING_ASC': $ads = $this->adRepository->findAllOrderedBy('endtime','ascending');
				break;
			case 'CREATE_DESC': $ads = $this->adRepository->findAllOrderedBy('crdate','descending');
				break;
			case 'CREATE_ASC': $ads = $this->adRepository->findAllOrderedBy('crdate', 'ascending');#
				break;
			default: $ads = $this->adRepository->findAllOrderedBy('endtime', 'descending');
				break;
		}
		return $ads;
	}
	
	/**
	 * gets the Ads for the Search Terms
	 */
	public function getSearchResults(){
		$arguments = $this->request->getArguments();
		//t3lib_div::devLog('search args', 'test' , 0, $arguments);
		$orderBy = 'endtime';
		$orderType = 'ascending';
		$ads = $this->adRepository->getBySearchCrits($arguments['swords'],$arguments['swhere'],$arguments['scat'],$orderBy,$orderType);
		
		return $ads;
	}
}
?>