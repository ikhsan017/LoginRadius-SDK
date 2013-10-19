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
class Group{
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
	 * Get facebook groups followed by user.
	 * 
	 * @return array Followed facebook groups information.
	 */ 
	public function getGroups(){
		$url = $this->loginRadius->getApiUrl('GetGroups');
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>