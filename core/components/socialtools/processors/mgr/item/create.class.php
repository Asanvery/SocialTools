<?php
/**
 * Create an Item
 */
class SocialToolsItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'SocialToolsItem';
	public $classKey = 'SocialToolsItem';
	public $languageTopics = array('socialtools');
	public $permission = 'new_document';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$alreadyExists = $this->modx->getObject('SocialToolsItem', array(
			'name' => $this->getProperty('name'),
		));
		if ($alreadyExists) {
			$this->modx->error->addField('name', $this->modx->lexicon('socialtools_item_err_ae'));
		}

		return !$this->hasErrors();
	}

}

return 'SocialToolsItemCreateProcessor';