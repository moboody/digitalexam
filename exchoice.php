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
    
/*
for($i = 0; $i < $xnum; $i++)
{
	$title = mysqli_result($exs,$i,'title');
	$id = mysqli_result($exs,$i,'id');
	$dat = mysqli_result($exs, $i,'date');
    
    */
    
    
    
    
	$xmen .= "	<option value=\"$id\">$title ($dat)</option>\n";
}
$xmen .= "</select>"
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php include('header.php'); ?>

<body>

<div align="center">
  <p>Select an exam</p>
  <form action="exam.php" method="get" name="" target="_blank" id=""><?php echo "$xmen"; ?>
    <input type="submit" value="Go">
  </form>
  <p>&nbsp; </p>
</div>
</body>
</html>
<?php include('footer.php'); ?>
