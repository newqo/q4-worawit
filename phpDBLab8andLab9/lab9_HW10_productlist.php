<?php include "connect.php" ?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM product");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo "รหัสสินค้า: " . $row["pid"] . "<br>";
            echo "ชื่อสินค้า: " . $row["pname"] . "<br>";
            echo "รายละเอียดสินค้า: " . $row["pdetail"] . "<br>";
            echo "ราคา: " . $row["price"] . "<br>";
            if (!empty($row["pImage"])) {
                $imageData = base64_encode($row["pImage"]);
                echo "<img src='data:image/jpeg;base64," . $imageData . "' width='100'><br>";
            } else {
                echo "No image available.<br>"; 
            }
            echo "<hr>\n";
        }
    ?>
</body>
</html>

</body>
</html>