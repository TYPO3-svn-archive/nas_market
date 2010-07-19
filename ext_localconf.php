<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Category' => 'index, show, new, create, edit, update, delete','Ad' => 'index, show, new, create, edit, update, delete',
	),
	array(
		'Category' => 'create, update, delete','Ad' => 'create, update, delete',
	)
);

?>