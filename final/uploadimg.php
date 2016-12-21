<?php require('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Upload';

//include header template
require('layout/header.php'); 

define("UPLOAD_DIR", "images/" . htmlspecialchars($_SESSION['username'], ENT_QUOTES) . '/');

if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    $parts = pathinfo($myFile['name']);

    if ($parts['extension'] !== 'jpg') {
    	echo "<p>incorrect file extension.</p>";
    	exit;
    }


    // force filename
    $name = 'profile.jpg';

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }

    echo 'Successfully uploaded as ' . $name . '<br>';

}

?>