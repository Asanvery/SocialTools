<?php

if (empty($_REQUEST['action'])) {
	die('Access denied');
}
else {
	$action = $_REQUEST['action'];
}


define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/index.php';


$modx->getService('error','error.modError');
$modx->getRequest();
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget('FILE');
$modx->error->message = null;

$ctx = !empty($_REQUEST['ctx']) ? $_REQUEST['ctx'] : 'web';
if ($ctx != 'web') {$modx->switchContext($ctx);}

$properties = array();

if (!empty($_SESSION['socForm'])) {
	$properties = $_SESSION['socForm'];
}

define('MODX_ACTION_MODE', true);
$socialTools = $modx->getService('SocialTools','SocialTools',$modx->getOption('core_path').'components/socialtools/'.'model/socialtools/',$properties);

if($modx->error->hasError() || !($socialTools instanceof socialTools)) {die('Error');}

switch ($action) {
	case 'message/send': 
	$response = $socialTools->SendMessage($_POST); 
	break;
	case 'message/delete': 
	$response = $socialTools->DeleteMessage($_POST); 
	break;

}

if (is_array($response)) {
	$response = $modx->toJSON($response);
}


exit($response);
