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
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Testcase for an age range
 */
class Tx_NasMarket_Domain_Model_FeUserTest extends Tx_Extbase_BaseTestCase {
    
    /**
     * @test
     */
    public function thereIsAFeUserObject() {
        $user = t3lib_div::makeInstance('Tx_NasMarket_Domain_Model_FeUser');
        $user->setAGB_accepted(true);
        t3lib_div::debug($user,'user');
    }
}
?>