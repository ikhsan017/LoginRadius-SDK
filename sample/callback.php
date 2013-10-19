<?php
session_start();
require_once __DIR__.'/../vendor/autoload.php';
use LoginRadius\LoginRadius;

$secret = 'your-login-radius-seret';

if(isset($_POST['token'])){
    //echo 'new token: '.$_POST['token'];
    $_SESSION['token'] = $_POST['token'];
}else{
    //echo 'old token: '.$_SESSION['token'];
    $_SESSION['token'] = isset($_SESSION['token']) ? $_SESSION['token'] : '';
}

$lr = new LoginRadius($secret, $_SESSION['token']);
echo '<pre>';
var_dump($lr->getData());
echo '</pre>';

?>