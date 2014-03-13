<?php
if(!$user = $modx->getAuthenticatedUser()){return $modx->lexicon('socialtools_err_noauth');}

$socialTools = $modx->getService('SocialTools','SocialTools',$modx->getOption('core_path').'components/socialtools/'.'model/socialtools/',$scriptProperties);
$socialTools->initialize($modx->context->key, $scriptProperties);
//$modx->setLogLevel(xPDO::LOG_LEVEL_INFO);
//$modx->setLogTarget('ECHO');


// switch inbox or outbox
switch($action)
{
    case 'inbox':
        $WorkClass = "socDialogReceive";
        $c = $modx->newQuery($WorkClass);
        $c->where(array('recipient' => $user->id));
        $tpl =  $modx->getOption('inboxTpl', $scriptProperties, 'soc.listRowInbox');
        break;
    case 'outbox':
        $WorkClass = "socDialogSend";
        $c = $modx->newQuery($WorkClass);
        $c->where(array('sender' => $user->id));
        $tpl =  $modx->getOption('outboxTpl', $scriptProperties, 'soc.listRowOutbox');
        break;
    case 'default':
        return $modx->lexicon('socialtools_err');
        break;
}


$total = $modx->getCount($WorkClass, $c);
$totalVar = $modx->getOption('totalVar', $scriptProperties, 'total');
$modx->setPlaceholder($totalVar,$total);

$c->limit($limit, $offset);
$c->sortby($sortby,$sortdir);
$messages=$modx->getCollection($WorkClass,$c);



foreach ($messages as $msg){

     $msgarray = $msg->toArray();

     $output .= $modx->getChunk($tpl, $msgarray) . $outputSeparator;

}

return $output;