<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Marketplace'
);

$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'nas Market');
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'pages,layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi1.xml');


t3lib_extMgm::addLLrefForTCAdescr('tx_nasmarket_domain_model_category','EXT:nas_market/Resources/Private/Language/locallang_csh_tx_nasmarket_domain_model_category.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_nasmarket_domain_model_category');
$TCA['tx_nasmarket_domain_model_category'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_category',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
                'sortby'                        => 'sorting',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_nasmarket_domain_model_category.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_nasmarket_domain_model_ad','EXT:nas_market/Resources/Private/Language/locallang_csh_tx_nasmarket_domain_model_ad.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_nasmarket_domain_model_ad');
$TCA['tx_nasmarket_domain_model_ad'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
                        'starttime' => 'starttime',
                        'endtime' => 'endtime'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Ad.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_nasmarket_domain_model_ad.gif'
	)
);

$tempColumns = Array (
		'agb_accepted' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_feuser.agb_accepted',
			'config'  => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'show_email' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_feuser.show_email',
			'config'  => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'show_phone' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_feuser.show_phone',
			'config'  => array(
				'type' => 'check',
				'default' => 0
			)
		)
	);

t3lib_div::loadTCA("fe_users");
t3lib_extMgm::addTCAcolumns("fe_users",$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes("fe_users","--div--;Market,agb_accepted,show_email,show_phone");

?>