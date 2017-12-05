<?php

namespace PS\Devutils\TCABuilder;


trait SelectField {

	/**
	 * Default select field config
	 *
	 * @var array
	 */
	protected static $defaultSelectFieldConfig = [
		'type'       => 'select',
		'renderType' => 'selectSingle',
	];

	/**
	 * Create select field
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createSelectField(string $label, array $userConfig = []): array {
		$config = array_merge_recursive(
			self::$defaultFieldConfig,
			['config' => self::$defaultSelectFieldConfig]
		);
		$userConfig['label'] = self::getFieldLabelPath($label);

		return array_replace_recursive($config, $userConfig);
	}

	/**
	 * Create select field with box type
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createSelectFieldWithBox(string $label, array $userConfig = []): array {
		$userConfig['config']['renderType'] = 'selectSingleBox';

		return self::createSelectField($label, $userConfig);
	}

	/**
	 * Create select field with check box type
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createSelectFieldWithCheckBox(string $label, array $userConfig = []): array {
		$userConfig['config']['renderType'] = 'selectCheckBox';

		return self::createSelectField($label, $userConfig);
	}

	/**
	 * Create select field with multiple side by side type
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createSelectFieldWithMultipleSideBySide(string $label, array $userConfig = []): array {
		$userConfig['config']['renderType'] = 'selectMultipleSideBySide';

		return self::createSelectField($label, $userConfig);
	}
}