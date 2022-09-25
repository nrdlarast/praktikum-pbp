<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Praktikum 3</title>
</head>
<body>
    <form method="POST" autocomplete="on" action="">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) echo $nama; ?>">
            <div class="error"><?php if(isset($error_nama)) echo $error_nama; ?></div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
            <div class="error"><?php if(isset($error_email)) echo $error_email; ?></div>
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
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria"<?php if(isset($jenis_kelamin) && $jenis_kelamin=="pria") echo "checked"; ?>>Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita"<?php if(isset($jenis_kelamin) && $jenis_kelamin=="wanita") echo "checked"; ?>>Wanita
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
    if (isset ($_POST ["submit"])){
        echo "<h3>Your Input:</h3>" ;
        echo 'Nama = '.$_POST['nama'].'<br />';
        echo 'Email = '.$_POST['email'].'<br />';
        echo 'Kota = '.$_POST['kota'].'<br />';
        echo 'Jenis Kelamin ='.$_POST['jenis_kelamin'].'<br />';
        $minat = $_POST['minat'];
        if (!empty ($minat)){
            echo 'Peminatan yang dipilih: ';
            foreach ($minat as $minat_item) {
                echo '<br>'.$minat_item;
            }
        }

    }
?>
</html>


                