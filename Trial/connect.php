<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ridelink_sacco"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<h2 style='font-family: Arial; color: green;'>✅ Connected successfully</h2>";

$sql = "SELECT member_id, full_name, phone, email, employment_status, monthly_income FROM sacco_members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10' cellspacing='0' 
            style='border-collapse: collapse; width: 80%; margin: 20px auto; font-family: Arial; box-shadow: 0px 3px 8px rgba(0,0,0,0.2);'>
            <tr style='background-color: #4CAF50; color: white; text-align: left;'>
                <th>Member ID</th>
                <th>Full Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Employment</th>
                <th>Monthly Income</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr style='background-color: #f9f9f9;'>
                <td>" . $row["member_id"] . "</td>
                <td>" . $row["full_name"] . "</td>
                <td>" . $row["phone"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["employment_status"] . "</td>
                <td>" . $row["monthly_income"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center; font-family: Arial;'>No results found.</p>";
}

$conn->close();
?>
