<?php
//creat mysqli object & connection 
$mysqli = new mysqli('localhost', 'root', '', 'quizzer' );
//error
if($mysqli->connect_error){
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}