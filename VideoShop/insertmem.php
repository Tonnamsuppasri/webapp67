<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Member</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<h1>Insert</h1><br>
<form method="post" action="insertmemsuccess.php">

        <p>

        <label>ID</label>
        <input type="text" name="mid" id="mid">

        </p>

        <p>

            <label>ชื่อ</label>
            <input type="text" name="mname" id="mname">

        </p>

        <p>

            <label>นามสกุล</label>
            <input type="text" name="mlastname" id="mlastname">

        </p>

        <p>

            <label>ที่อยู่</label>
            <input type="text" name="maddress" id="maddress">

        </p>

        <p>

            <label>เบอร์โทร</label>
            <input type="text" name="mtel" id="mtel">

        </p>

        <p>
        <label>หนังที่ซื้อ</label><br>
        <?php
            require 'conn.php'; // เชื่อมต่อฐานข้อมูล
            $sql = "SELECT pid, pname FROM product"; // ดึง pid และ pname
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<input type='checkbox' name='pid[]' value='" . $row['pid'] . "'> " . $row['pname'] . "<br>";
                }
            } else {
                echo "<p>ยังไม่มีผลิตภัณฑ์</p>";
            }
            $conn->close();
        ?>
    </p>

        <input type="submit" value="บันทึก" class="submit">
        <a href='memmenu.php' class="back-button"><button type="button">ย้อนกลับ</button></a>
    </form>
</body>
</html>