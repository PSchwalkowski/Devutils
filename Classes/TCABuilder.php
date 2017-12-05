<?php

namespace PS\Devutils;

use PS\Devutils\TCABuilder\{
	InputField,
	TextField,
	SelectField
};

class TCABuilder {

	/**
	 * Extension key
	 * Used for creating field label
	 *
	 * @var string
	 */
	protected static $extKey = '';

	/**
	 * Table key like - tx_theme_domain_model_slide
	 *
	 * @var string
	 */
	protected static $tableKey = '';

	/**
	 * Default language file
	 *
	 * @var string
	 */
	protected static $languageFile = 'locallang_db.xlf';

	/**
	 * Default field config
	 *
	 * @var array
	 */
	protected static $defaultFieldConfig = [
		'exclude' => true,
		'config'  => [],
	];

	/**
	 * Set extension key
	 *
	 * @param string $extKey
	 * @return void
	 */
	public static function setExtKey(string $extKey) {
		self::$extKey = $extKey;
	}

	/**
	 * Set table key
	 *
	 * @param string $tableKey
	 * @return void
	 */
	public static function setTableKey(string $tableKey) {
		self::$tableKey = $tableKey;
	}

	/**
	 * Set default language file
	 *
	 * @param string $languageFile
	 * @return void
	 */
	public static function setLanguageFile(string $languageFile) {
		self::$languageFile = $languageFile;
	}

	/**
	 * Create label field licallang path
	 *
	 * @param string $label
	 * @return string
	 */
	protected static function getFieldLabelPath(string $label): string {
		if (!empty(self::$extKey)) {
			$labelPath = 'LLL:EXT:' . self::$extKey . '/Resources/Private/Language/' . self::$languageFile . ':';

			if (!empty(self::$tableKey)) {
				$labelPath .= self::$tableKey . '.';
			}

			$labelPath .= $label;
		} else {
			$labelPath = $label;
		}

		return $labelPath;
	}
}