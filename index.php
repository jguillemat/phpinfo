 <?php
$servername = "mysql.database.svc.cluster.local";
$serverport = "3306";
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $serverport);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT productName, productDescription FROM products WHERE productLine LIKE '%Classic Cars%'";
$result = $conn->query($sql);
echo '<html><head><style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
</head><body>';
if ($result->num_rows > 0) {
    // output data of each row
echo '<table style="width:100%"><tr><th>Product</th><th>Description</th></tr>';
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["productName"]. "</td><td>" . $row["productDescription"]. "</td></tr>";
    }
echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
echo "</body></html>";
?>

