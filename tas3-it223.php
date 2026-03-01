<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hr"; // make sure this matches your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hr_employee_details";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>HR Employee View</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>HR Employee Details</h2>

<table>
    <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Job Title</th>
        <th>Employment Date</th>
        <th>Manager Name</th>
        <th>Department</th>
        <th>Location</th>
    </tr>

    <?php
     if ($result->num_rows > 0) {

   
    while ($empRow = $result->fetch_assoc()) {

       
        $empId   = $empRow["employee_id"];
        $empName = $empRow["employee_name"];
        $job     = $empRow["job_title"];
        $hireDt  = $empRow["employment_date"];
        $manager = $empRow["manager_name"];
        $dept    = $empRow["department_name"];
        $loc     = $empRow["full_location"];

        
        echo "<tr>";
        echo "<td>" . $empId . "</td>";
        echo "<td>" . $empName . "</td>";
        echo "<td>" . $job . "</td>";
        echo "<td>" . $hireDt . "</td>";
        echo "<td>" . $manager . "</td>";
        echo "<td>" . $dept . "</td>";
        echo "<td>" . $loc . "</td>";
        echo "</tr>";

        
    }

} else {
    
    echo "<tr><td colspan='7'>No employee records found (maybe table is empty?)</td></tr>";
}
    ?>

</table>

</body>
</html>

<?php
$conn->close();
?>