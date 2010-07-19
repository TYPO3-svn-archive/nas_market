<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_nasmarket_domain_model_ad'] = array(
	'ctrl' => $TCA['tx_nasmarket_domain_model_ad']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,description,images,price,duraction,active,categories'
	),
	'types' => array(
		'1' => array('showitem' => 'title,description,images,price,duraction,active,categories')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_nasmarket_domain_model_ad',
				'foreign_table_where' => 'AND tx_nasmarket_domain_model_ad.uid=###REC_FIELD_l18n_parent### AND tx_nasmarket_domain_model_ad.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.description',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'images' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.images',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'price' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.price',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2,required'
			)
		),
		'duraction' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.duraction',
			'config'  => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'active' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.active',
			'config'  => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'categories' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.categories',
			'config'  => array(
				'type' => 'inline',
				'foreign_table' => 'tx_nasmarket_domain_model_category',
				'MM' => 'tx_nasmarket_ad_category_mm',
				'maxitems' => 99999
			)
		),
	),
);
?>