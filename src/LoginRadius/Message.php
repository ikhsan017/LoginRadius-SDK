<?php
namespace LoginRadius;
/**
 * Class to send direct message to user's contacts(LinkedIn)/followers(twitter).
 *
 * Copyright 2013 LoginRadius Inc. - www.LoginRadius.com
 *
 * This file is part of the LoginRadius SDK package.
 *
 */ 
class Message{
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
	 * Send direct message.
	 *
	 * @param string $to          Social ID of the receiver.
	 * @param string $subject     Subject of the message.
	 * @param string $message     Message.
	 *
	 * @return bool - true on success, false otherwise.
	 */ 
	public function sendMessage($to,$subject,$message){
		$message = array(
			'sendto'  => $to,
			'subject' => $subject,
			'message' => $message
		);
		$url = $this->loginRadius->getApiUrl('directmessage', $message);
		$response = $this->loginRadius->callApi($url);
		return json_decode($response);
	}
}
?>