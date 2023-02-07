<?php
// $res = mysql_query("SELECT timecheck FROM users WHERE username = '".$_SESSION['username']."'");
// $timech = mysql_result($res, 0, 0);
// $timecheck = time() - $timech;
// $time = time();

// if($timecheck > 1200) {
// 	header ("location: logout.php");
// }else{
// 	$res = mysql_query("UPDATE users SET timecheck = '".$time."' WHERE username = '".$_SESSION['username']."'");
// }

// $sql = mysql_query("SELECT id FROM users WHERE username = '".$_SESSION['username']."'");
// $UserID = mysql_result($sql, 0, 0);
// $res = mysql_query("SELECT LastUpdate FROM tblSessions WHERE UserID = $UserID");
// $LastUpdate = mysql_result($res, 0, 0);
// $Difference = time() - $LastUpdate;

// if (!$LastUpdate) {
// 	if ($Difference > 2000) {
// 		header("Location: logout.php");
// 	}
// }

// $UpdateDiff = mysql_query("UPDATE tblSessions SET TimeDifference = '".$Difference."' WHERE UserID = $UserID");
// $UpdateTime = mysql_query("UPDATE tblSessions SET LastUpdate = '".time()."' WHERE UserID = $UserID");

// $sql = mysql_query("SELECT * FROM tblSessions WHERE LastUpdate < '".time()."'");

// if (mysql_num_rows($sql) == 0) {
// 	//do nothing
// }else{
// 	while($aOffUser = mysql_fetch_array($sql)) {
// 		$Difference = time() - $aOffUser['LastUpdate'];
// 		$UpdateDiff = mysql_query("UPDATE tblSessions SET TimeDifference = '".$Difference."' WHERE UserID = '".$aOffUser['UserID']."'");
		
// 		$res = mysql_query("SELECT * FROM tblSessions WHERE TimeDifference >= 2000");
		
// 		if (mysql_num_rows($res) == 0) {
// 			//do nothing
// 		}else{
// 			while ($aUser = mysql_fetch_array($res)) {
// 				$SetUserOffline = mysql_query("UPDATE users SET useron = 0 WHERE id = '".$aUser['UserID']."'");
// 				$DeleteRow = mysql_query("DELETE FROM tblSessions WHERE UserID = '".$aUser['UserID']."'");
// 			}
// 		}
// 	}
// }




?>