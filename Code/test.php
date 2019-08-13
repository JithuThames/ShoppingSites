
<!DOCTYPE html>
<html>
<head>
<title> Signup Form Sebi</title>
<link rel="stylesheet" type="text/css" href="Stylesheet\test.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--Google Signin-->
 <meta name="google-signin-client_id" content="375189029211-geq61mmqa9cu1dd3i4oe0btg3mu0jqbo.apps.googleusercontent.com">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="js/script.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
  
<!--Google Signin Complete-->
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '712845432495165',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v4.0' // The Graph API version to use for the call
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
  </script>

</head>
<body>
<div>

<?php

if(isset($_POST['Signup'])){
	$Cust_Name		= $_POST['Cust_Name'];
	$Cust_User		= $_POST['Cust_User'];
	$Cust_Email		= $_POST['Cust_Email'];
	$Cust_Contact	= $_POST['Cust_Contact'];
	$Password		= $_POST['Password'];
	
$db_server="localhost";
$db_user ="root";
$db_pass ="";
$db_name ="sebi";
$db = new mysqli($db_server, $db_user, $db_pass, $db_name);
	
	$sql = "INSERT INTO customer(Cust_Name, Cust_User, Cust_Email, Cust_Contact, Password) VALUES('$Cust_Name','$Cust_User','$Cust_Email','$Cust_Contact','$Password')";
	
	if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql. "<br>" . $db->error;
}
}

//$db->close();	
	
	//$query=mysqli_query($db,$sql);
	//if($query==1){
	//	echo 'Successfully Created an Account';
	//}else{
		//echo 'There are some errors while saving the data';
	//}
	//$stmt = $db->prepare($sql);
	//$result=$stmt->execute([$Cust_Name,$Cust_User,$Cust_Email,$Cust_Contact,$Password]);
	//$stmt->bind_param("sssis", $Cust_Name,$Cust_User,$Cust_Email,$Cust_Contact,$Password);
	//$stmt->execute();
	

?>
</div>
	<div id="login-box">
	   <div class="box-left">
	   <form action="test.php" method="post">
	   <div class="container">
	    <h1> Sign up ...</h1>
		<input type="text" name="Cust_Name" placeholder="Your Name" required>
	    <input type="text" name="Cust_User" placeholder="User Name" required >
	    <input type="email" name="Cust_Email" placeholder="E-mail" required style="display: block; box-sizing: border-box; margin-bottom: 20px; padding: 4px; width: 220px; height: 22px; border: none;
		outline: none; border-bottom: 2px solid #aaa; font-family: sans-serif; font-weight: 400; font-size: 15px; transition: 0.2s ease;">
	    <input type="text" name="Cust_Contact" placeholder="Phone Number" required >
	    <input type="password" name="Password" placeholder="Password" required >
	    <input type="submit" name="Signup" value="Sign Up">
		</div>
		</form>
	   </div>
	   <div class="box-right">
	   <form>
		<span class="signinwith"> Sign in with </br> Social Media</span>
		<div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="false"></div>
		<div class="fb" style="width: 100px; height: 25px; background-color:blue;" hidden="hidden">
		<fb:login-button  scope="public_profile,email" onlogin="checkLoginState();">
		</fb:login-button> </div>
		<!--<button class="social google"> Log in with Google </button>-->
		<br></br>
		<div class="g-signin2" data-onsuccess="onSignIn" data-width="250" data-height="40" data-longtitle="true"></div>
		<a href="Signin.html" style="font-weight:700; font-size:16px; margin-top:200px; color:white;">Back to Sign In</a>
	<!--	<button onclick="signOut()">Sign Out of Google</button> -->
		
		<!--<button class="social twitter"> Log in with Twitter </button>--->
		
		</form>
	   
	   </div>
	   <div class="or"> OR </div> 
	   
	</div>


</body>

</html>