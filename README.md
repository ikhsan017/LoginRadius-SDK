LoginRadius PHP SDK
=======

This is the composer friendly fork of https://github.com/LoginRadius/PHP-SDK 

LoginRadius PHP SDK is a development kit that lets you integrate Social Login such as Facebook, Google, Twitter and over 20 more on a PHP website. The SDK also fetches user profile data and can be customized from your LoginRadius user account. Ex: social icon sets, login interface, provider settings, etc.

Installation
----

Just add "xsanisty/loginradius" : "dev-master" to "require" field in composer.json

**Example Code**

    "require" : {
 	    "xsanisty/loginradius" : "dev-master"
    }

Steps to call the library:

     1. On the code behind of callback page, create an object of LoginRadius class and pass secret key and the token.
     2. If success, call getData method to get user's profile data.
       [For Premium paid plans: You can call getData method to get Extended user profile data.]
       visit the link for more information to get list of data: https://www.loginradius.com/product/user-profile-data

**Sample code for authentication and get basic profile data**

**PHP**
    session_start();
    require_once __DIR__.'/../vendor/autoload.php';
    use LoginRadius\LoginRadius;

    $secret = 'your-login-radius-secret';

    //save token in session
    if(isset($_POST['token'])){
        $_SESSION['token'] = $_POST['token'];
    }else{
        $_SESSION['token'] = isset($_SESSION['token']) ? $_SESSION['token'] : '';
    }
    
    $loginRadius = new LoginRadius($secret, $_SESSION['token']);
    $userData = $loginRadius->getData();
    
Advance features(for Paid customers only)
===

> LoginRadius generate a unique session token, when user logs in with
> any of social network. The lifetime of LoginRadius token is 15 mins, get/Save this Token to call this API.

LoginRaidus Contacts API
-----

You can use this API to fetch contacts from users social networks/email clients - Facebook, Twitter, LinkedIn, Google, Yahoo.

**PHP**
    $loginRadius->contacts->getContacts();
    
LoginRadius Status API
---

**PHP**
	//post status
    $response = $loginRadius->status->postStatus(array(
		'to' => '',
		'title' => '',
		'url' => '',
		'imageurl' => '',
		'status' => '',
		'caption' => '',
		'description' => ''
    ));
    
    if($response === true){
		echo 'Message posted successfully.'; }
	elseif(isset($response->errormessage)){
		echo $response->errormessage;
	}else{
		echo 'Error in message post.';
	}
	
	//get status
	$status = $loginRadius->status->getStatus();

    
LoginRadius Posts API
---

You can use this API to get posts from users social networks - Facebook, Twitter, LinkedIn

**PHP**
    //get posts
	$posts = $loginRadius->posts->getPosts();
	
Get Twitter Mentions
--

You can use this API to get mentions from users social network - Twitter.

**PHP**
    $mentions = $loginRadius->mentions->getMentions();
    
Facebook Groups
--
You can use this API to get groups from users social network - Facebook.

**PHP**
    $groups = $loginRadius->groups->getGroups();
    
Get LinkedIn follow companies
--
You can use this API to get followed companies list from users social network - LinkedIn.

**PHP**
    $companies = $loginRadius->company->getCompany();
    
LoginRadius direct message API
--
You can use this API to send direct message.

**PHP**
	$response = $loginRadius->message->sendMessage($to,$subject,$message);
	if($response === true){
    	echo 'Message sent successfully.';
	}elseif(isset($response->errormessage)){
    	echo $response->errormessage;
	}else{
    	echo 'Error in sending message.';
	}
