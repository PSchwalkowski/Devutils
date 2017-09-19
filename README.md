# Typo3 developer utilities
Package with utility classes for Typo3

### Requirements
- PHP 7.0 or above
- [Typo3](https://typo3.org/) 8.7 or above

## FlexForm
This class allow use to include flexform configuration in simple way.

```php
// ext_tables.php
\PS\Devutils\FlexForm::registerFlexForm($_EXTKEY, 'PluginName', 'OptionalFlexFormFileName');
```

Place your flexForm file inside `FILE:EXT:' . $extKey . '/Configuration/FlexForms/` directory with `xml` extension.

## TCABuilder
Build you TCA faster!

Default language file used for labels is `locallang_db.xlf`. 
You can change it with function `PS\Devutils\TCABuilder::setLanguageFile`

```php
// TCA/tx_some_tca_entity.php
...
PS\Devutils\TCABuilder::setExtKey('theme');
PS\Devutils\TCABuilder::setTableKey('tx_theme_domain_model_slide');
...
'config' => [
	'title' => PS\Devutils\TCABuilder::createInputField('title'),
]
...
```
Results of this function will give something like this
```php
...
'config' => [
	'title' => [
		'exclude' => true,
		'label' => 'LLL:EXT:theme/Resources/Private/Language/locallang_db.xlf:tx_theme_domain_model_slide.title',
		'config' => [
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		],
	],
]
...
```
You can manipulate your field configuration via `$userConfig` varaible.
```php
...
'config' => [
	'subtitle' => PS\Devutils\TCABuilder::createInputField('subtitle', [
		'displayCond' => 'FIELD:sys_language_uid:>:0'
	]),
]
...
```

At this moment in PS\Devutils\TCABuilder only a few functions are available
- createInputField(string $label, array $userConfig = [])
- createInputFieldWithLink(string $label, array $userConfig = [])
- createInputFieldWithDate(string $label, array $userConfig = []))
- createInputFieldWithTime(string $label, array $userConfig = []))
- createInputFieldWithTimeSec(string $label, array $userConfig = []))
- createInputFieldWithDateTime(string $label, array $userConfig = []))
- createTextField(string $label, array $userConfig = [])
- createTextFieldWithRTE(string $label, array $userConfig = [])
- createTextFieldWithT3editor(string $label, array $userConfig = [])
- createSelectField(string $label, array $userConfig = [])
- createSelectFieldWithBox(string $label, array $userConfig = [])
- createSelectFieldWithCheckBox(string $label, array $userConfig = [])
- createSelectFieldWithMultipleSideBySide(string $label, array $userConfig = [])

## TODO
- Add more options to TCABuilder
- Think about faster way of creating models