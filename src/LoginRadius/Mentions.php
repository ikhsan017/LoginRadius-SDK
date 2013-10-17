<?php
namespace LoginRadius;
/**
 * Class to get users's twitter mentions.
 *
 * Copyright 2013 LoginRadius Inc. - www.LoginRadius.com
 *
 * This file is part of the LoginRadius SDK package.
 *
 */ 
class Mentions extends LoginRadius{
	/**
	 * Constructor. Calls parent class constructor.
	 * 
	 * @param string $secret LoginRadius API secret.
	 */ 
	function __construct($secret, $token){
		parent::__construct($secret, $token);
	}
	
    /**
	 * Get user's twitter mentions.
	 * 
	 * @return array User's twitter mentions.
	 */ 
	public function getMentions(){
		$url = $this->loginRadiusUrl.'status/mentions/'. $this->secret .'/'.$this->token;
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>