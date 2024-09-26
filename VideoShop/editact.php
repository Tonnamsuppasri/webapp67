<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Actors</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<?php
        if(!isset($_GET['aid'])){
            header("refresh: 0; url=actormenu.php");
        }
        require 'conn.php';
        $sql = "SELECT * FROM actor WHERE aid='$_GET[aid]'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    ?>
    <h1>Edit</h1><br>
<form method="post" action="editactsuccess.php">

        <p>
            <label>ID</label>
            <input type="text" name="aid" id="aid" value="<?=$row['aid'];?>" />

        </p>

        <p>
            <label>ชื่อ</label>
            <input type="text" name="aname" id="aname" value="<?=$row['aname'];?>" />

        </p>

        <p>
            <label>นามสกุล</label>
            <input type="text" name="alastname" id="alastname" value="<?=$row['alastname'];?>" />

        </p>

        <p>
            <label>บ้านเกิด</label>
            <input type="text" name="aaddress" id="aaddress" value="<?=$row['aaddress'];?>" />

        </p>

        <p>
            <label>อายุ</label>
            <input type="text" name="aage" id="aage" value="<?=$row['aage'];?>" />

        </p>

        
        
        <input type="submit" value="บันทึก" class="submit">
        <a href='actormenu.php' class="back-button"><button type="button">ย้อนกลับ</button></a>
    </form>

</body>
</html>