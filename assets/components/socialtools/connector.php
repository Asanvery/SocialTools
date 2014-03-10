<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('socialtools_core_path', null, $modx->getOption('core_path') . 'components/socialtools/');
require_once $corePath . 'model/socialtools/socialtools.class.php';
$modx->socialtools = new SocialTools($modx);

$modx->lexicon->load('socialtools:default');

/* handle request */
$path = $modx->getOption('processorsPath', $modx->socialtools->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));