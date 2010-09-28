<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_nasmarket_domain_model_ad'] = array(
	'ctrl' => $TCA['tx_nasmarket_domain_model_ad']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'starttime,duration,endtime,title,description,type1,type2,images,different_location,dl_zip,dl_city,dl_address,dl_country,show_phone,show_email,price,pricetype,category,poster'
	),
	'types' => array(
		'1' => array('showitem' => 'starttime,duration,endtime,title,description,type1,type2,images,different_location,dl_zip,dl_city,dl_address,dl_country,show_phone,show_email,price,pricetype,category,poster')
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
                'starttime' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'default'  => '0',
				'checkbox' => '0'
			)
		),
                'endtime' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'default'  => '0',
				'checkbox' => '0'
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
				'type' => 'text',
				'rows' => 30,
				'cols' => 80,
                                'eval' => 'required'
			)
		),
		'type1' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.type1',
			'config'  => array(
				'type' => 'select',
                                'items' => array(
                                    array('LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.type1.0',0),
                                    array('LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.type1.1',1),
                                ),
				'size' => 1,
                                'maxitems' => 1,
                                'default' => 0
			)
		),
		'type2' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.type2',
			'config'  => array(
				'type' => 'select',
                                'items' => array(
                                    array('LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.type2.0',0),
                                    array('LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.type2.1',1),
                                ),
				'size' => 1,
                                'maxitems' => 1,
                                'default' => 0
			)
		),
		'images' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.images',
			'config'  => array(
				'type' => 'group',
                                'internal_type' => 'file',
                                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => 1000,
				'uploadfolder' => '',
                                'show_thumbs' => 0,
                                'size' => 4,
                                'maxitems' => 4,
                                'minitems' => 0,
                                'autoSizeMax' => 10
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
                        'displayCond' => 'FIELD:different_location:=:1',
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.dl_zip',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'dl_city' => array(
                        'displayCond' => 'FIELD:different_location:=:1',
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.dl_city',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'dl_address' => array(
                        'displayCond' => 'FIELD:different_location:=:1',
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.dl_address',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'dl_country' => array(
                        'displayCond' => 'FIELD:different_location:=:1',
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
				'type' => 'check',
				'default' => 0
			)
		),
		'duration' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.duration',
			'config'  => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'int'
			)
		),
		'price' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.price',
			'config'  => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'double2,required',
			)
		),
                'pricetype' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.price_type',
			'config'  => array(
				'type' => 'select',
                                'items' => array(
                                    array('LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.price_type.0',0),
                                    array('LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.price_type.1',1),
                                ),
				'size' => 1,
                                'maxitems' => 1,
                                'default' => 0
			)
		),
		'category' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.category',
			'config'  => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_nasmarket_domain_model_category',
				'MM' => 'tx_nasmarket_ad_category_mm',
                                'MM_opposite_field' => 'ads',
				'maxitems' => 99999
			)
		),
		'poster' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_ad.poster',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'foreign_table_where' => "AND fe_users.tx_extbase_type='Tx_NasMarket_Domain_Model_Poster'",
				'items' => array(
					array('--none--', 0),
				)
    			)
		),
	),
);
?>