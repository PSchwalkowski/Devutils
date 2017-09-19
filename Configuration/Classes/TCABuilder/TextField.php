<?php

namespace PS\Devutils\TCABuilder;


trait TextField {

	/**
	 * Default text field config
	 *
	 * @var array
	 */
	protected static $defaultTextFieldConfig = [
		'type' => 'text',
		'cols' => 40,
		'rows' => 15,
		'eval' => 'trim',
	];

	/**
	 * Create text field
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createTextField(string $label, array $userConfig = []): array {
		$config = array_merge_recursive(
			self::$defaultFieldConfig,
			['config' => self::$defaultTextFieldConfig]
		);

		$userConfig['label'] = self::getFieldLabelPath($label);

		return array_replace_recursive($config, $userConfig);
	}

	/**
	 * Create text field with RTE
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createTextFieldWithRTE(string $label, array $userConfig = []): array {
		$userConfig['config']['enableRichtext'] = true;

		return self::createTextField($label, $userConfig);
	}

	/**
	 * Create text field with t3editor
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createTextFieldWithT3editor(string $label, array $userConfig = []): array {
		$userConfig['config']['renderType'] = 't3editor';
		$userConfig['config']['format'] = 'html';

		return self::createTextField($label, $userConfig);
	}
}