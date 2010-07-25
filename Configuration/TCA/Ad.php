<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_nasmarket_domain_model_ad'] = array(
	'ctrl' => $TCA['tx_nasmarket_domain_model_ad']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,description,type1,type2,images,different_location,dl_zip,dl_city,dl_address,dl_country,show_phone,show_email,duration,price,category'
	),
	'types' => array(
		'1' => array('showitem' => 'title,description,type1,type2,images,different_location,dl_zip,dl_city,dl_address,dl_country,show_phone,show_email,duration,price,category')
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
				'eval' => 'trim'
			)
		),
		'type1' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.type1',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'type2' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.type2',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
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
		'different_location' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.different_location',
			'config'  => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'dl_zip' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.dl_zip',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'dl_city' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.dl_city',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'dl_address' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.dl_address',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'dl_country' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.dl_country',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'show_phone' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.show_phone',
			'config'  => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'show_email' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.show_email',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'duration' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.duration',
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
				'eval' => 'double2'
			)
		),
		'category' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.category',
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