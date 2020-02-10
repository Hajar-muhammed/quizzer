<?php include 'database.php';?>
 <?php session_start(); ?>
<?php
//set qstion_number
$number = (int) $_GET['n'];
//get totai number of questions
$query = "SELECT * FROM `questions`";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows; 
//get questions 
$query  = "SELECT * FROM `questions` WHERE question_number = $number";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();
//get choices
$query  = "SELECT * FROM `choices` WHERE question_number = $number";
$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
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
      	    <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
                <p class="question"> 
                <?php echo $question['text'];?>
				</p>
                <form method="POST" action="process.php">
				<ul class="choices">
				<?php while($row = $choices->fetch_assoc()): ?>
				 <li><input  type="radio" name="choice" value="<?php echo $row['id']; ?>"/><?php echo $row['text'];?></li>
                     <?php endwhile; ?>
					 </ul>
					  <input type="submit" name="submit">
					  <input type="hidden" name="number" value="<?php echo $number; ?>" />
                </form>
      	</div>
      </main>
      <footer>
      	<div class="container">
      		Copyright &copy; 2020, PHP Quizzer
      	</div>
      </footer>
</body>
</html>