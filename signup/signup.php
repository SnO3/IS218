<?php
    require_once('login.php');

    $db_server = mysqli_connect($db_hostname, $db_user, $db_pass, $db_database);

    if(!$db_server) die('Unsable to connect');

    $user = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = 'INSERT INTO Users(Email,Password) VALUES("' . $user . '","' . password_hash($pass, PASSWORD_DEFAULT) . '");';	
    
    if(mysqli_query($db_server, $sql)){
		echo 'It worked';
    }else{
		echo 'IT DIDN\'T WORK ABORT' . '<br>';
		echo 'Error: ' . sql . '<br>' . mysqli_error($db_server);
    }
		
	

    mysqli_close($db_server);
	
?>
