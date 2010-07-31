<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_nasmarket_domain_model_category'] = array(
	'ctrl' => $TCA['tx_nasmarket_domain_model_category']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,image,parent,children'
	),
	'types' => array(
		'1' => array('showitem' => 'title,parent,image,children')
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
				'foreign_table' => 'tx_nasmarket_domain_model_category',
				'foreign_table_where' => 'AND tx_nasmarket_domain_model_category.uid=###REC_FIELD_l18n_parent### AND tx_nasmarket_domain_model_category.sys_language_uid IN (-1,0)',
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
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_category.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
                'image' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_category.image',
			'config'  => array(
				'type' => 'group',
                                'internal_type' => 'file',
                                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => 1000,
				'uploadfolder' => 'uploads/pics',
                                'show_thumbs' => 1,
                                'size' => 1,
                                'maxitems' => 1,
                                'minitems' => 0
			)
		),
		'parent' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_category.parent',
			'config'  => array(
				'type' => 'group',
                                'internal_type' => 'db',
                                'allowed' => 'tx_nasmarket_domain_model_category',
				'size' => 1,
                                'maxitems' => 1,
                                'minitems' => 0
			)
		),
                'children' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_category.children',
			'config'  => array(
				'type' => 'inline',
				'foreign_table' => 'tx_nasmarket_domain_model_category',
				'foreign_field' => 'parent',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'newRecordLinkPosition' => 'bottom',
				),
			)
		),
                'ads' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nas_market/Resources/Private/Language/locallang_db.xml:tx_nasmarket_domain_model_category.ads',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_nasmarket_domain_model_ad',
				'MM' => 'tx_nasmarket_ad_category_mm',
				'maxitems' => 9999,
				'appearance' => array(
					'useCombination' => 1,
					'useSortable' => 1,
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 1,
				)
			)
		),
	),
);
?>