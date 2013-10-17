<?php
namespace LoginRadius;
/**
 * Class to get companies followed by user from LinkedIn ID provider.
 *
 * Copyright 2013 LoginRadius Inc. - www.LoginRadius.com
 *
 * This file is part of the LoginRadius SDK package.
 *
 */ 
class Company extends LoginRadius{
	/**
	 * Constructor. Calls parent class constructor.
	 * 
	 * @param string $secret LoginRadius API secret.
	 */ 
	function __construct($secret, $token){
		parent::__construct($secret, $token);
	}
	
    /**
	 * Get companies followed by user from linkedin account.
	 * 
	 * @return array Followed companies' information.
	 */ 
	public function getCompany(){
		$url = $this->loginRadiusUrl.'GetCompany/'. $this->secret .'/'. $this->token;
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>