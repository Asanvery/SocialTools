<?php

$chunks = array();

$tmp = array(
	'soc.sendForm' => array(
		'file' => 'sendForm',
		'description' => 'Send message form',
	),
	'soc.readForm' => array(
		'file' => 'readForm',
		'description' => 'Read message form',
	),
	'soc.listRowOutbox' => array(
		'file' => 'listRowOutbox',
		'description' => 'List outbox tpl row',
	),
	'soc.listRowInbox' => array(
		'file' => 'listRowInbox',
		'description' => 'List inbox tpl row',
	),
	
);

foreach ($tmp as $k => $v) {
	/* @avr modChunk $chunk */
	$chunk = $modx->newObject('modChunk');
	$chunk->fromArray(array(
		'id' => 0,
		'name' => $k,
		'description' => @$v['description'],
		'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/chunk.'.$v['file'].'.tpl'),
		'static' => BUILD_CHUNK_STATIC,
		'source' => 1,
		'static_file' => 'core/components/'.PKG_NAME_LOWER.'/elements/chunks/chunk.'.$v['file'].'.tpl',
	),'',true,true);

	$chunks[] = $chunk;
}

unset($tmp);
return $chunks;