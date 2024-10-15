<?php include "connect.php" ?>
<html>
<head>
    <meta charset="utf-8">
    <script>
        function Edit(pid){
            document.location = "lab9_HW13_Edit_ProductImage.php?pid=" +pid;
        }
    </script>
</head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo "ชื่อสมาชิก: " . $row ["name"] . "<br>";
            echo "ที่อยู่: " . $row ["address"] . "<br>";
            echo "อีเมล์: " . $row ["email"] . "<br>";
            if (!empty($row["ProfileImage"])) {
                $Profile = base64_encode($row["ProfileImage"]);
                echo "<img src='data:image/jpeg;base64," . $Profile . "' width='100'><br>";
            } else {
                echo "No image available.<br>"; 
            }
            echo "<a href='lab9_HW14_MemberEdit.php?username=" . $row["username"] . "'>แก้ไข</a>";
            echo "<hr>\n";
        }
    ?>
</body>
</html>

</>
</html>