<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'T3T.' . $_EXTKEY,
	'Pi1',
	array(
		'Image' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Image' => '',
		
	)
);
