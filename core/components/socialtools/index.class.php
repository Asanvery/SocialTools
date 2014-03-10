<?php

/**
 * Class SocialToolsMainController
 */
abstract class SocialToolsMainController extends modExtraManagerController {
	/** @var SocialTools $SocialTools */
	public $SocialTools;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('socialtools_core_path', null, $this->modx->getOption('core_path') . 'components/socialtools/');
		require_once $corePath . 'model/socialtools/socialtools.class.php';

		$this->SocialTools = new SocialTools($this->modx);

		$this->addCss($this->SocialTools->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->SocialTools->config['jsUrl'] . 'mgr/socialtools.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			SocialTools.config = ' . $this->modx->toJSON($this->SocialTools->config) . ';
			SocialTools.config.connector_url = "' . $this->SocialTools->config['connectorUrl'] . '";
		});
		</script>');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('socialtools:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends SocialToolsMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}