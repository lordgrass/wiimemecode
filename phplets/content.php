<?php
// Database connection settings
$host     = "localhost:3306";   // MySQL server host
$username = "enadasa";        // MySQL username
$password = "C^ZtbsjKzl6tv#86";            // MySQL password
$dbname   = "notes";     // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . htmlspecialchars($conn->connect_error));
}

// SQL query to get the latest row based on ID
$sql = "SELECT message FROM messages ORDER BY id DESC LIMIT 1";

if ($result = $conn->query($sql)) {
    if ($result->num_rows > 0) {
        // Fetch the latest message
        $row = $result->fetch_assoc();
        // Output as plain text (no HTML styling)
        header("Content-Type: text/plain; charset=UTF-8");
        echo $row['message'];
    } else {
        // No rows found
        header("Content-Type: text/plain; charset=UTF-8");
        echo "No messages found.";
    }
    $result->free();
} else {
    // Query error
    header("Content-Type: text/plain; charset=UTF-8");
    echo "Error: " . htmlspecialchars($conn->error);
}

// Close connection
$conn->close();
?>

