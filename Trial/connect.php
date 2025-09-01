<?php
$servername = "localhost";
$username = "root";
$password = "Zakyboss";
$dbname = "trialdb"; // your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<h2 style='font-family: Arial; color: green;'>✅ Connected successfully</h2>";

$sql = "SELECT id, Fname, Lname, Email, Course FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10' cellspacing='0' 
            style='border-collapse: collapse; width: 80%; margin: 20px auto; font-family: Arial; box-shadow: 0px 3px 8px rgba(0,0,0,0.2);'>
            <tr style='background-color: #4CAF50; color: white; text-align: left;'>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Course</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr style='background-color: #f9f9f9;'>
                <td>" . $row["id"] . "</td>
                <td>" . $row["Fname"] . "</td>
                <td>" . $row["Lname"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Course"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center; font-family: Arial;'>No results found.</p>";
}

$conn->close();
?>
