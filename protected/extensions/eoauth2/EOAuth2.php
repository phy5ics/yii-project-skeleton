<?php

/**
 * 
 * login url
 * redirect url
 * access token
 * 
 * Requires AES encryption of user id
 * Store AES encrypted user id in non-expiring cookie for future identification
 */

Yii::import('ext.eoauth2.*');
Yii::import('ext.eoauth2.providers.*');

class EOAuth2 extends CApplicationComponent {
	
}


?>