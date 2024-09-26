<?php
require 'conn.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีการส่งฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $mid = $_POST['mid']; // ID สมาชิก
    $mname = $_POST['mname']; // ชื่อสมาชิก
    $mlastname = $_POST['mlastname']; // นามสกุลสมาชิก
    $maddress = $_POST['maddress']; // ที่อยู่สมาชิก
    $mtel = $_POST['mtel']; // เบอร์โทรสมาชิก

    // เตรียมคำสั่ง SQL สำหรับอัปเดตข้อมูล
    $sql = "UPDATE member SET 
                mname = ?, 
                mlastname = ?, 
                maddress = ?, 
                mtel = ? 
            WHERE mid = ?";

    // ใช้ prepared statements เพื่อป้องกัน SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $mname, $mlastname, $maddress, $mtel, $mid); // "ssssi" หมายถึงประเภทของพารามิเตอร์

        // ดำเนินการคำสั่ง
        if ($stmt->execute()) {
            // อัปเดตข้อมูลสำเร็จแล้ว รีไดเรกต์ไปยัง memmenu.php
            header("Location: memmenu.php");
            exit; // หยุดการดำเนินการต่อ
        } else {
            echo "เกิดข้อผิดพลาดในการอัปเดตสมาชิก: " . $stmt->error;
        }

        // ปิด statement
        $stmt->close();
    } else {
        echo "เกิดข้อผิดพลาดในการเตรียม statement: " . $conn->error;
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>