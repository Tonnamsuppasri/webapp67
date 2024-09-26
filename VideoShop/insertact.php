<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Actor</title>
    <link rel="stylesheet" href="style.css">
    <style>
        select {
            width: 100%;
            height: 100px;
        }
    </style>
</head>
<body>
<h1>Insert</h1><br>
<form method="post" action="insertactsuccess.php">

    <p>
        <label>ID</label>
        <input type="text" name="aid" id="aid" required>
    </p>

    <p>
        <label>ชื่อ</label>
        <input type="text" name="aname" id="aname" required>
    </p>

    <p>
        <label>นามสกุล</label>
        <input type="text" name="alastname" id="alastname" required>
    </p>

    <p>
        <label>บ้านเกิด</label>
        <input type="text" name="aaddress" id="aaddress" required>
    </p>

    <p>
        <label>อายุ</label>
        <input type="text" name="aage" id="aage" required>
    </p>
    
    <p>
    <label>หนังที่แสดง</label><br>
    <?php
        require 'conn.php'; // เชื่อมต่อฐานข้อมูล
        $sql = "SELECT pid, pname FROM product"; // ดึง pid และ pname
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<input type='checkbox' name='pid[]' value='" . $row['pid'] . "'> " . $row['pname'] . "<br>";
            }
        } else {
            echo "<p>ยังไม่ได้เลือก</p>";
        }
        $conn->close();
    ?>
    </p>

    <input type="submit" value="บันทึก" class="submit">
    <a href='actormenu.php' class="back-button"><button type="button">ย้อนกลับ</button></a>
</form>
</body>
</html>
