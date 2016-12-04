<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Backstretch'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Backstretch');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3tbackstretch_domain_model_image', 'EXT:t3t_backstretch/Resources/Private/Language/locallang_csh_tx_t3tbackstretch_domain_model_image.xlf');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3tbackstretch_domain_model_image');

$GLOBALS['TCA']['tx_t3tbackstretch_domain_model_image'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3t_backstretch/Resources/Private/Language/locallang_db.xlf:tx_t3tbackstretch_domain_model_image',
		'label' => 'title',
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
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Image.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3tbackstretch_domain_model_image.gif',		
	),
);


$tempColumns['tx_t3tbackstretch_enable'] = array(
	'exclude' => 0,
	'label' => 'Backstretch',
	'config' => array(
		'type' => 'check',
		'items' => array(
			array('LLL:EXT:lang/locallang_core.xlf:labels.enabled', ''),
		),
	)
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'pages',
	'visibility',
	'tx_t3tbackstretch_enable',
	'after:nav_hide'
);

if (version_compare(TYPO3_version, '7.6.0', '>=')) {
	$GLOBALS['TCA']['tx_t3tbackstretch_domain_model_image']['ctrl']['typeicon_classes']['default'] = 'tx-t3tbackstretch-image';
}