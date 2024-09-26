<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Member Success</title>
</head>
<body>
<?php
    require 'conn.php';

    // เริ่มต้นการทำธุรกรรม
    $conn->begin_transaction();

    try {
        // เพิ่มข้อมูลสมาชิก
        $sql_update = "INSERT INTO member (mid, mname, mlastname, maddress, mtel) 
                       VALUES ('$_POST[mid]', '$_POST[mname]', '$_POST[mlastname]', '$_POST[maddress]', '$_POST[mtel]')";
        
        $result = $conn->query($sql_update);

        if (!$result) {
            throw new Exception("Error: " . $conn->error);
        }

        // เพิ่มข้อมูลผลิตภัณฑ์ที่เลือก
        $mid = $_POST['mid'];
        $pids = isset($_POST['pid']) ? $_POST['pid'] : [];

        foreach ($pids as $pid) {
            $sql_insert_product = "INSERT INTO mem_product (mid, pid) VALUES ('$mid', '$pid')";
            $result_product = $conn->query($sql_insert_product);

            if (!$result_product) {
                throw new Exception("Error: " . $conn->error);
            }
        }

        // Commit การทำธุรกรรม
        $conn->commit();

        echo "Insert Success <br>";
        header("refresh: 1; url=memmenu.php");
    } catch (Exception $e) {
        // Rollback ถ้ามีข้อผิดพลาด
        $conn->rollback();
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }

    $conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
?> 

</body>
</html>
