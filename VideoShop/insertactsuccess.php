<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Actor Success</title>
</head>
<body>
<?php
require 'conn.php';

// เริ่มต้นการทำธุรกรรม
$conn->begin_transaction();

try {
    
    // เพิ่มข้อมูลนักแสดง
    $sql_update = "INSERT INTO actor (aid, aname, alastname, aaddress, aage) 
                   VALUES ('$_POST[aid]', '$_POST[aname]', '$_POST[alastname]', '$_POST[aaddress]', '$_POST[aage]')";
    
    $result = $conn->query($sql_update);

    if (!$result) {
        throw new Exception("Error: " . $conn->error);
    }

    // เพิ่มข้อมูลผลิตภัณฑ์ที่เลือก
    $aid = $_POST['aid']; // รับ ID ของนักแสดง
    $pids = isset($_POST['pid']) ? $_POST['pid'] : [];

    foreach ($pids as $pid) {
        $sql_product_insert = "INSERT INTO actor_product (aid, pid) VALUES ('$aid', '$pid')";
        $result_product = $conn->query($sql_product_insert);

        if (!$result_product) {
            throw new Exception("Error: " . $conn->error);
        }
    }

    // Commit การทำธุรกรรม
    $conn->commit();

    echo "Insert Success <br>";
    header("refresh: 1; url=actormenu.php");
} catch (Exception $e) {
    // Rollback ถ้ามีข้อผิดพลาด
    $conn->rollback();
    echo "เกิดข้อผิดพลาด: " . $e->getMessage();
}

$conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
?> 

</body>
</html>
