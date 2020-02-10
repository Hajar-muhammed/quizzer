<?php include 'database.php';?>
<?php  
//get totai number of questions
$query = "SELECT * FROM `questions`";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Quizzer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
      <header>
      	<div class="container">
      		<h1>PHP Quizzer</h1>
      	</div>
      </header>
      <main>
      	<div class="container">
      	    <h2>Test Your PHP Knowledg</h2>
      	    <p>This is a Multiple Choice Quize To Test Your Knowledg Of PHP</p>
      	    <ul>
      	    	<li><strong>Number Of Questions: </strong><?php echo $total; ?></li>
      	    	<li><strong>Type: </strong>Multiple Choice</li>
      	    	<li><strong>Estimated time: </strong><?php echo $total * 0.5; ?> Minutes</li>
      	    </ul>
      	    <a href="question.php?n=1" class="start">Start Quiz</a>
     
      	    
      	</div>
      </main>
      <footer>
      	<div class="container">
      		Copyright &copy; 2020, PHP Quizzer
      	</div>
      </footer>
</body>
</html>
