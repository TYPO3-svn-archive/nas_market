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
 * This Utility
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_NasMarket_Utility_Imageresize {
        
    /**
     * Resizes a given image
     *
     * @var string $filename The file name
     * @var int $maxHeight new max Height
     * @var int $maxWidth new max Width
     * @return void
     */
    public static function resize($filename, $maxWidth, $maxHeight) {
        $image_info = getimagesize($filename);
        
        t3lib_div::devLog('test', 'Utility_ImageResize', 0, $image_info);
        
        $image_type = $image_info[2];
        if( $image_type == IMAGETYPE_JPEG ) {
            $image = imagecreatefromjpeg($filename);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            $image = imagecreatefromgif($filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            $image = imagecreatefrompng($filename);
        }
        
        $width = imagesx($image);
        $height = imagesy($image);
        if ($width > $maxWidth AND $height > $maxHeight){
            //if its wider
            if ($width > $height){
                $ratio = $maxWidth / $width;
                $newWidth = $maxWidth;
                $newHeight = $height * $ratio;
            //else if its heighter
            } else {
                $ratio = $maxHeight / $height;
                $newWidth = $width * $ratio;
                $newHeight = $maxHeight;
            }
            $new_image = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($new_image, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            $image = $new_image;
        } elseif ($width > $maxWidth){
            $ratio = $maxWidth / $width;
            $newWidth = $maxWidth;
            $newHeight = $height * $ratio;
            $new_image = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($new_image, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            $image = $new_image;
        } elseif ($height > $maxHeight){
            $ratio = $maxHeight / $height;
            $newWidth = $width * $ratio;
            $newHeight = $maxHeight;
            $new_image = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($new_image, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            $image = $new_image;
        }
        
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($image,$filename,75);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($image,$filename);         
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($image,$filename);
        }  
    }
    

}
?>