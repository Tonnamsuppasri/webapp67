<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (!isset($_GET['pid'])) {
        header("refresh: 0; url=mainmenu.php");
    }
    require 'conn.php';
    $sql = "SELECT * FROM product WHERE pid='$_GET[pid]'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    ?>
    <h1>Edit</h1><br>
    <form method="post" action="editprosuccess.php">

        <p>
            <label>ID</label>
            <input type="text" name="pid" id="pid" value="<?= $row['pid']; ?>" />

        </p>

        <p>
            <label>ชื่อ</label>
            <input type="text" name="pname" id="pname" value="<?= $row['pname']; ?>" />

        </p>

        <p>
            <label>รายละเอียด</label>
            <input type="text" name="pdetail" id="pdetail" value="<?= $row['pdetail']; ?>" />

        </p>

        <p>
            <label>ระยะเวลา</label>
            <input type="time" name="ptime" id="ptime" value="<?= $row['ptime']; ?>" />

        </p>

        <p>
            <label>วันที่</label>
            <input type="date" name="pdate" id="pdate" value="<?= $row['pdate']; ?>" />

        </p>
        <input type="submit" value="บันทึก" class="submit">
        <a href='promenu.php' class="back-button"><button type="button">ย้อนกลับ</button></a>
    </form>

</body>

</html>