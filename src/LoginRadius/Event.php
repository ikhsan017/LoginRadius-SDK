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
class Event{
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
	 * Get user's facebook events
	 *
	 * @return array User's facebook events information.
	 */ 
	public function getEvents(){
		$url = $this->loginRadius->getApiUrl('GetEvents');
		$response = $this->loginRadius->callApi($url);
		return json_decode($response);
	}
}
?>