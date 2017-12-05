<?php

namespace PS\Devutils;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class FlexForm {

	/**
	 * Register new flexform
	 * WARNING! It will override existing settings if exists
	 *
	 * @param  string $extKey       extension key
	 * @param  string $pluginName   name of plugin
	 * @param  string $flexFormFile name of flexform file, optional
	 * @return void
	 */
	public static function registerFlexForm($extKey, $pluginName, string $flexFormFile = null) {
		$extensionName = GeneralUtility::underscoredToUpperCamelCase($extKey);
		$pluginSignature = implode('_', [strtolower($extensionName), strtolower($pluginName)]);

		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

		if (!$flexFormFile)
			$flexFormFile = $pluginName;

		ExtensionManagementUtility::addPiFlexFormValue(
			$pluginSignature,
			'FILE:EXT:' . $extKey . '/Configuration/FlexForms/' . $flexFormFile . '.xml'
		);
	}
}