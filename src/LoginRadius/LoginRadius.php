<?php 
namespace LoginRadius;

/**
 * Class for Social Authentication.
 *
 * This is the main class to communicate with LogiRadius Unified Social API. It contains functions for Social Authentication with User Profile Data (Basic and
 * Extended).
 *
 * Copyright 2013 LoginRadius Inc. - www.LoginRadius.com
 *
 * This file is part of the LoginRadius SDK package.
 *
 */
class LoginRadius{
    public $isAuthenticated;
    protected $token, $secret, $loginRadiusUrl;

    /**
     * Constructor - It validates LoginRadius API Secret and Session Token. If valid, assigns them to class members; else prints error message.
     *
     * @param string  $secret LoginRadius API Secret.
     */
    public function __construct( $secret, $token ) {
        $this->loginRadiusUrl = 'https://hub.loginradius.com/';

        if ( !isset( $token ) ) {
            // if token is not set
            throw new Exception\InvalidRequestException('Invalid Request');
        }elseif ( !$this->isValidGuid( $token ) ) {
            // if token is invalid, show error message.
            throw new Exception\InvalidTokenException('Invalid Token');
        }elseif ( !$this->isValidGuid( $secret ) ) {
            // if API secret is invalid, show error message.
            throw new Exception\InvalidSecretException('Invalid LoginRadius API Secret');
        }else {
            $this->secret = $secret;
            $this->token = $token;
        }
    }

    /**
     * LoginRadius function - It validate against GUID format of keys.
     *
     * @param string  $value data to validate.
     *
     * @return boolean. If valid - true, else - false.
     */
    private function isValidGuid( $value ) {
        return preg_match( '/^\{?[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}\}?$/i', $value );
    }

    /**
     * LoginRadius funtion - To fetch user profile data from LoginRadius SaaS.
     *
     * @param string  $ApiSecrete LoginRadius API Secret
     *
     * @return object User profile data.
     */
    public function getData() {
        $this->isAuthenticated = false;
        $validateUrl = $this->loginRadiusUrl.'userprofile.ashx?token='.$this->token.'&apisecrete='.$this->secret;
        $jsonResponse = $this->callApi( $validateUrl );
        $userProfile = json_decode( $jsonResponse );
        if ( isset( $userProfile->ID ) && $userProfile->ID != '' ) {
            $this->isAuthenticated = true;
            return $userProfile;
        }
    }

    /**
     * This function is use to fetch data from the LoginRadius API URL.
     *
     * @param string  $validateUrl - Target URL to fetch data from.
     *
     * @return string - data fetched from the LoginRadius API.
     */
    protected function callApi( $validateUrl ) {
        if ( in_array( 'curl', get_loaded_extensions() ) ) {
            $curl_handle = curl_init();
            curl_setopt( $curl_handle, CURLOPT_URL, $validateUrl );
            curl_setopt( $curl_handle, CURLOPT_CONNECTTIMEOUT, 5 );
            curl_setopt( $curl_handle, CURLOPT_TIMEOUT, 5 );
            curl_setopt( $curl_handle, CURLOPT_SSL_VERIFYPEER, false );
            if ( ini_get( 'open_basedir' ) == '' && ( ini_get( 'safe_mode' ) == 'Off' or !ini_get( 'safe_mode' ) ) ) {
                curl_setopt( $curl_handle, CURLOPT_FOLLOWLOCATION, 1 );
                curl_setopt( $curl_handle, CURLOPT_RETURNTRANSFER, true );
                $jsonResponse = curl_exec( $curl_handle );
            }else {
                curl_setopt( $curl_handle, CURLOPT_HEADER, 1 );
                $url = curl_getinfo( $curl_handle, CURLINFO_EFFECTIVE_URL );
                curl_close( $curl_handle );
                $ch = curl_init();
                $url = str_replace( '?', '/?', $url );
                curl_setopt( $ch, CURLOPT_URL, $url );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                $jsonResponse = curl_exec( $ch );
                curl_close( $ch );
            }
        }else {
            $jsonResponse = file_get_contents( $validateUrl );
        }
        return $jsonResponse;
    }

    public function __get($className){
        $className = 'LoginRadius\\'.ucfirst($className);
        if(class_exists($className)){
            return new $className($this->secret, $this->token);
        }else{
            throw new Exception\InvalidClassException("Class '$className' does not exist in LoginRadius SDK");
        }
    }
}
?>
