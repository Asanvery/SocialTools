<?php
/**
 * The base class for SocialTools.
 */

class SocialTools {
	/* @var modX $modx */
	public $modx;
	/* @var SocialToolsControllerRequest $request */
	protected $request;
	public $initialized = array();
	public $chunks = array();


	/**
	 * @param modX $modx
	 * @param array $config
	 */
	function __construct(modX &$modx, array $config = array()) {
		$this->modx =& $modx;

		$corePath = $this->modx->getOption('socialtools_core_path', $config, $this->modx->getOption('core_path') . 'components/socialtools/');
		$assetsUrl = $this->modx->getOption('socialtools_assets_url', $config, $this->modx->getOption('assets_url') . 'components/socialtools/');
		$actionUrl = $this->modx->getOption('socialtools_action_url', $config, $assetsUrl.'action.php');
		$connectorUrl = $assetsUrl . 'connector.php';

		$this->config = array_merge(array(
			'assetsUrl' => $assetsUrl,
			'cssUrl' => $assetsUrl . 'css/',
			'jsUrl' => $assetsUrl . 'js/',
			'imagesUrl' => $assetsUrl . 'images/',
			'connectorUrl' => $connectorUrl,
			'corePath' => $corePath,
			'modelPath' => $corePath . 'model/',
			'chunksPath' => $corePath . 'elements/chunks/',
			'templatesPath' => $corePath . 'elements/templates/',
			'chunkSuffix' => '.chunk.tpl',
			'snippetsPath' => $corePath . 'elements/snippets/',
			'processorsPath' => $corePath . 'processors/',
			'actionUrl' => $actionUrl
		), $config);
		
		$this->modx->addPackage('socialtools', $this->config['modelPath']);
		$this->modx->lexicon->load('socialtools:default');

	}
	


