<?php
if(!$user = $modx->getAuthenticatedUser()){return $modx->lexicon('socialtools_err_noauth');}

$socialTools = $modx->getService('SocialTools','SocialTools',$modx->getOption('core_path').'components/socialtools/'.'model/socialtools/',$scriptProperties);
$socialTools->initialize($modx->context->key, $scriptProperties);

if(empty($_REQUEST['msgID']) && empty($_REQUEST['action'])){ return $modx->lexicon('socialtools_err');}
else
{ 
    $msgID = $_REQUEST['msgID'];
	$action = $_REQUEST['action'];
}

$output = '';
// switch inbox or outbox
switch($action)
{
    case 'inbox':
        $tpl =  $modx->getOption('tplFormReadInbox', $scriptProperties, 'soc.readFormInbox');
        $msg = $modx->getObject('socDialogReceive', array('id' => $msgID, 'recipient' => $user->id ));
        $msgarray = $msg->toArray();
		if(!$msg){return $modx->lexicon('socialtools_err');}
        $output .= $modx->getChunk($tpl, $msgarray);
        break;
    case 'outbox':
        $tpl =  $modx->getOption('tplFormReadOutbox', $scriptProperties, 'soc.readFormOutbox');
        $msg = $modx->getObject('socDialogSend', array('id' => $msgID, 'sender' => $user->id ));
		if(!$msg){return $modx->lexicon('socialtools_err');}
        $msgarray = $msg->toArray();
        $output .= $modx->getChunk($tpl, $msgarray);
        break;
    case 'default':
        return $modx->lexicon('socialtools_err');
        break;
}

return $output;