
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product menu VDO SHOP</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<?php
    require 'conn.php';
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    if(!$result){
        die("Error : ". $conn->$conn_error);
    }
?>

<h1>Products</h1><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อ</th>
                    <th>รายละเอียด</th>
                    <th>ระยะเวลา</th>
                    <th>วันที่</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php // show data by fetch from database
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo"<tr><td>"
                            .$row["pid"]."</td>"
                            ."<td>".$row["pname"]."</td>"
                            ."<td>".$row["pdetail"]."</td>"
                            ."<td>".$row["ptime"]."</td>"
                            ."<td>".$row["pdate"]."</td>"
                            ."<td>"
                            ."<a href='editpro.php?pid=".$row["pid"]."'><button> Edit </button></a>"."</td>"
                            ."<td>"."<a href='prodelete.php?pid=".$row["pid"]."' onclick=\"return confirm('Are you sure you want to delete this VDO?');\"><button>Delete</button></a>"
                            ."</td>";
                            echo "</tr>";    
                        }
                    }else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table>
        <br>
        <a href='insertpro.php'><button> Insert </button></a>
        <a href='home.php'><button> Home </button></a>
</body>
</html>
