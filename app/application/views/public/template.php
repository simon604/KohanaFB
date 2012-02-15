<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Description of App here">
    <title></title>

    <link rel=stylesheet href='/media/css/style.css'>
</head>
<body>
	<div id="header">
		<!-- Header stuff goes here -->
	</div>

	<div id="body">
		<!-- Header stuff goes here -->
		<?php echo isset($content) ? $content : ''; ?>
	</div>

	<div id="footer">
		<!-- Header stuff goes here -->
	</div>
</body>

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId   : '212570702174097',
            //session : {{encoded_session}}, // don't refetch the session when PHP already has it
            status  : true, // check login status
            cookie  : true, // enable cookies to allow the server to access the session
            xfbml   : true // parse XFBML
    });

    // whenever the user logs in, we tell our login service
    FB.Event.subscribe('auth.login', function() {
      window.location = "{{base}}users/fb_login"
    });
  };

  (function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
  }());
</script>

</html>

