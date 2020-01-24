<?php
//HTML Head
include("header.php");
//error reporting turned off
error_reporting(0);
// Adding config file for database
require("connect.php");
//PHP Starts

if ($_POST['go']) {
$roll=$_POST['roll'];
// Escaping SQL Injection
//$eiin=mysqli_real_escape_string($ein);

//settype($eiin, 'string');
$self=$_SERVER['PHP_SELF'];




 // SQL(s)
//$link_id = db_connect();
$sql="SELECT * FROM `student` WHERE `roll`='$roll'";
//$sch="SELECT * FROM `schlorship` WHERE `T_CODE`='$eiin' LIMIT 1";
$za=mysqli_query($conn, $sql);
if (!$za) {
die(mysqli_error());
}
//$namee=mysqli_query($sql);
/*if(!$namee)
{
die(mysqli_error());
}
*/
//while ($goa=mysqli_fetch_array($za, mysqli_ASSOC)){
// Table
//echo "<center><b>{$goa['THANA']}   :   $eiin</b></center> ";
//}

//echo "<br/>";
echo "<center><table border=\"0\"><tr style=\"font-size: 20px;
color: #000;\">
<td width=\"100\" ><b>ROLL</b></td>
<td width=\"200\" ><b>NAME</b></td>
<td width=\"300\"><b>EXAM NAME</b></td>
<td width=\"100\"><b>RESULT</b></td>
</tr></table></center>";
echo "<!--";
echo "-->";
while ($row1=mysqli_fetch_array($za, mysqli_ASSOC))
{
// Counting rows
//$num=mysqli_num_rows($za);
// Defining scholarship type
/*$aa="{$row1['STATUS']}";
if ($aa===""){
$res="N/A";
}
if ($aa==="TWMC") {
$res="TALENT";
}
if ($aa==="GWMC") {
$res="GENERAL";
}
// Defining SEX
$ss="{$row1['SEX']}";
if ($ss==="0") {
$se="Male";
}
if ($ss==="1") {
$se="Female";
}*/
// Printing result
echo  "<center><table border=\"1\">

";
echo"
<tr>
<td width=\"100\"><b>{$row1['roll']}<b></td>
<td width=\"200\"><b>{$row1['name']}</b></td>
<td width=\"300\"><b>{$row1['examname']}</b></td>
<td width=\"100\"><b>{$row1['score']}</b></td>
</tr>
</table></center>";

}


}

else
{
// Printing form
echo "<center><b>Please enter students roll to check result</b><br/><br/><form method=\"post\" action=\"$self\">Roll: <input type=\"text\"   name=\"roll\" value=\"\"><br/><input type=\"submit\" name=\"go\" value=\"Check\"></form><center>";
}
// HTML Footer
include("footer.php");
?>
</html>