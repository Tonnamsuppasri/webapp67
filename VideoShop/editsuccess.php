<?php
require 'conn.php'; // Include database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get values from the form
    $mid = $_POST['mid']; // Member ID
    $mname = $_POST['mname']; // Member's first name
    $mlastname = $_POST['mlastname']; // Member's last name
    $maddress = $_POST['maddress']; // Member's address
    $mtel = $_POST['mtel']; // Member's phone number

    // Prepare SQL statement for updating data
    $sql = "UPDATE member SET 
                mname = ?, 
                mlastname = ?, 
                maddress = ?, 
                mtel = ? 
            WHERE mid = ?";

    // Initialize a statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "<script>alert('Error: Unable to prepare statement.'); window.location.href='promenu.php';</script>";
        exit;
    }

    // Bind parameters
    $stmt->bind_param("ssssi", $mname, $mlastname, $maddress, $mtel, $mid);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Edit Success'); window.location.href='memmenu.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . $stmt->error . "'); window.location.href='memmenu.php';</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>