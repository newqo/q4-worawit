<?php include "connect.php" ?>
<?php
        $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
        $stmt->bindParam(1, $_GET["pid"]);
        $stmt->execute();
        $row = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab9 HW11</title>
</head>
<body>
    <form action="lab9_HW13_edit_product.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?=$row["pid"]?>" >
        <label for="">ชื่อสินค้า</label><br>
        <input type="text" name="pname" required value="<?=$row["pname"]?>"><br>
        <label for="">รายละเอียดสินค้า</label><br>
        <textarea name="pdetail" rows="3" cols="40" required ><?=$row["pdetail"]?></textarea><br>
        <label for="">ราคาสินค้า</label><br>
        <input type="number" name="price" required value="<?=$row["price"]?>"><br>
        <label for="">รูปภาพสินค้า</label><br>
        <input type="file" accept=".jpg" name="productImage" required><br>
        <button type="submit" name="submit">แก้ไข</button>
    </form>
</body>
</html>