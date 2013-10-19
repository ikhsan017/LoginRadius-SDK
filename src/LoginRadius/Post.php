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
class Post extends LoginRadius{
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
	 * Get facebook posts of the user.
	 * 
	 * @return array User's facebook posts information.
	 */
	public function getPosts(){
		$url = $this->loginRadius->getApiUrl('GetPosts');
		$response = $this->loginRadius->callApi($url);
		return json_decode($response);
	}
}
?>