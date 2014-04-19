<?php
/**
 * Create an Item
 */
class socMessageUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'socMessage';
	public $classKey = 'socMessage';
	public $languageTopics = array('socialtools');
	
	public function beforeSet() {
		switch($this->getProperty('type'))
		{
			case 'inbox':
				if ($this->object->get('recipient') != $this->modx->user->id) {
					return $this->modx->lexicon('socialtools_socMessage_error_permission');
				}
				else
					$this->setProperties(array('recipient_deleted' => '1'));
			break;
			case 'outbox':
				if ($this->object->get('sender') != $this->modx->user->id) {
					return $this->modx->lexicon('socialtools_socMessage_error_permission');
				}
				else
				$this->setProperties(array('sender_deleted' => '1'));
			break;
		}

		
		
           
		return parent::beforeSet();
	}
	
	public function beforeSave() {
		if($this->object->get('recipient_deleted')==1 && $this->object->get('sender_deleted')==1)
		$this->object->remove();
		return parent::beforeSave();
	}
}

return 'socMessageUpdateProcessor';