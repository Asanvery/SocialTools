<?php

$snippets = array();

$tmp = array(
	'socDialogSend' => array(
		'file' => 'socDialogSend',
		'description' => 'Send message snippet',
	),
	'socDialogReceive' => array(
		'file' => 'socDialogReceive',
		'description' => 'Get received message ',
	),
		'socDialogList' => array(
		'file' => 'socDialogList',
		'description' => 'List of messages received',
	),
			'socDialogForm' => array(
		'file' => 'socDialogForm',
		'description' => 'Form for send message',
	),
	
	
);

foreach ($tmp as $k => $v) {
	/* @avr modSnippet $snippet */
	$snippet = $modx->newObject('modSnippet');
	$snippet->fromArray(array(
		'id' => 0,
		'name' => $k,
		'description' => @$v['description'],
		'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.'.$v['file'].'.php'),
		'static' => BUILD_SNIPPET_STATIC,
		'source' => 1,
		'static_file' => 'core/components/'.PKG_NAME_LOWER.'/elements/snippets/snippet.'.$v['file'].'.php',
	),'',true,true);

	$properties = include $sources['build'].'properties/properties.'.$v['file'].'.php';
	$snippet->setProperties($properties);

	$snippets[] = $snippet;
}

unset($tmp, $properties);
return $snippets;