<?php

require_once('../pwi4/db_login.php');

function tambahData($data){
    global $db;
    $name = htmlspecialchars($data["name"]);
    $address = htmlspecialchars($data["address"]);
    $city = htmlspecialchars($data["city"]);
    
    $query = "INSERT INTO customers
            VALUES (
                '','$name','$address','$city'
            )";
    // mysqli_query($db,$query)
    $result = $db -> query($query);
    return mysqli_affected_rows($db);
}

if (isset($_POST['submit'])){
    $valid = TRUE; //flag validasi
    $name = test_input ($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE; 
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed"; 
        $valid = FALSE;
    }
    $address = test_input ($_POST['address']); 
    if ($address == ''){
        $error_address = "Address is required";
        $valid = FALSE;
    }
    $city = $_POST['city'];
    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }

    if($valid){
        if(tambahData($_POST)>0){
            echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href='view_customer2.php';
            </script>";
        } else{
            echo "data gagal ditambahkan";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="container-fluid">
    <div class="card"> 
            <div class="card-header">Add Customers Data</div>

            <div class="card-body">
                <form method="POST" autocomplete="on" action="">
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="error"><?php if(isset($error_name)) echo $error_name;?></div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address: </label>
                        <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                        <div class="error"><?php if (isset($error_address)) echo $error_address;?></div>
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <select name="city" id="city" class="form-control" required>
                            <option value="none" <?php if (!isset($city)) echo 'selected="true"'; ?>> --Select a city--</option>
                            <option value="Airport West" <?php if (isset($city) && $city=="Airport West") echo 'selected="true"'; ?>>Airport West</option>
                            <option value="Box Hill" <?php if (isset($city) && $city=="Box Hill") echo 'selected="true"'; ?>>Box Hill</option>
                            <option value="Yarraville" <?php if (isset($city) && $city=="Yarraville") echo'selected="true"'; ?>>Yarraville</option>
                            </select>
                        <div class="error"><?php if (isset($error_city)) echo $error_city;?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="view_customer2.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php
$db->close();
?>