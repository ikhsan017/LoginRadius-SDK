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
class Message extends LoginRadius{
	/**
	 * Constructor. Calls parent class constructor.
	 * 
	 * @param string $secret LoginRadius API Secret.
	 */ 
	function __construct($secret, $token){
		parent::__construct($secret, $token);
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
		$url = $this->loginRadiusUrl.'directmessage/'.  $this->secret .'/'.$this->token.'?'.http_build_query(array(
			'sendto' => $to,
			'subject' => $subject,
			'message' => $message
		));
		$response = $this->callApi($url);
		return json_decode($response);
	}
}
?>