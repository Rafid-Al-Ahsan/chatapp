<?php
    $servername="localhost";
	$username="root";
	$password="";
	$dbname="chatapp";
	$conn = mysqli_connect($servername, $username, $password, $dbname);	

    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");

?>