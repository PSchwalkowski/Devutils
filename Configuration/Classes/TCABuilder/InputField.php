<?php

namespace PS\Devutils\TCABuilder;


trait InputField {

	/**
	 * Default input field config
	 *
	 * @var array
	 */
	protected static $defaultInputFieldConfig = [
		'type' => 'input',
		'eval' => 'trim',
	];

	/**
	 * Create input field
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createInputField(string $label, array $userConfig = []): array {
		$config = array_merge_recursive(
			self::$defaultFieldConfig,
			['config' => self::$defaultInputFieldConfig]
		);
		$userConfig['label'] = self::getFieldLabelPath($label);

		return array_replace_recursive($config, $userConfig);
	}

	/**
	 * Create input field with link wizard
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createInputFieldWithLink(string $label, array $userConfig = []): array {
		$userConfig['config']['renderType'] = 'inputLink';

		return self::createInputField($label, $userConfig);
	}

	/**
	 * Create input field with date
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createInputFieldWithDate(string $label, array $userConfig = []): array {
		$userConfig['config']['renderType'] = 'inputDateTime';
		$userConfig['config']['eval'] = 'date';

		return self::createInputField($label, $userConfig);
	}

	/**
	 * Create input field with time
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createInputFieldWithTime(string $label, array $userConfig = []): array {
		$userConfig['config']['renderType'] = 'inputDateTime';
		$userConfig['config']['eval'] = 'time';

		return self::createInputField($label, $userConfig);
	}

	/**
	 * Create input field with timesec
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createInputFieldWithTimeSec(string $label, array $userConfig = []): array {
		$userConfig['config']['renderType'] = 'inputDateTime';
		$userConfig['config']['eval'] = 'timesec';

		return self::createInputField($label, $userConfig);
	}

	/**
	 * Create input field with datetime
	 *
	 * @param string $label
	 * @param array $userConfig
	 * @return array
	 */
	public static function createInputFieldWithDateTime(string $label, array $userConfig = []): array {
		$userConfig['config']['renderType'] = 'inputDateTime';
		$userConfig['config']['eval'] = 'datetime';

		return self::createInputField($label, $userConfig);
	}
}