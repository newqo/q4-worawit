<?php include "connect.php" ?>
<html>
<head>
    <meta charset="utf-8">
    <script>
        function confirm_delete_member(username){
            var ans = confirm("ต้องการลบผุ้ใช้ " + username + " ใช่หรือไม่");
            if(ans == true)
            {
                document.location = "workshop6_delete_member.php?username=" +username;
            }
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
            echo "<a href='workshop5_member_detail.php?username=" . $row["username"] . "'>";
            echo "<img src='member_photo/".$row["username"].".jpg' width='100'><br>";
            echo "</a>";
            echo "<a href='#' onclick=\"confirm_delete_member('{$row["username"]}')\">ลบ</a>";
            echo "<hr>\n";
        }
    ?>
</body>
</html>