<?php
require 'conn.php';

// ตรวจสอบว่ามีการส่ง 'aid' มาหรือไม่
if (isset($_GET['aid'])) {
  $aid = $_GET['aid'];

  // เริ่มต้นการทำธุรกรรม
  $conn->begin_transaction();

  try {
    // เตรียมและรันคำสั่งลบจาก actor_product
    $sql1 = "DELETE FROM actor_product WHERE aid = ?";
    $stmt1 = $conn->prepare($sql1);

    if ($stmt1) {
      $stmt1->bind_param("i", $aid);
      $stmt1->execute();
      $stmt1->close(); // ปิด statement
    } else {
      throw new Exception("Error preparing statement for actor_product: " . $conn->error);
    }

    // เตรียมและรันคำสั่งลบจาก actor
    $sql2 = "DELETE FROM actor WHERE aid = ?";
    $stmt2 = $conn->prepare($sql2);

    if ($stmt2) {
      $stmt2->bind_param("i", $aid);
      if ($stmt2->execute()) {
        // Commit การทำธุรกรรม
        $conn->commit();

        // Redirect กลับไปที่เมนูหลักหลังจากลบสำเร็จ
        header("Location: actormenu.php");
        exit();
      } else {
        throw new Exception("Error deleting actor: " . $stmt2->error);
      }
      $stmt2->close(); // ปิด statement
    } else {
      throw new Exception("Error preparing statement for actor: " . $conn->error);
    }
  } catch (Exception $e) {
    // Rollback ถ้ามีข้อผิดพลาด
    $conn->rollback();
    echo "เกิดข้อผิดพลาด: " . $e->getMessage();
  }
} else {
  echo "No actor ID provided.";
}

$conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
