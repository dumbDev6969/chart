<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'datamining2024';

$con = new mysqli($server, $username, $password, $database);

if ($con->connect_error){
    die('err: '. $con->connect_error);
}

function count_department($con, $department){
   // $it_dep = 'IT';
    $stmt = $con->prepare('SELECT count(Department) FROM employee WHERE Department = ?');
    $stmt->bind_param('s', $department);
    $count = 0;
    if ($stmt->execute()){
        $stmt->bind_result($count);
        $stmt->fetch();
    }
    $stmt->close();
    return $count;
}

$data = [];
$data['IT'] = count_department($con, 'IT');
$data['HR'] = count_department($con, 'HR');
$data['Sales'] = count_department($con, 'Sales');
$data['Finance'] = count_department($con, 'Finance');
$data['Marketing'] = count_department($con, 'Marketing');
$data['Logistics'] = count_department($con, 'Logistics');
$data['Operations'] = count_department($con, 'Operations');

header('Content-Type: application/json');
   echo json_encode($data, JSON_PRETTY_PRINT);
   exit;
?>