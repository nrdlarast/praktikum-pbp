<?php
//File : login.php
//Deskripsi : menampilkan form login dan melakukan login ke halaman admin.php

session_start(); //inisialisasi session
    if(isset($_SESSION['login']))
    {
        header('Location: view_customer2.php');
        exit;
    }
require_once('../pwi4/db_login.php');

// cek apakah user sudah submit form
if (isset($_POST["submit"])) {
    $valid = TRUE; //flag validasi
    //cek validasi email
    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "Email is required";
        $valid = FALSE;
    } elseif (!filter_var ($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Invalid email format";
        $valid = FALSE;
    }

    //cek validasi password
    $password = test_input ($_POST['password']);
    if ($password == ''){
        $error_password = "Password is required";
        $valid = FALSE;
    }

    //cek validasi
    if ($valid) {
        //Asign a query
        $query = "SELECT * FROM admin WHERE email='". $email."'AND password='".($password)."' ";
        // Execute the query 
        $result = $db->query($query );
        if (!$result) {
            die ("Could not query the database: <br />". $db->error);
        } else {
            if ($result->num_rows > 0){ //login berhasil
                $_SESSION['username'] = $email;
                // header('Location: admin.php');
                $_SESSION["login"] = TRUE;
                header('Location: view_customer2.php');
                exit;
            } else{ //login gagal
                echo '<span class="error">Combination of username and password are not correct.</span>';
            }
        }
        //close db connection
        $db->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<br>
<div class="card">
    <div class="card-header">Login Form</div>
    <div class="card-body">
    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"])?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" size="30" value ="">
            <div class="error"><?php if (isset($error_email)) echo $error_email;?></div>
        </div>
        <br>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="">
            <div class="error"><?php if(isset($error_password)) echo $error_password; ?></div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
    </form>
    </div>
    </div>

</body>
</html>
    