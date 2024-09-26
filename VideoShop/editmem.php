<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<?php
        if(!isset($_GET['mid'])){
            header("refresh: 0; url=mainmenu.php");
        }
        require 'conn.php';
        $sql = "SELECT * FROM member WHERE mid='$_GET[mid]'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    ?>
    <h1>Edit</h1><br>
<form method="post" action="editsuccess.php">

        <p>
            <label>ID</label>
            <input type="text" name="mid" id="mid" value="<?=$row['mid'];?>" />

        </p>

        <p>
            <label>ชื่อ</label>
            <input type="text" name="mname" id="mname" value="<?=$row['mname'];?>" />

        </p>

        <p>
            <label>นามสกุล</label>
            <input type="text" name="mlastname" id="mlastname" value="<?=$row['mlastname'];?>" />

        </p>

        <p>
            <label>ที่อยู่</label>
            <input type="text" name="maddress" id="maddress" value="<?=$row['maddress'];?>" />

        </p>

        <p>
            <label>เบอร์โทร</label>
            <input type="text" name="mtel" id="mtel" value="<?=$row['mtel'];?>" />

        </p>
        <input type="submit" value="บันทึก" class="submit">
        <a href='memmenu.php' class="back-button"><button type="button">ย้อนกลับ</button></a>
    </form>

</body>
</html>