<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <form>
        <label for="">ชื่อผู้ใช้</label>
        <input type="text" name="name">
        <button type="submit">ค้นหา</button>
    </form>
    <div>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
            if(!empty($_GET["name"]))
            {
                $name_var = '%'.$_GET["name"].'%';
            }
            $stmt->bindParam(1,$name_var);
            $stmt->execute();
        ?>
        <?php
            while ($row = $stmt->fetch()) {
                echo "ชื่อสมาชิก: " . $row ["name"] . "<br>";
                echo "ที่อยู่: " . $row ["address"] . "<br>";
                echo "อีเมล์: " . $row ["email"] . "<br>";
                echo "<img src='member_photo/".$row["username"].".jpg' width='100'><br>";
            }
        ?>
    </div>
</body>
</html>