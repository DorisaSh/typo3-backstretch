<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'W3D.' . $_EXTKEY,
	'Pi1',
	array(
		'Image' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Image' => '',
		
	)
);

if (version_compare(TYPO3_version, '7.6.0', '>=')) {

	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
	   \TYPO3\CMS\Core\Imaging\IconRegistry::class
	);

	$iconRegistry->registerIcon(
	    "tx-t3tbackstretch-image", // Icon-Identifier, z.B. tx-myext-action-preview
	    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	    ['source' => 'EXT:t3t_backstretch/Resources/Public/Icons/image.svg']
	);
	
}