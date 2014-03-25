<?php
$socialTools = $modx->getService('SocialTools','SocialTools',$modx->getOption('core_path').'components/socialtools/'.'model/socialtools/',$scriptProperties);
$socialTools->initialize($modx->context->key, $scriptProperties);

if(!$user = $modx->getAuthenticatedUser()){return $modx->lexicon('socialtools_err_noauth');}

$tpl = $scriptProperties['tplFormCreate'];
$data = array();
$uid = !empty($_REQUEST['recipient']) ? (integer) $_REQUEST['recipient'] : 0;
if ($objRecipient = $modx->getObject('modUser',array('id' => $uid))) {
			$data['recipient'] = $objRecipient->get('username');
}
return $modx->getChunk($tpl, $data);
