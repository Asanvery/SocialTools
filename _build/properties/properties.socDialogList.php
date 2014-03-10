<?php

$properties = array();
$tmp = array(
	'inboxTpl' => array(
		'type' => 'textfield',
		'value' => 'soc.listRowInbox',
	),
	'outboxTpl' => array(
		'type' => 'textfield',
		'value' => 'soc.listRowOutbox',
	),
	'limit' => array(
		'type' => 'numberfield',
		'value' => 10,
	),
	'offset' => array(
		'type' => 'numberfield',
		'value' => 0,
	),
	'sortby' => array(
		'type' => 'textfield',
		'value' => 'date_sent',
	),
	'sortdir' => array(
		'type' => 'list',
		'options' => array(
			array('text' => 'ASC','value' => 'ASC'),
			array('text' => 'DESC','value' => 'DESC'),
		),
		'value' => 'DESC',
	),
	'action' => array(
		'type' => 'list',
		'options' => array(
			array('text' => 'inbox','value' => 'inbox'),
			array('text' => 'outbox','value' => 'outbox'),
		),
		'value' => 'inbox',
	),
	'outputSeparator' => array(
		'type' => 'textfield',
		'value' => "\n",
	),
	'totalVarMsg' => array(
		'type' => 'textfield',
		'value' => "total",
	),
	
	
);

foreach ($tmp as $k => $v) {
	$properties[] = array_merge(
		array(
			'name' => $k,
			'desc' => PKG_NAME_LOWER . '_list_prop_' . $k,
			'lexicon' => PKG_NAME_LOWER . ':properties',
		), $v
	);
}

return $properties;