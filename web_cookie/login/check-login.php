<?php
  include "connect.php";
  
  session_start();

  $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
  $stmt->bindParam(1, $_POST["username"]);
  $stmt->bindParam(2, $_POST["password"]);
  $stmt->execute();
  $row = $stmt->fetch();

  
  if (!empty($row)) { 

    $_SESSION["fullname"] = $row["name"];   
    $_SESSION["username"] = $row["username"];


    echo "เข้าสู่ระบบสำเร็จ<br>";
    echo "<a href='user-home.php'>ไปยังหน้าหลักของผู้ใช้</a>"; 
    echo"<hr>";
    print_r($_COOKIE);
    print_r($_SESSION);

  } else {
    echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
    echo "<a href='login-form.php'>เข้าสู่ระบบอีกครัง</a>"; 
  }
?>
