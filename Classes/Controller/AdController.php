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
         * @var string
         */
        protected $basePath;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
                parent::initializeAction();
                
                $this->categoryRepository = t3lib_div::makeInstance('Tx_NasMarket_Domain_Repository_CategoryRepository');
                $this->adRepository = t3lib_div::makeInstance('Tx_NasMarket_Domain_Repository_AdRepository');
                
                $this->basePath = realpath('.');
		//t3lib_div::devLog('settings', 'test' , 0, $this->settings);
	}
	
        /**
	 * New action for this controller.
	 *
	 * @param Tx_NasMarket_Domain_Model_Ad $newAd
	 * @return string An HTML Page for Cat-Selection (1.Step)
	 * @dontvalidate $newAd
	 * @dontverifyrequesthash
	 */
	public function newAction(Tx_NasMarket_Domain_Model_Ad $newAd = NULL) {
                //t3lib_div::devLog('test', 'newAction', 0, array($_POST,$_GET, $_FILES, realpath('.')));
                $categories = $this->categoryRepository->findAllByParent();
                //$ads = $this->adRepository->findAll();
				$this->view->assign('categories', $categories);
				$this->view->assign('market_pid', $GLOBALS['TSFE']->id);
        }
        
        /**
	 * New Step 2 action for this controller.
	 *
	 * @param Tx_NasMarket_Domain_Model_Ad $newAd
	 * @return string An HTML form for creating a new ad
	 * @dontvalidate $newAd
	 * @dontverifyrequesthash
	 */
	public function newStep2Action(Tx_NasMarket_Domain_Model_Ad $newAd) {
                $temp = $this->request->getArgument('newAd');
                $cat = $this->categoryRepository->findByUid($temp['category']);
                $newAd->addCategory($cat);
                $this->view->assign('category',array($cat));
                $this->view->assign('newAd',$newAd);
                
                //t3lib_div::debug($newAd, 'newStep2');
                t3lib_div::devLog('test new Step 2', 'newStep2', 0, array($_POST,$_GET, $_FILES, realpath('.')));
                t3lib_div::devLog('arguments', 'test' , 0, $this->request->getArguments());
        }
        
        /**
	 * Creates a new ad
	 *
	 * @param Tx_NasMarket_Domain_Model_Ad $newAd
	 * @return void
	 */
	public function createAction(Tx_NasMarket_Domain_Model_Ad $newAd = NULL) {
                t3lib_div::debug($newAd, 'create');
                $newAd->setStarttime(time());
                $newAd->setDuration($newAd->getDuration());
                $this->adRepository->add($newAd);
		$this->flashMessages->add('Your new ad was created.');
		$this->redirect('index','Market');
                
	}
        
        /**
         * Uploads an Image
         *
         * @return void
         * @ajax
         */
        public function ajaxNewAddImageUploadAction() {
            t3lib_div::devLog('test', 'test', 0, array($_POST,$_GET, $_FILES, realpath('.')));
            if ($_FILES['myfile']['size'] > ($this->settings['maxUploadImageSize']*1024)){
                echo "error_toobig";
            } else {
                $uploaddir = $this->settings['uploadImagePath'];
                $userdir = $GLOBALS['TSFE']->fe_user->user['username'].'/';
                mkdir($this->basePath.'/'.$uploaddir.$userdir,0777);
                //t3lib_div::devLog('test', 'test', 0, array($this->basePath,$uploaddir,$userdir));
                
                $filename = basename($_FILES['myfile']['name']);
                $temp_name = explode('.',$filename);
                $ending = $temp_name[count($temp_name)-1];
                unset($temp_name[count($temp_name)-1]);
                $thumbname = implode('.',$temp_name).'_thumb.'.$ending;
                $uploadfile = $this->basePath.'/'.$uploaddir.$userdir.$filename;
                $thumbfile = $this->basePath.'/'.$uploaddir.$userdir.$thumbname;
                //t3lib_div::devLog('dir/file', 'ajaxNewAddImageUploadAction', 0, array($uploaddir,$uploadfile));
                   
                //move_uploaded_file ist die Standard PHP-Funktion um Dateien auf dem Server zu verarbeiten
                if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {
                    Tx_NasMarket_Utility_Imageresize::resize($uploadfile,$uploadfile,$this->settings['imageWidth'],$this->settings['imageHeight']);
                    Tx_NasMarket_Utility_Imageresize::resize($uploadfile,$thumbfile,$this->settings['thumbWidth'],$this->settings['thumbHeight']);
                    echo $this->settings['uploadImagePath'].$userdir.$thumbname;
                } else {
                    // Als echo keinesfalls false benutzen. Führt zu Konflikten mit dem Ajax-Request
                    echo "error";
                }
            }
            exit;
        }
        
        /**
	 * Sets the Sub-Cats
	 *
	 * @return void
	 * @ajax
	 */
	public function ajaxNewCat2Action() {
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
	public function ajaxNewCat3Action() {
            //t3lib_div::devLog('test', 'test', 0, array($_POST,$_GET));
            $parentCat = $this->categoryRepository->findByUid($this->request->getArgument('parentCat'));
            $categories = $this->categoryRepository->findAllByParent($parentCat,'title');
            $this->view->assign('categories',$categories);
            
            $rendered = $this->view->render();
            
            echo $rendered;
            exit;
        }
        
        /**
	 * Sets the Selected-Cat-Line
	 *
	 * @return void
	 * @ajax
	 */
	public function ajaxNewSelectedCatAction() {
            //t3lib_div::devLog('test', 'test', 0, array($_POST,$_GET));
            $cat = $this->categoryRepository->findByUid($this->request->getArgument('cat'));
            $this->view->assign('category',array($cat));
            
            $rendered = $this->view->render();
            
            echo $rendered;
            exit;
        }
}
?>