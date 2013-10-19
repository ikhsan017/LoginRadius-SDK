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
class Contact{
	private $loginRadius;
	/**
	 * Constructor. Calls parent class constructor.
	 * 
	 * @param string $loginRadius LoginRadius Object
	 */ 
	function __construct(LoginRadius $loginRadius){
		$this->loginRadius = $loginRadius;
	}
	
    /**
	 * Get user's contacts/friends/connections from social ID providers
	 *
	 * @return array User's contacts information.
	 */ 
	public function getContacts(){
		$url = $this->loginRadius->getApiUrl('contacts');
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>