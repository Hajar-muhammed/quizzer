<?php include 'database.php';
 session_start(); 
 //check score 
 if(!isset($_SESSION['score'])){
	 $_SESSION['score'] = 0;
 }
 if($_POST){
	 $number = $_POST['number'];
	 $selected_choice = $_POST['choice'];
	$next = $number+1;
	
 //get totai number of questions
$query = "SELECT * FROM `questions`";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows; 
 
 //get correct choice 
 $query = "SELECT * FROM `choices` 
              WHERE question_number = $number AND is_correct = 1";
			  //excute the query
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

//convert result to array 
$row = $result->fetch_assoc();
//set correct choice 
$correct_choice = $row['id'];
//add to scores
if($correct_choice == $selected_choice){
  $_SESSION['score']+1;
}  
if($number == $total){
	header("location: final.php");
	exit();
}else{
	header("location: question.php?n=".$next);
}
}


