<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = htmlspecialchars($_SESSION['username'], ENT_QUOTES) . '\'s Profile';

//include header template
require('layout/header.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h1 style="text-align: center;">Welcome</h1>


				<?php
					echo '<img style="margin-left: auto; margin-right: auto;" src="images/' . htmlspecialchars($_SESSION['username'], ENT_QUOTES) . '/profile.jpg" alt="ProfilePic" width="300" height="300"><br>';
					echo '<form style="text-align: center;" action="uploadimg.php" method="post" enctype="multipart/form-data">';
					echo '<input type="file" name="myFile"><br><input type="submit" value="Upload">'
					echo '</form>';
					echo '<br><h2 style="text-align: center;">' . htmlspecialchars($_SESSION['username'], ENT_QUOTES) . '<h2>';
				?>



				<p><a style="margin-top: 2em" class="btn btn-primary btn-block btn-lg" href='logout.php' role="button">Logout</a></p>
				<hr>

		</div>
	</div>


</div>

<?php 
require('layout/footer.php'); 
?>
