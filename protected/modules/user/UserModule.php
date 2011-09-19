<?php

class UserModule extends CWebModule {
	
	//Should this really be set here, or should it be set in the module.components.UserIdentity class?
	//public $guest = true;
	public $facebook;
	public $registrationUrl = array('/user/registration');
	public $recoveryUrl = array('/user/recovery');
	public $loginUrl = array('/user/login');
	public $logoutUrl = array('/user/logout');
	public $returnLogoutUrl = array('/user/login');
	
	public function init() {
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'user.models.*',
			'user.components.*',
			'user.views.*',
		));
	}

	public function beforeControllerAction($controller, $action) {
		if(parent::beforeControllerAction($controller, $action)) {
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		} else {
			return false;
		}
	}
}

?>