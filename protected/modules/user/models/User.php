<?php

class User extends EMongoSoftDocument {
	public $userId;
	public $userName;
	public $userStatus;
	public $email;
	public $password;
	public $userType;
	public $authProvider;
	
	public function rules() {
		return array(
			array('username, email', 'required'),
			array('email', 'email'),
		);
	}
	
	public function attributeLabels() {
		return array(
			'username' => 'Username',
			'password' => 'Password',
			'verifyPassword' => 'Verify password',
			'verifyCode' => 'Verify code',
			'status' => 'Status',
		);
	}
	
	public function getCollectionName() {
		return 'users';
	}

	public static function model($className=__CLASS__) {
	    return parent::model($className);
	}
	
}

?>