	/**
	 * Initializes SocialTools into different contexts.
	 *
	 * @access public
	 *
	 * @param string $ctx The context to load. Defaults to web.
	 */
	public function initialize($ctx = 'web') {
		switch ($ctx) {
			case 'mgr':
				if (!$this->modx->loadClass('socialtools.request.SocialToolsControllerRequest', $this->config['modelPath'], true, true)) {
					return 'Could not load controller request handler.';
				}
				$this->request = new SocialToolsControllerRequest($this);

				return $this->request->handleRequest();
				break;
			case 'web':
			$this->modx->regClientStartupScript(str_replace('					', '', '
						<script type="text/javascript">
						SocialToolsConfig = {
							 jsUrl: "'.$this->config['jsUrl'].'web/"
							,cssUrl: "'.$this->config['cssUrl'].'web/"
							,actionUrl: "'.$this->config['actionUrl'].'"
							,notify:"'.$this->modx->getOption('socialtools.notify').'"

						};
						if(typeof jQuery == "undefined") {
							document.write("<script src=\""+SocialToolsConfig.jsUrl+"lib/jquery.min.js\" type=\"text/javascript\"><\/script>");
						}
			
						</script>
						'), true);
						$this->modx->regClientScript($this->config['jsUrl']."web/default.js");
			/// Initalize css 
			if($this->modx->getOption('socialtools.css_use'))
			{
				if ($css = $this->modx->getOption('socialtools.frontend_css')) {
							$this->modx->regClientCSS("/".$css);
				}
			}
			// switch notification
			switch($this->modx->getOption('socialtools.notify'))
			{
				case 'alertify':
				$this->modx->regClientCSS($this->config['cssUrl']."web/lib/alertify.core.css");
				$this->modx->regClientCSS($this->config['cssUrl']."web/lib/alertify.default.css");
				break;
				case 'jgrowl':
				$this->modx->regClientCSS($this->config['cssUrl']."web/lib/jquery.jgrowl.css");
				break;
			}
			break;

			default:
				/* if you wanted to do any generic frontend stuff here.
				 * For example, if you have a lot of snippets but common code
				 * in them all at the beginning, you could put it here and just
				 * call $socialtools->initialize($modx->context->get('key'));
				 * which would run this.
				 */
				break;
		}
		return true;
	}
	
	public function runProcessor($action = '', $data = array()) {
		if (empty($action)) {return false;}
		return $this->modx->runProcessor($action, $data, array('processors_path' => $this->config['processorsPath']));
	}
	
	// Message send 
	public function sendMsg($data = array()) {
		$data['sender']  = $this->modx->user->id;
		
		// validate empty data
		if(empty($data['recipient'])) {return $this->error($this->modx->lexicon('socialtools_dialogSend_err_recipient'));}
		if(empty($data['message'])) {return $this->error($this->modx->lexicon('socialtools_dialogSend_err_msg'));}
		
		// get id recipient 
		$objRecipient = $this->modx->getObject('modUser',array('username' => $data['recipient']));
		if ($objRecipient) {
			$data['recipient'] = $objRecipient->get('id');
		}
		else {return $this->error($this->modx->lexicon('socialtools_dialogSend_err_recipientFind',array('username' => $data['recipient'])));}
		
		// validate user not send self, and debug mode
		if($this->modx->getOption('socialtools.debug')== false && $data['sender'] == $data['recipient'])
			{return $this->error($this->modx->lexicon('socialtools_dialogSend_err_msgSelf'));}
		
		// create inbox message for recipient
		
		$data['date_sent'] = date('Y-m-d H:i:s');
		$response = $this->runProcessor('web/dialogsend/create', $data);
		if ($response->isError()) {
			$message = $response->getMessage();
			$tmp = $response->getFieldErrors();
			$errors = array();
				foreach ($tmp as $v) {
					$errors[$v->field] = $v->message;
				}
			return $this->error($message, $errors);
		}
		// create outbox message for sender
		$response = $this->runProcessor('web/dialogreceive/create', $data);
		if ($response->isError()) {
			$message = $response->getMessage();
			$tmp = $response->getFieldErrors();
			$errors = array();
				foreach ($tmp as $v) {
					$errors[$v->field] = $v->message;
				}
			return $this->error($message, $errors);
		}
		// if no error return success
		if (empty($message)) {$message = $this->modx->lexicon('socialtools_dialogSend_success');}
			return $this->success($message);
	}

	
	// delete Inbox msg
	public function deleteInboxMsg($data = array()) {
		if(!$this->modx->user->id){return $this->error($this->modx->lexicon('socialtools_dialog_error_remove'));}
		$response = $this->runProcessor('web/dialogreceive/remove', $data);
		if ($response->isError()) {
			$message = $response->getMessage();
			$tmp = $response->getFieldErrors();
			$errors = array();
				foreach ($tmp as $v) {
					$errors[$v->field] = $v->message;
				}
			return $this->error($message, $errors);
		}
			if (empty($message)) {$message = $this->modx->lexicon('socialtools_dialog_delete');}
			return $this->success($message);
	}
	
		// delete Outbox msg
	public function deleteOutboxMsg($data = array()) {
	if(!$this->modx->user->id){return $this->error($this->modx->lexicon('socialtools_dialog_error_remove'));}
		$response = $this->runProcessor('web/dialogsend/remove', $data);
		if ($response->isError()) {
			$message = $response->getMessage();
			$tmp = $response->getFieldErrors();
			$errors = array();
				foreach ($tmp as $v) {
					$errors[$v->field] = $v->message;
				}
			return $this->error($message, $errors);
		}
			if (empty($message)) {$message = $this->modx->lexicon('socialtools_dialog_delete');}
			return $this->success($message);
	}
	
	/**
	 * Gets a Chunk and caches it; also falls back to file-based templates
	 * for easier debugging.
	 *
	 * @access public
	 *
	 * @param string $name The name of the Chunk
	 * @param array $properties The properties for the Chunk
	 *
	 * @return string The processed content of the Chunk
	 */
	public function getChunk($name, array $properties = array()) {
		$chunk = null;
		if (!isset($this->chunks[$name])) {
			$chunk = $this->modx->getObject('modChunk', array('name' => $name), true);
			if (empty($chunk)) {
				$chunk = $this->_getTplChunk($name, $this->config['chunkSuffix']);
				if ($chunk == false) {
					return false;
				}
			}
			$this->chunks[$name] = $chunk->getContent();
		}
		else {
			$o = $this->chunks[$name];
			$chunk = $this->modx->newObject('modChunk');
			$chunk->setContent($o);
		}
		$chunk->setCacheable(false);

		return $chunk->process($properties);
	}


	/**
	 * Returns a modChunk object from a template file.
	 *
	 * @access private
	 *
	 * @param string $name The name of the Chunk. Will parse to name.chunk.tpl by default.
	 * @param string $suffix The suffix to add to the chunk filename.
	 *
	 * @return modChunk/boolean Returns the modChunk object if found, otherwise
	 * false.
	 */
	private function _getTplChunk($name, $suffix = '.chunk.tpl') {
		$chunk = false;
		$f = $this->config['chunksPath'] . strtolower($name) . $suffix;
		if (file_exists($f)) {
			$o = file_get_contents($f);
			$chunk = $this->modx->newObject('modChunk');
			$chunk->set('name', $name);
			$chunk->setContent($o);
		}

		return $chunk;
	}
    
	/* This method returns an error of the cart
	 *
	 * @param string $message A lexicon key for error message
	 * @param array $data.Additional data, for example cart status
	 * @param array $placeholders Array with placeholders for lexicon entry
	 *
	 * @return array|string $response
	 */
	public function error($message = '', $data = array(), $placeholders = array()) {
		$response = array(
			'success' => false
			,'message' => $this->modx->lexicon($message, $placeholders)
			,'data' => $data
		);

		return $this->config['json_response'] ? $this->modx->toJSON($response) : $response;
	}


	/* This method returns an success of the cart
	 *
	 * @param string $message A lexicon key for success message
	 * @param array $data.Additional data, for example cart status
	 * @param array $placeholders Array with placeholders for lexicon entry
	 *
	 * @return array|string $response
	 * */
	public function success($message = '', $data = array(), $placeholders = array()) {
		$response = array(
			'success' => true
			,'message' => $this->modx->lexicon($message, $placeholders)
			,'data' => $data
		);

		return $this->config['json_response'] ? $this->modx->toJSON($response) : $response;
	}
}