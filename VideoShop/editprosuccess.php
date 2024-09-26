<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Success</title>
</head>
<body>
<?php
            require 'conn.php';
$sql_update="UPDATE product SET pname='$_POST[pname]',pdetail='$_POST[pdetail]' ,ptime='$_POST[ptime]' ,pdate='$_POST[pdate]' WHERE pid='$_POST[pid]' ";

            $result= $conn->query($sql_update);

            if(!$result) {
                die("Error God Damn it : ". $conn->error);
            } else {

            echo "Edit Success <br>";
            header("refresh: 1; url=promenu.php");
            }

        ?>

</body>
</html>