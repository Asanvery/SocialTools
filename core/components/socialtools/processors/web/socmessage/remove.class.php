<?php
/**
 * Create an Item
 */
class socMessageRemoveProcessor extends modObjectRemoveProcessor {
	public $objectType = 'socMessage';
	public $classKey = 'socMessage';
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

return 'socMessageRemoveProcessor';