<?php
// Database connection
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'projects';

$con = new mysqli($server, $username, $password, $db);

if ($con->connect_error) {
    die('Error: ' . $con->connect_error);
} 

// Query to fetch user registration counts by date
$sql = "SELECT DATE(date_registered) as date, COUNT(*) as user_count FROM users GROUP BY DATE(date_registered);
";
$result = $con->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['dates'][] = $row['date'];
        $data['userCounts'][] = $row['user_count'];
    }
} else {
    echo 'np rows affex';
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);


$con->close();
?>
