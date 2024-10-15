<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo "ชื่อสมาชิก: " . $row ["name"] . "<br>";
            echo "ที่อยู่: " . $row ["address"] . "<br>";
            echo "อีเมล์: " . $row ["email"] . "<br>";
            echo "<a href='workshop5_member_detail.php?username=" . $row["username"] . "'>";
            echo "<img src='member_photo/".$row["username"].".jpg' width='100'><br>";
            echo "</a>";
            echo "<a href='workshop9_member_editform.php?username=" . $row["username"] . "'>แก้ไข</a>";
            echo "<hr>\n";
        }
    ?>
</body>
</html>