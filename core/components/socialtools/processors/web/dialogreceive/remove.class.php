<?php
/**
 * Create an Item
 */
class socDialogReciveRemoveProcessor extends modObjectRemoveProcessor {
	public $objectType = 'socDialogReceive';
	public $classKey = 'socDialogReceive';
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

return 'socDialogReciveRemoveProcessor';