<?php

class EOAuth2UserIdentity extends EOAuth2 implements IUserIdentity {
	
	private $id;
	private $authenticated = false;
	private $provider;
	
	public function __construct() {
		//$this->provider = $provider;
	}

	/**
	 * Authenticates the user.
	 * The information needed to authenticate the user
	 * are usually provided in the constructor.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		
		return $this->isAuthenticated;
	}
	
	/**
	 * Returns a value indicating whether the identity is authenticated.
	 * @return boolean whether the identity is valid.
	 */
	public function getIsAuthenticated() {
		
		return $this->authenticated;
	}
	
	/**
	 * Returns a value that uniquely represents the identity.
	 * @return mixed a value that uniquely represents the identity (e.g. primary key value).
	 */
	public function getId() {
		
		return $this->id;
	}
	
	/**
	 * Returns the display name for the identity (e.g. username).
	 * @return string the display name for the identity.
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Returns the additional identity information that needs to be persistent during the user session.
	 * @return array additional identity information that needs to be persistent during the user session (excluding {@link id}).
	 */
	public function getPersistentStates() {
		
	}
	
	public function getProvider() {
		return $this->provider;
	}
	
}

?>