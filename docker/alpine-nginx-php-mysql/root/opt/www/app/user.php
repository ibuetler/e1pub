<?php
$servername = "localhost";
$username = "accounts";
$password = "hobo.hobo";
$dbname = "accounts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "<h3>Please wait for MySQL service ... (refresh in 5 seconds)</h3>";
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style=\"width:100%\"><thead><tr align=\"left\"><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
