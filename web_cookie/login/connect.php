<?php
try {
	$pdo = new PDO("mysql:host=localhost;dbname=sec1_2;charset=utf8", "Wstd2", "QmJ90GA8");
} catch (PDOException $e) {
	echo "เกิดข้อผิดพลาด : ".$e->getMessage();
}
?>