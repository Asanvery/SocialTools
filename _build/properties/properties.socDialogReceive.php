<?php

$properties = array();

$tmp = array(
	'tplFormRead' => array(
		'type' => 'textfield',
		'value' => 'soc.readForm',
	)
	
);

foreach ($tmp as $k => $v) {
	$properties[] = array_merge(
		array(
			'name' => $k,
			'desc' => PKG_NAME_LOWER . '_prop_' . $k,
			'lexicon' => PKG_NAME_LOWER . ':properties',
		), $v
	);
}

return $properties;