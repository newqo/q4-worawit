<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]);
    $stmt->execute();
    $row = $stmt->fetch();
?>
<div>
    <h1>รายละเอียดสมาชิก</h1>
</div>
<div style="display:flex">
    <div style="padding-top: 30px">
        <?php
            if (!empty($row["ProfileImage"])) {
                $Profile = base64_encode($row["ProfileImage"]);
                echo "<img src='data:image/jpeg;base64," . $Profile . "' width='100'><br>";
            } else {
                echo "No image available.<br>"; 
            }
        ?>
    </div>
    <div style="padding-left: 15px">
        <h2><?=$row["username"]?></h2>
        <p>ชื่อสมาชิก: <?=$row["name"]?></p>
        <p>ที่อยู่:  <?=$row["address"]?></p>
        <p>อีเมล์: <?=$row["email"]?></p>
    </div>
</div>
</body>
</html>