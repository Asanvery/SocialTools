<?php

$settings = array();

$tmp = array(
	'debug' => array(
		'xtype' => 'combo-boolean',
		'value' => false,
		'area' => 'socialtools_debug',
	),
	'frontend_css' => array(
		'value' => '/assets/components/socialtools/css/web/default.css',
		'xtype' => 'textfield',
		'area' => 'socialtools_main',
	),
	'css_use' => array(
		'xtype' => 'combo-boolean',
		'value' => true,
		'area' => 'socialtools_main',
	),
	'is_read' => array(
		'value' => 'socIsRead',
		'xtype' => 'textfield',
		'area' => 'socialtools_message',
	),
	'notify' => array(
		'xtype' => 'textfield',
        'value' => 'alertify',
		'area' => 'socialtools_message',
	),
	
);



foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
			'key' => 'socialtools.'.$k,
			'namespace' => PKG_NAME_LOWER,
		), $v
	),'',true,true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;
