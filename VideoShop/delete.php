<?php
require 'conn.php';

if (isset($_GET['mid'])) {
    $mid = $_GET['mid'];

    // เริ่มต้นการทำธุรกรรม
    $conn->begin_transaction();

    try {
        // เตรียมและรันคำสั่งลบจาก member_product
        $sql1 = "DELETE FROM mem_product WHERE mid = ?";
        $stmt1 = $conn->prepare($sql1);
        
        if ($stmt1) {
            $stmt1->bind_param("i", $mid);
            $stmt1->execute();
            $stmt1->close(); // ปิด statement
        } else {
            throw new Exception("Error preparing statement for member_product: " . $conn->error);
        }

        // เตรียมและรันคำสั่งลบจาก member
        $sql2 = "DELETE FROM member WHERE mid = ?";
        $stmt2 = $conn->prepare($sql2);
        
        if ($stmt2) {
            $stmt2->bind_param("i", $mid);
            if ($stmt2->execute()) {
                // Commit การทำธุรกรรม
                $conn->commit();
                
                // Redirect กลับไปที่เมนูหลักหลังจากลบสำเร็จ
                header("Location: memmenu.php");
                exit();
            } else {
                throw new Exception("Error deleting member: " . $stmt2->error);
            }
            $stmt2->close(); // ปิด statement
        } else {
            throw new Exception("Error preparing statement for member: " . $conn->error);
        }
    } catch (Exception $e) {
        // Rollback ถ้ามีข้อผิดพลาด
        $conn->rollback();
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
} else {
    echo "No member ID provided.";
}

$conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
?>
