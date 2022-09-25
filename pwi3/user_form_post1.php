<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_form_post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if (isset($_POST['submit'])){
            //validasi nama : tidak boleh kosong, hanya dapat berisi huruf dan spasi
            $nama = test_input($_POST['nama']);
            if (empty($nama)){
                $error_nama = "Nama harus diisi";
            }
            elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)){
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }

            //validasi email : tidak boleh kosong, format harus benar
            $email = test_input($_POST['email']);
            if ($email == ''){
                $error_email = "Email harus diisi";
            }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error_email = "Format email tidak benar";
            }

            //validasi alamat : tidak boleh kosong
            $alamat = test_input($_POST['alamat']);
            if ($alamat == ''){
                $error_alamat = "Alamat harus diisi";
            }

            //validasi jenis kelamin : tidak boleh kosong
            // $jenis_kelamin = $_POST['jenis_kelamin'];
            // if ($jenis_kelamin == ''){
            //     $error_jenis_kelamin = "Jenis kelamin harus diisi";
            // }
            if(isset($_POST['jenis_kelamin'])){
                if ($_POST['jenis_kelamin'] == ''){
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }
            }
            
            //validasi kota : tidak boleh kosong
            $kota = $_POST['kota'];
            if ($kota == '' || $kota == 'kota'){
                $error_kota = "Kota harus diisi";
            }

            //validasi minat : tidak boleh kosong
            if(isset($_POST['minat'])){
                if (empty($minat)){
                    $error_minat = "Peminatan harus dipilih";
                }
            }
            // $minat = $_POST['minat'];
            // if (empty($minat)){
            //     $error_minat = "Peminatan harus dipilih";
            // }
            

        }

        
    ?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Mahasiswa

            </div>
        <div class="panel-body">
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
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat">
            <?php if(isset($alamat)) echo $alamat; ?>
            </textarea>
            <div class="error"><?php if(isset($error_alamat)) echo $error_alamat; ?></div>
        </div>
        <div class="form-group">
            <label for="kota">Kota/ Kabupaten:</label>
            <select id="kota" name="kota" class="fom-control">
                <option value="Semarang" <?php if(isset($kota) && $kota=="Semarang") echo'selected="true"';?>>Semarang</option>
                <option value="Jakarta" <?php if(isset($kota) && $kota=="Jakarta") echo'selected="true"';?>>Jakarta</option>
                <option value="Bandung" <?php if(isset($kota) && $kota=="Bandung") echo'selected="true"';?>>Bandung</option>
                <option value="Surabaya" <?php if(isset($kota) && $kota=="Surabaya") echo'selected="true"';?>>Surabaya</option>
            </select>
        </div>
        <label>Jenis Kelamin:</label>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria"
            <?php if(isset($jenis_kelamin) && $jenis_kelamin=="pria") echo "checked"; ?>>Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita"
            <?php if(isset($jenis_kelamin) && $jenis_kelamin=="wanita") echo "checked"; ?>>Wanita
            </label>
        </div>
        <br>
        <label>Peminatan:</label>
        <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="coding"
            <?php if(isset($minat) && in_array('coding', $minat)) echo'checked'; ?>>Coding
        </label>
        </div>
        <div class="form-check" >
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name= "minat[]" value="ux_design"
            <?php if(isset($minat) && in_array('ux_design', $minat)) echo'checked'; ?>>UX Design
        </label>
        </div>
        <div class="form-check">
        <label class=" form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="data_science"
            <?php if(isset($minat) && in_array('data_science', $minat)) echo'checked'; ?>>Data Science
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
        echo "<h3>Your Input:<br /></h3>" ;
        echo 'Nama = '.$_POST['nama'].'<br />';
        echo 'Email = '.$_POST['email'].'<br />';
        echo 'Kota = '.$_POST['kota'].'<br />';
        if(isset($_POST['jenis_kelamin'])){
            echo 'Jenis Kelamin ='.$_POST['jenis_kelamin'].'<br />';
        }
        
        if(isset($_POST['minat'])){
            $minat = $_POST['minat'];
        if (!empty ($minat)){
            echo 'Peminatan yang dipilih: ';
            foreach ($minat as $minat_item) {
                echo '<br>'.$minat_item;
            }
        }
        }
        

    }
?>
        </div>
        </div>
    </div>
        
</html>


                