<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Praktikum 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <form>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="kota">Kota/ Kabupaten:</label>
            <select id="kota" name="kota" class="fom-control">
                <option value="Semarang">Semarang</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Bandung">Bandung</option>
                <option value="Surabaya">Surabaya</option>
            </select>
        </div>
        <label>Jenis Kelamin:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
            </label>
        </div>
        <br>
        <label>Peminatan:</label>
        <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
        </label>
        </div>
        <div class="form-check" >
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name= "minat[]" value="ux_design">UX Design
        </label>
        </div>
        <div class="form-check">
        <label class=" form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
        </label>
        </div>
        <br>
        <!--submit, reset dan button -->
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit
        </button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
</body>

<?php 
    if (isset ($_GET ["submit"])){
        echo "<h3>Your Input:</h3>" ;
        echo 'Nama = '.$_GET['nama'].'<br />';
        echo 'Email = '.$_GET['email'].'<br />';
        echo 'Kota = '.$_GET['kota'].'<br />';
        echo 'Jenis Kelamin ='.$_GET['jenis_kelamin'].'<br />';
        $minat = $_GET['minat'];
        if (!empty ($minat)){
            echo 'Peminatan yang dipilih: ';
            foreach ($minat as $minat_item) {
                echo '>'.$minat_item;
            }
        }

    }
?>
</html>


                