<?php
// $GLOBALS['TCA']['tx_t3tbackstretch_domain_model_image'] = array(
// 	'ctrl' => array(
// 		'title'	=> 'LLL:EXT:t3t_backstretch/Resources/Private/Language/locallang_db.xlf:tx_t3tbackstretch_domain_model_image',
// 		'label' => 'title',
// 		'tstamp' => 'tstamp',
// 		'crdate' => 'crdate',
// 		'cruser_id' => 'cruser_id',
// 		'dividers2tabs' => TRUE,
// 		'sortby' => 'sorting',
// 		'versioningWS' => 2,
// 		'versioning_followPages' => TRUE,

// 		'languageField' => 'sys_language_uid',
// 		'transOrigPointerField' => 'l10n_parent',
// 		'transOrigDiffSourceField' => 'l10n_diffsource',
// 		'delete' => 'deleted',
// 		'enablecolumns' => array(
// 			'disabled' => 'hidden',
// 			'starttime' => 'starttime',
// 			'endtime' => 'endtime',
// 		),
// 		'searchFields' => 'title,image,',
// 		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3t_backstretch') . 'Configuration/TCA/Image.php',
// 		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('t3t_backstretch') . 'Resources/Public/Icons/tx_t3tbackstretch_domain_model_image.gif',		
// 	),
// );


if (version_compare(TYPO3_version, '7.6.0', '>=')) {
	$GLOBALS['TCA']['tx_t3tbackstretch_domain_model_image']['ctrl']['typeicon_classes']['default'] = 'tx-t3tbackstretch-image';
}


return [
   'ctrl' => [
      'title' =>  'LLL:EXT:t3t_backstretch/Resources/Private/Language/locallang_db.xlf:tx_t3tbackstretch_domain_model_image',
      'label' => 'title',
      'iconfile' => 'EXT:t3t_backstretch/Resources/Public/Icons/tx_t3tbackstretch_domain_model_image.gif',
      	'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,image,',
   ],
   	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, image',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, image, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
   'columns' => [
     'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_t3tbackstretch_domain_model_image',
				'foreign_table_where' => 'AND tx_t3tbackstretch_domain_model_image.pid=###CURRENT_PID### AND tx_t3tbackstretch_domain_model_image.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3t_backstretch/Resources/Private/Language/locallang_db.xlf:tx_t3tbackstretch_domain_model_image.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3t_backstretch/Resources/Private/Language/locallang_db.xlf:tx_t3tbackstretch_domain_model_image.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		
 
   ],
   // 'types' => [
   //    '0' => ['showitem' => 'sys_language_uid,l10n_parent,l10n_diffsource,t3ver_label,hidden,starttime,endtime,title,image'],
   // ],

];



?>