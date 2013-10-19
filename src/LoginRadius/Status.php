<?php
namespace LoginRadius;
/**
 * Class to get user's status from facebook.
 *
 * Copyright 2013 LoginRadius Inc. - www.LoginRadius.com
 *
 * This file is part of the LoginRadius SDK package.
 *
 */ 
class Status{
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
	 * Get user's status from facebook
	 *
	 * @return array User's facebook status information.
	 */ 
	public function getStatus(){
		$url = $this->loginRadius->getApiUrl('status/get');
		$response = $this->callApi($url);
		return json_decode($response);
	}

   /**
	* Post status on facebook wall.
	* 
	* @param string $to          Social ID of the receiver (if blank, status will be posted to the user's wall who is logging in through facebook).
	* @param string $title       Title of the post (Optional).
	* @param string $url         Link to which user will get redirected after clicking post (Optional).
	* @param string $imageurl    URL of the image to show in the post (Optional).
	* @param string $status      Status.
	* @param string $caption     Caption of the post (Optional).
	* @param string $description Description of the post (Optional).
	*
	* @return bool Returns true if successful, false otherwise.
	*/ 
	public function postStatus($newStatus){
		$defaultStatus = array(
			'to' => '',
			'title' => '',
			'url' => '',
			'imageurl' => '',
			'status' => '',
			'caption' => '',
			'description' => ''
		);

		$status = array_merge($defaultStatus, $newStatus);

		$url = $this->loginRadius->getApiUrl('status/update', $status);
		$response = $this->callApi($url);
		return json_decode($response);
	}
	
    /**
	 * Get user's twitter mentions.
	 * 
	 * @return array User's twitter mentions.
	 */ 
	public function getMentions(){
		$url = $this->loginRadius->getApiUrl('status/mentions');
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>