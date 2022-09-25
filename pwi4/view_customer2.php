<?php

session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Customers Data</div>
            <div class="card-body">

            <br>

            <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data</a> <br><br>
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>

                <?php
                // Include our login information
                require_once('../pwi4/db_login.php');
                // execute the query
                $query = "SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY customerid";
                $result = $db -> query($query);
                if (!$result){
                    die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
                }

                // Fetch and display the results
                $i = 1;
                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<td>' .$i. '</td>';
                    echo '<td>' .$row->Nama. '</td>';
                    echo '<td>' .$row->Alamat. '</td>';
                    echo '<td>' .$row->Kota. '</td>';
                    echo '<td> <a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->ID.'">Edit</a>&nbsp;&nbsp;
                            <a class="btn btn-danger btn-sm" href="delete_customer.php?id=' . $row ->ID.'" onclick="return confirm()" >Delete</a> </td>';
                    echo '</tr>';
                    $i++;
                }
                    echo '</table>';
                    echo '<br />';
                    echo 'Total Rows = '.$result->num_rows;
                    $result->free();
                    $db->close();

                ?>

            </table>
            <br>
            <a class="btn btn-danger float-end" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    
</body>
</html>
