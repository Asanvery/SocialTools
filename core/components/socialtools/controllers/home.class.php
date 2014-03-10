<?php
/**
 * The home manager controller for SocialTools.
 *
 */
class SocialToolsHomeManagerController extends SocialToolsMainController {
	/* @var SocialTools $SocialTools */
	public $SocialTools;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('socialtools');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addJavascript($this->SocialTools->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->SocialTools->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->SocialTools->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "socialtools-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->SocialTools->config['templatesPath'] . 'home.tpl';
	}
}