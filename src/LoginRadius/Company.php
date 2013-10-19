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
class Company{
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
	 * Get companies followed by user from linkedin account.
	 * 
	 * @return array Followed companies' information.
	 */ 
	public function getCompany(){
		$url = $this->loginRadius->getApiUrl('GetCompany');
		$response = $this->loginRadius->callApi($url);
		return json_decode($response);
	}
}
?>