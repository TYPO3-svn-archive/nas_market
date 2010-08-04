<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
                'Market'    =>  'index',
                'Ad'        =>  'new, cat2, cat3'
	),
	array(
                'Market'    =>  'index',
                'Ad'        =>  'new, cat2, cat3'
	)
);

?>