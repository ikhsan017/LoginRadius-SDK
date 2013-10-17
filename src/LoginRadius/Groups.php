<?php
namespace LoginRadius;
/**
 * Class to get facebook groups followed by the user.
 *
 * Copyright 2013 LoginRadius Inc. - www.LoginRadius.com
 *
 * This file is part of the LoginRadius SDK package.
 *
 */ 
class Groups extends LoginRadius{
	/**
	 * Constructor. Calls parent class constructor.
	 * 
	 * @param string $secret LoginRadius API secret.
	 */ 
	function __construct($secret, $token){
		parent::__construct($secret, $token);
	}
	
	/**
	 * Get facebook groups followed by user.
	 * 
	 * @return array Followed facebook groups information.
	 */ 
	public function getGroups(){
		$url = $this->loginRadiusUrl.'GetGroups/'. $this->secret .'/'.$this->token;
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>