<?php
if(isUserAdmin($loggedInUser->display_username))
{
$bname = mysql_real_escape_string($_GET["id"]);
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Deleted the thread with the id of $bname');
");
mysql_query("DELETE FROM Thread WHERE Id = " . mysql_real_escape_string($_GET["id"]));
mysql_query("DELETE FROM Topic WHERE Thread = " . mysql_real_escape_string($_GET["id"]));
header("Location:index.php?Page=Threads");
}
?>