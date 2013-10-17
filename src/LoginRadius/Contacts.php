<?php
namespace LoginRadius;
/**
 * Class to get user's contacts/friends/connections from social ID providers.
 *
 * Copyright 2013 LoginRadius Inc. - www.LoginRadius.com
 *
 * This file is part of the LoginRadius SDK package.
 *
 */ 
class Contacts extends LoginRadius{
	/**
	 * Constructor. Calls parent class constructor.
	 * 
	 * @param string $secret LoginRadius API secret.
	 */ 
	function __construct($secret, $token){
		parent::__construct($secret, $token);
	}
	
    /**
	 * Get user's contacts/friends/connections from social ID providers
	 *
	 * @return array User's contacts information.
	 */ 
	public function getContacts(){
		$url = $this->loginRadiusUrl.'contacts/'. $this->secret .'/'.$this->token;
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>