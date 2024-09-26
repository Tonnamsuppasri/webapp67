<?php
require 'conn.php';

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    // Prepare and execute the delete statement
    $sql = "DELETE FROM product WHERE pid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $pid);

    if ($stmt->execute()) {
        // Redirect back to main menu after deletion
        header("Location: promenu.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$conn->close();
?>
