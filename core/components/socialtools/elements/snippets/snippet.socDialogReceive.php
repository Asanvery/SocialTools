<?php
if(!$user = $modx->getAuthenticatedUser()){return $modx->lexicon('socialtools_err_noauth');}

$socialTools = $modx->getService('SocialTools','SocialTools',$modx->getOption('core_path').'components/socialtools/'.'model/socialtools/',$scriptProperties);
$socialTools->initialize($modx->context->key, $scriptProperties);

$output = '';
if(!empty($_GET['msgID']))
$msgId =$_GET['msgID'];
else
$msgId=0;
$tpl = isset($tpl) ? $tpl : $tpl =  $modx->getOption('tplFormRead', $scriptProperties, 'soc.readForm');;

$userId = $user->get('id');

$c = $modx->newQuery('socDialogReceive');

$c->where(array(

    'recipient' => $userId,
	'id' => $msgId

));

$c->sortby('date_sent','DESC');
$c->limit($offset,$limit);

$messages = $modx->getCollection('socDialogReceive',$c);
foreach ($messages as $msg){

   $msgarray = $msg->toArray();

     $output .= $modx->getChunk($tpl, $msgarray) . $outputSeparator;

	//$msg->set('read',1);

     $msg->save();

}

return $output;