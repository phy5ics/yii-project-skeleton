<?php

class UserIdentity extends CUserIdentity {
	
	public $guest = true;
	
	public function getAuthentication() {
		
	}
	
	public function getGuest() {
		return $this->guest;
	}
	
	public function authenticate() {
		//First, check for cookie to see if we have an encrypted user id that was stored previously:
		
		//If we find that cookie, check against the database and return the user object, and show the profile widget:
		
		//If we don't find that cookie, then we should somehow show the registration widget:
		
	}
	
}


?>