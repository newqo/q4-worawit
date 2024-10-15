<?php include "connect.php" ?>
<html>
<head>
    <meta charset="utf-8">
    <script>
        function Edit(pid){
            document.location = "lab9_HW13_Edit_ProductImage_form.php?pid=" +pid;
        }
    </script>
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
            echo "<a href='#' onclick=\"Edit('{$row["pid"]}')\">แก้ไข</a>";
            echo "<hr>\n";
        }
    ?>
</body>
</html>

</>
</html>