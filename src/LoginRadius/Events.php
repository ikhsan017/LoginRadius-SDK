<?php
namespace LoginRadius;
/**
 * Class to get user's facebook events.
 *
 * Copyright 2013 LoginRadius Inc. - www.LoginRadius.com
 *
 * This file is part of the LoginRadius SDK package.
 *
 */ 
class Events extends LoginRadius{
	/**
	 * Constructor. Calls parent class constructor.
	 * 
	 * @param string $secret LoginRadius API secret.
	 */ 
	function __construct($secret, $token){
		parent::__construct($secret, $token);
	}
	
    /**
	 * Get user's facebook events
	 *
	 * @return array User's facebook events information.
	 */ 
	public function getEvents(){
		$url = $this->loginRadiusUrl.'GetEvents/'. $this->secret .'/'.$this->token;
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>