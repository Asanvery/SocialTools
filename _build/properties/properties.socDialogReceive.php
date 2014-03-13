<?php

$properties = array();

$tmp = array(
	'tplFormReadInbox' => array(
		'type' => 'textfield',
		'value' => 'soc.readFormInbox',
	),
	'tplFormReadOutbox' => array(
		'type' => 'textfield',
		'value' => 'soc.readFormOutbox',
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