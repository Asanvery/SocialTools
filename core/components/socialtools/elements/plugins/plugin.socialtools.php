<?php
switch ($modx->event->name) {

	case 'OnManagerPageInit':
		$cssFile = MODX_ASSETS_URL.'components/socialtools/css/mgr/main.css';
		$modx->regClientCSS($cssFile);
		break;
    case 'OnWebPageInit':
        if(!$user = $modx->getAuthenticatedUser()){return;}
        $socialTools = $modx->getService('SocialTools','SocialTools',$modx->getOption('core_path').'components/socialtools/'.'model/socialtools/',$scriptProperties);

        if(!empty($_REQUEST['msgID'])&&$_REQUEST['action']=='inbox')
        {
           
            $msg_inbox = $modx->getObject('socDialogReceive',array('recipient' => $user->id, 'id' => $_REQUEST['msgID']));
            $msg_inbox->set('is_read', 1);
            $msg_inbox->save();
        }
        $pl_isread = $modx->getOption('socialtools.is_read');
        $is_read = $modx->getCount('socDialogReceive',  array('is_read' => 0, 'recipient' => $user->id))
        if($is_read! = 0 )
        {$modx->setPlaceholder($pl_isread, $is_read);}
        break;
}