<?php
/**
 * Create an Item
 */
class socDialogSendRemoveProcessor extends modObjectRemoveProcessor {
	public $objectType = 'socDialogSend';
	public $classKey = 'socDialogSend';
	public $languageTopics = array('socialtools');
	
	public function beforeSet() {
		
		/*$this->setProperties(array(
			'read' => '0'
			,'private' => '1'
		    ,'type_d' => 'dialog'
			
		));*/
           
		return parent::beforeSet();
	}
}

return 'socDialogSendRemoveProcessor';