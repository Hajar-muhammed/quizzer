<?php
include 'database.php';
session_start();
//check if te score is set
if(!isset($_SESSION['score'])){
	$_SESSION['score'] =0;
}

if($_POST){
	$number = $_POST['number'];
	$selected_choice=$_POST['choice'];
	$next = $number+1;

	//get total number of question
    $query ="SELECT * FROM questions";
    $result =$mysqli->query($query)or die ($mysqli->error.__LINE__);
    $total = $result->num_rows;


	//selecting the correct choise from database
	$query = "SELECT * FROM `choices`
	             WHERE question_number = $number AND is_correct=1";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$row = $result->fetch_assoc();
	//set correct choise 
	$correct_choice = $row['id'];
	//compare
	if ($correct_choice == $selected_choice) {
		//answer is correct  & we have increase the score
		$_SESSION['score']=$_SESSION['score']+1;
	}
	//checl if last question
	if($number == $total){
		header("location: final.php");
		exit();
	}else{
		header("location: question.php?n=".$next);
	}
}
