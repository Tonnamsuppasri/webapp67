<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<h1>Insert</h1><br>
<form method="post" action="insertprosuccess.php">

        <p>

        <label>ID</label>
        <input type="text" name="pid" id="pid">

        </p>

        <p>

            <label>ชื่อ</label>
            <input type="text" name="pname" id="pname">

        </p>

        <p>

            <label>รายละเอียด</label>
            <input type="text" name="pdetail" id="pdetail">

        </p>

        <p>

            <label>ระยะเวลา</label>
            <input type="time" name="ptime" id="ptime">

        </p>

        <p>

            <label>วันที่</label>
            <input type="date" name="pdate" id="pdate">

        </p>
        <input type="submit" value="บันทึก" class="submit">
        <a href='promenu.php' class="back-button"><button type="button">ย้อนกลับ</button></a>
    </form>

</body>
</html>