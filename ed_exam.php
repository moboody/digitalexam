<?php
include('header.php');
if(isset($_GET['exid']))
$exid = $_GET['exid'];
else
$exid = 1;
require('connect.php');
$query = "SELECT * FROM questions WHERE eid='$exid' ORDER BY id";
$results = mysqli_query($conn, $query) or die(mysqli_error($query));
$num = mysqli_num_rows($results);

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
$xmen .= "</select>";

?>

<form method="get">
    <?= $xmen ?>
    <span><input type="submit" value="go"></span>
</form>


<?php

while($row = mysqli_fetch_assoc($results)){
	$quid = $row['id'];
	$q = $row['q'];
	$a1 = $row['a1'];
	$a2 = $row['a2'];
	$a3 = $row['a3'];
	$a4 = $row['a4'];
	$comments = $row['comments'];
	$correct = $row['correct'];
	$pik = $row['pic'];
    

/*
for($i = 0; $i < $num; $i++){
	$quid = mysqli_result($results,$i,'id');
	$q = mysqli_result($results,$i,'q');
	$a1 = mysqli_result($results,$i,'a1');
	$a2 = mysqli_result($results,$i,'a2');
	$a3 = mysqli_result($results,$i,'a3');
	$a4 = mysqli_result($results,$i,'a4');
	$comments = mysqli_result($results,$i,'comments');
	$correct = mysqli_result($results,$i,'correct');
	$pik = mysqli_result($results,$i,'pic');
    
    */
    
    
    
	$j = $i + 1;

?>
<script>
    <!--
    function confdel$quid() {
        if (confirm('Are you sure you want to delete question $j?'))
            document.del$quid.submit();
    }
    // 

    -->
</script>
<br>


<fieldset style="text-align:left">
    <legend> <?= $j ?> </legend>


    <form action="question.php" method="POST" style="display:inline">
        <input type="hidden" name="do" value="edit">
        <input type="hidden" name="qid" value="<?= $quid ?>">
        <input type="submit" value="edit">
    </form>
    <form action="question.php" method="POST" name="del<?= $quid ?>"  style="display:inline">
        <input type="hidden" name="do" value="del">
        <input type="hidden" name="qid" value="<?= $quid ?>">
        <input type="hidden" name="exid" value="<?= $exid ?>">
        <input type="button" value="Delete" onClick="javascript:confdel<?= $quid ?>()">
    </form>
    <hr>
    <h3><?= $q ?></h3>
    <?php

if($pik != -1)
{
	echo "<IMG SRC=\"getpik.php?pid=$pik\"><br>";
}
$c1 = ''; $c2 = ''; $c3 = ''; $c4 = '';
switch($correct)
{
	case 1:
		$c1 = 'checked';
		break;
	case 2:
		$c2 = 'checked';
		break;
	case 3:
		$c3 = 'checked';
		break;
	case 4:
		$c4 = 'checked';
		break;
}

?>

    <blockquote>
        <div align="justify">
            <label><input <?= $c1 ?> disabled type="radio"><?= $a1 ?></label><br>
            <label><input <?= $c2 ?> disabled type="radio"><?= $a2 ?></label><br>
            <label><input <?= $c3 ?> disabled type="radio"><?= $a3 ?></label><br>
            <label><input <?= $c4 ?> disabled type="radio"><?= $a4 ?></label><br>
        </div>
    </blockquote>

</fieldset>

<?php
}
include ('footer.php');
?>
