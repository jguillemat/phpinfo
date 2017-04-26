 <?php
$servername = " ";
$serverport = " ";
$username = " ";
$password = " ";
$dbname = " ";

// Create connection
$conn = new mysqli($servername.':'.$serverport, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT productName, productDescription FROM products WHERE productLine LIKE '%Classic Cars%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["productName"]. " - Description: " . $row["productDescription"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
