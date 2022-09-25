<?php
// Include our login information
require_once('../pwi4/db_login.php');
$query = "SELECT * FROM books";
$result = $db -> query($query);
if (!$result){
    die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="card">
        <div class="card-header">Books Data</div>
        <div class="card-body">
        <br>
        <a class="btn btn-primary"href="add_books.php">+ Add Book</a>
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>'.$row->isbn.'</td>';
                echo '<td>' .$row->author.'</td>';
                echo '<td>' .$row->title.'</td>';
                echo '<td>' .$row->price.'</td>';
                echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id='.$row->isbn.'">Add to Cart</a></td>';
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
        </div>
    </div>
</body>
</html>