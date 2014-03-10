<?php
/**
 * Get an Item
 */
class SocialToolsItemGetProcessor extends modObjectGetProcessor {
	public $objectType = 'SocialToolsItem';
	public $classKey = 'SocialToolsItem';
	public $languageTopics = array('socialtools:default');
}

return 'SocialToolsItemGetProcessor';