<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
                'Market'    =>  'index',
                'Ad'        =>  'new, new2, ajaxNewCat2, ajaxNewCat3, ajaxNewSelectedCat'
	),
	array(
                'Market'    =>  'index',
                'Ad'        =>  'new, new2, ajaxNewCat2, ajaxNewCat3, ajaxNewSelectedCat'
	)
);

?>