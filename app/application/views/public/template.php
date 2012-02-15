<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Description of App here">
    <title></title>

    <link rel=stylesheet href='/media/css/style.css'>
</head>
<body>
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '212570702174097', // App ID
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true  // parse XFBML
        });

        // Additional initialization code here
      };

      // Load the SDK Asynchronously
      (function(d){
         var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all.js";
         d.getElementsByTagName('head')[0].appendChild(js);
       }(document));
    </script>

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

</html>

