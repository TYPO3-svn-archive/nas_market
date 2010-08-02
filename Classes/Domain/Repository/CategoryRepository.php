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
 * Repository for Tx_NasMarket_Domain_Model_Category
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_NasMarket_Domain_Repository_CategoryRepository extends Tx_Extbase_Persistence_Repository {
    
    /**
    * Finds all category by a prent
    *
    * @param Tx_NasMarket_Domain_Model_Category $parent The Parent Category for the tree
    * @return array The categories
    */
    public function findAllByParent(Tx_NasMarket_Domain_Model_Category $parent = NULL){
        $query = $this->createQuery();
        if ($parent == NULL) $query->matching($query->equals('parentcat', 0));
        else {
            $query->matching($query->equals('parentcat', $parent));
        }
        
        $query->setOrderings(array('sorting' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
        #t3lib_div::debug($query);
	return $query->execute();
    }
}
?>