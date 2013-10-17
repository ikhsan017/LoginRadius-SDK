<?php
namespace LoginRadius;
/**
 * Class to get facebook posts of the user.
 *
 * Copyright 2013 LoginRadius Inc. - www.LoginRadius.com
 *
 * This file is part of the LoginRadius SDK package.
 *
 */ 
class Posts extends LoginRadius{
	/**
	 * Constructor. Calls parent class constructor.
	 * 
	 * @param string $secret LoginRadius API Secret.
	 */ 
	function __construct($secret, $token){
		parent::__construct($secret, $token);
	}
	
    /**
	 * Get facebook posts of the user.
	 * 
	 * @return array User's facebook posts information.
	 */
	public function getPosts(){
		$url = $this->loginRadiusUrl.'GetPosts/'. $this->secret .'/'.$this->token;
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>