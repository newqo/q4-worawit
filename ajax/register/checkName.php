<?php
include "connect.php";

// $takenUsernames = array ("bill", "ted");

sleep(1);

// if (!in_array( $_GET["username"], $takenUsernames )) {
// 	echo "okay";
// } else {
// 	echo "denied";
// }

$stmt = $pdo->prepare("SELECT COUNT(username) AS 'count' FROM member WHERE username = ?");
$stmt->bindParam(1,$_GET["username"]);
$stmt->execute();
$row = $stmt->fetch();

if ($row["count"] == 0){
	echo "okay";
} else {
	echo "denied";
}
?>
