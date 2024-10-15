<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("UPDATE member SET username=?, password=?, name=?, address=?, mobile=?, email=?, ProfileImage=? WHERE username = ?");
    $stmt->bindParam(1,$_POST["username"]);
    $stmt->bindParam(2,$_POST["password"]);
    $stmt->bindParam(3,$_POST["name"]);
    $stmt->bindParam(4,$_POST["address"]);
    $stmt->bindParam(5,$_POST["mobile"]);
    $stmt->bindParam(6,$_POST["email"]);
    $Profile = file_get_contents($_FILES['profile']['tmp_name']);
    $stmt->bindParam(7,$Profile,PDO::PARAM_LOB);
    $stmt->bindParam(8,$_POST["username"]);

    if($stmt->execute()){
        header("location: lab9_HW14_Memberlist_Edit_bt.php");
    }
?>