<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert products success</title>
</head>
<body>
<?php
    require 'conn.php';
    $sql_update="INSERT INTO product (pid ,pname ,pdetail ,ptime ,pdate) 
    VALUES ('$_POST[pid]','$_POST[pname]','$_POST[pdetail]' ,'$_POST[ptime]' ,'$_POST[pdate]')";

    $result= $conn->query($sql_update);

    if(!$result) {
        die("Error God Damn it : ". $conn->error);
    } else {

    echo "Insert Success <br>";
    header("refresh: 1; url=promenu.php");
    }

?> 

</body>
</html>