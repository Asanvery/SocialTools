<?php
$socialTools = $modx->getService('SocialTools','SocialTools',$modx->getOption('core_path').'components/socialtools/'.'model/socialtools/',$scriptProperties);
$socialTools->initialize($modx->context->key, $scriptProperties);

if(!$user = $modx->getAuthenticatedUser()){return $modx->lexicon('socialtools_err_noauth');}

// switch inbox or outbox
$c = $modx->newQuery('socMessage');
switch($action)
{
    case 'inbox':
        $c->where(array('recipient' => $user->id));
        $tpl =  $modx->getOption('inboxTpl', $scriptProperties, 'soc.listRowInbox');
        break;
    case 'outbox':
        $c->where(array('sender' => $user->id));
        $tpl =  $modx->getOption('outboxTpl', $scriptProperties, 'soc.listRowOutbox');
        break;
    case 'default':
        return $modx->lexicon('socialtools_err');
        break;
}


$total = $modx->getCount('socMessage', $c);
$totalVar = $modx->getOption('totalVar', $scriptProperties, 'total');
$modx->setPlaceholder($totalVar,$total);

$c->limit($limit, $offset);
$c->sortby($sortby,$sortdir);
$messages=$modx->getCollection('socMessage',$c);



foreach ($messages as $msg){

     $msgarray = $msg->toArray();

     $output .= $modx->getChunk($tpl, $msgarray) . $outputSeparator;

}

return $output;