<?php /*code uses an employee table present in satish database on MySQL. 
The name column in the employee table is accessed. 
Ensure that the table and database connection parameters are modified 
as per your installation.  */
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "satish";
    $conn = new mysqli($dbhost, $dbuser, "", $db) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

$conn = OpenCon();
$username = $_POST['username'];
$sql = "SELECT name FROM employee where name like'$username%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<br>" . "Name: " . $row["name"];
    }
} else {
    echo "0 results";
}

CloseCon($conn);

?>