<?php
/**
 * Update an Item
 */
class SocialToolsItemUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'SocialToolsItem';
	public $classKey = 'SocialToolsItem';
	public $languageTopics = array('socialtools');
	public $permission = 'update_document';
}

return 'SocialToolsItemUpdateProcessor';