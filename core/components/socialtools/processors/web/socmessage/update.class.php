<?php
/**
 * Create an Item
 */
class socMessageUpdateProcessor extends modObjectUpdateProcessor {
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

return 'socMessageUpdateProcessor';