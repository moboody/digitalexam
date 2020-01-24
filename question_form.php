<?php
include_once "functions.php";
$exs = get_ex();
$xnum = mysqli_num_rows($exs);
$xmen = "<select name=\"exid\">
	<option selected>Select Exam</option>\n";

while($row = mysqli_fetch_assoc($exs)){
	$title = $row['title'];
	$id = $row['id'];
	$dat = $row['date'];
	$xmen .= "	<option value=\"$id\">$title ($dat)</option>\n";
}

/*
for($i = 0; $i < $xnum; $i++)
{
	$title = mysqli_result($exs,$i,'title');
	$id = mysqli_result($exs,$i,'id');
	$dat = mysqli_result($exs, $i,'date');
	$xmen .= "	<option value=\"$id\">$title ($dat)</option>\n";
}
*/

$xmen .= "</select>"
?>

<?php include('header.php'); ?>

<center>
<body bgcolor="#FFFFFF" text="#000000">
<form method="post" action="">
  <p>
    <input type="hidden" name="do" value="add"> 
  </p>
  <p>Exam: <?php echo "$xmen" ?>    </p>
  <p>
    Question: <textarea name="question" cols="100" rows="3"></textarea>
  </p>
  <p>
 Answers (Tick the correct answer.): <br/> 
    Answer 1: <input type="radio" name="answer" value="1">
    <input type="text" name="a1" size="75">
  </p>
  <p> 
    Answer 2: <input type="radio" name="answer" value="2">
    <input type="text" name="a2" size="75">
  </p>
  <p> 
    Answer 3: <input type="radio" name="answer" value="3">
    <input type="text" name="a3" size="75">
  </p>
  <p> 
    Answer 4: <input type="radio" name="answer" value="4">
    <input type="text" name="a4" size="75">
  </p>
    <p>
    Comments: <textarea name="comments" cols="75" rows="3"></textarea>
  </p>
   <!-- <p>
  Image: <input type="file" name="pik">
  </p> -->
  <p>
    <input type="submit" value="Add question">
  </p>

</form>
</center>
</body>
</html>
