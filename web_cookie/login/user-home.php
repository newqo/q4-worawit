<?php session_start(); ?>
<?php include "connect.php";?>

<html>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
<hr>
<?php
    $stmt = $pdo->prepare("SELECT orders.ord_id,product.pid,product.pname,quantity,(product.price * item.quantity) FROM orders JOIN item ON orders.ord_id = item.ord_id JOIN product ON item.pid = product.pid WHERE orders.username = ? ");
    $stmt->bindParam(1,$_SESSION["username"]);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "Order_ID: " . $row ["ord_id"] . "<br>";
        echo "รหัสสินค้า: " . $row ["pid"] . "<br>";
        echo "ชื่อสินค้า: " . $row ["pname"] . "<br>";
        echo "จำนวน: " . $row ["quantity"] . "<br>";
        echo "ราคารวม: " . $row["(product.price * item.quantity)"] . " บาท" ."<br>";
        echo "<hr>\n";
    }
?>

หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
</body>
</html>
