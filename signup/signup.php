<?php

function signup(){
    require_once(__ROOT__ . '/login.php');

    $db_server = mysqli_connect($db_hostname, $db_user, $db_pass, $db_database);

    if(!$db_server) die('Unsable to connect');

    $user = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = 'INSERT INTO Users(Email,Password) VALUES("' . $user . '","' . password_hash($pass, PASSWORD_DEFAULT) . '");';	

    include(__ROOT__ . '/signupcomplete.html');    

    if(mysqli_query($db_server, $sql)){
		include(__ROOT__ . '/signupT.html');
    }else{
		include(__ROOT__ . '/signupF.html');
    }
		
	

    mysqli_close($db_server);
}

define('__ROOT__',dirname(__FILE__));
signup();
	
?>
