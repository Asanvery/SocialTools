<?php
/**
 * Remove an Item
 */
class SocialToolsItemRemoveProcessor extends modObjectRemoveProcessor {
	public $checkRemovePermission = true;
	public $objectType = 'SocialToolsItem';
	public $classKey = 'SocialToolsItem';
	public $languageTopics = array('socialtools');

}

return 'SocialToolsItemRemoveProcessor';