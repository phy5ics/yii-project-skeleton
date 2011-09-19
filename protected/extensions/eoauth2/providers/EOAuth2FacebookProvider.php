<?php

/**
 * This adapter wraps the official Facebook PHP SDK 3.1.1 to conform to the EOAuth2ServiceAdapter interface
 * 
 */

Yii::import('ext.facebook.*');

class EOAuth2FacebookProvider implements EOAuth2IServiceAdapter {
	
	private $facebook;
	private $loginUrl;
	private $returnUrl;
	
	public function __construct($appId, $secretKey, $returnUrl) {
		$this->facebook = new Facebook(array(
		    'appId' => Yii::app()->params["facebook"]["appId"],
	        'secret' => Yii::app()->params["facebook"]["secretKey"],
	        'cookie' => true
		));
	}
	
	public function getLoginUrl() {
		
		return $this->loginUrl;
	}
	
	public function getReturnUrl() {
		
		return $this->returnUrl;
	}
	
	
}

?>