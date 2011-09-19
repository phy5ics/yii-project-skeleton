<?php

class WLogin extends CWidget {
	public $data;
	
	public function run() {
		$baseUrl = Yii::app()->getRequest()->getBaseUrl();
		$this->render('login', array(
			'data' => $this->data,
		));
	}
		
}

?>