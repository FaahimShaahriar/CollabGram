<?php
// Fix: Include the necessary file
require_once('../models/userModel.php');

// Fix: Change variable name to 'term'
$searchuser= $_POST['searchuser'];

// Fix: Use prepared statements to prevent SQL injection
$con = mysqli_connect('localhost', 'root', '', 'webtech_project');
$sql = "SELECT * FROM reg_info WHERE id LIKE '%$searchuser%' or name LIKE '%$$searchuser%' or email LIKE '%$$searchuser%' or gender LIKE '%$searchuser%' or dob LIKE '%$$searchuser%' or type LIKE '%$$searchuser%'";
$result = mysqli_query($con, $sql);

$content = "<table border=1>
                <tr>
                                <td>Id</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Gender</td>
                                <td>Dob</td>
                                <td>User type</td>
                </tr>";

$rows = "";
while ($row = mysqli_fetch_assoc($result)) {
    $rows .= "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['type']}</td>
            </tr>";
}

if (empty($rows)) {
    echo "<p>No data found</p>";
} else {
    echo $content . $rows . "</table>";
}

mysqli_close($con);
?>


