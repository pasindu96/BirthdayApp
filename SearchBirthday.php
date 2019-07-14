<?php

    $conn = new mysqli("localhost","root","","birthdaydb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $fname = mysqli_real_escape_string($conn, $_REQUEST['txtName']);

    $sql = "SELECT firstname, lastname, dateOfBirth,prefferedname,category FROM user WHERE firstname LIKE '%".$fname."%'";
    $result = $conn->query($sql);

    echo "<table border='1'>
    <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Preffered name</th>
    <th>Date of Birth</th>
    <th>Group</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['prefferedname'] . "</td>";
        echo "<td>" . $row['dateOfBirth'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";

        echo "</tr>";
    }
    echo "</table>";


    $conn->close();
?> 