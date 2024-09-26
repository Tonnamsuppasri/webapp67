<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Success</title>
</head>
<body>
<?php
require 'conn.php'; // Include database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prepare SQL statement for updating data
    $sql_update = "UPDATE product SET 
                    pname = ?, 
                    pdetail = ?, 
                    ptime = ?, 
                    pdate = ? 
                    WHERE pid = ?";

    // Initialize a statement
    $stmt = $conn->prepare($sql_update);

    if ($stmt === false) {
        echo "<script>alert('Error: Unable to prepare statement.'); window.location.href='promenu.php';</script>";
        exit;
    }

    // Bind parameters
    $stmt->bind_param("ssssi", $_POST['pname'], $_POST['pdetail'], $_POST['ptime'], $_POST['pdate'], $_POST['pid']);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Edit Success'); window.location.href='promenu.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . $stmt->error . "'); window.location.href='promenu.php';</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>


</body>
</html>