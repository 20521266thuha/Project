<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "book_t";

// Create a connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Specify the table you want to interact with
$table_name = "books"; // Replace "your_table_name" with the actual table name

// Example query to select data from the table
$sql = "SELECT * FROM $table_name";

// Perform the query
$result = $conn->query($sql);

// Check if the query was successful
// if ($result) {
//     // Fetch and output the data
//     while ($row = $result->fetch_assoc()) {
//         print_r($row);
//     }  
// } else {
//     // Output an error message if the query fails
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// Close the connection
$conn->close();
