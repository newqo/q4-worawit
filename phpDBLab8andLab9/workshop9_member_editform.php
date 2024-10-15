<?php include "connect.php" ?>
<?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1, $_GET["username"]);
        $stmt->execute();
        $row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>workshop9</title>
</head>
<body>
    <form action="workshop9_member-edit.php" method="post">
        <label for="">Username : </label><input type="text" name="username" value="<?=$row["username"]?>"><br>
        <label for="">Password : </label><input type="text" name="password" value="<?=$row["password"]?>"><br>
        <label for="">Name : </label><input type="text" name="name" value="<?=$row["name"]?>"><br>
        <label for="">Address : </label><input type="text" name="address" value="<?=$row["address"]?>"><br>
        <label for="">Mobile : </label><input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
        <label for="">Email :</label><input type="email" name="email" value="<?=$row["email"]?>"><br>
        <button type="submit">ยืนยันการแก้ไข</button>
    </form>
</body>
</html>