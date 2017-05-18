<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Joe Velasquez's Portfolio</title>

	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/layout.css" rel="stylesheet" type="text/css">
	<link href="../css/projects.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-defualt">
    <div class="container">
	  	<ul class="nav nav-pills">
          <li <?=echoActiveClassIfRequestMatches("homeController.php?action=home")?> role="presentation"><a href="?action=home">HOME</a></li>
          <li <?=echoActiveClassIfRequestMatches("homeController.php?action=contact")?> role="presentation"><a href="?action=contact">CONTACT</a></li>
          <li <?=echoActiveClassIfRequestMatches("homeController.php?action=resume")?> role="presentation"><a href="?action=resume">RESUME</a></li>
          <li <?=echoActiveClassIfRequestMatches("homeController.php?action=portfolio")?> role="presentation"><a href="?action=portfolio">PORTFOLIO</a></li>
    	</ul>
      <ul class="nav nav-pills navbar-right">
          <li <?=echoActiveClassIfRequestMatches("homeController.php?action=login")?> role="presentation"><a href="?action=login">LOG IN</a></li>
    			<li <?=echoActiveClassIfRequestMatches("homeController.php?action=registration")?> role="presentation"><a href="?action=registration">REGISTER</a></li>
			</ul>
    </div>
</nav>
