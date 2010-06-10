<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
                'market' => 'index, menu',
                'category' => 'index, show, new, create, edit, update, delete',
		'ad' => 'index, show, new, create, edit, update, delete',
	),
	array(
                'market' => 'index, menu',
		'category' => 'create, update, delete',
                'ad' => 'index, show, new, create, edit, update, delete',
	)
);

?>