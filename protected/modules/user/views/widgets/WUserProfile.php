<?php

class WUserProfile extends CWidget {
	public $data;
	
	public function run() {
		$baseUrl = Yii::app()->getRequest()->getBaseUrl();
		$this->render('userProfile', array(
			'data' => $this->data,
		));
	}
		
}

?>