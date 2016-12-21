<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h1 style="text-align: center;">Welcome</h1>


				<?php
					echo '<img src="images/' . htmlspecialchars($_SESSION['username'], ENT_QUOTES) . '/profile.jpg" alt="ProfilePic">' 
				?>



				<p><a style="margin-top: 5em" class="btn btn-primary btn-block btn-lg" href='logout.php' role="button">Logout</a></p>
				<hr>

		</div>
	</div>


</div>

<?php 
require('layout/footer.php'); 
?>
