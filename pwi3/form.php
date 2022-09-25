<?php

  if (isset($_POST['submit'])) {
    if (!isset($_POST['jenis-kelamin'])) {
        $error_jenis_kelamin = "Jenis kelamin harus diisi";
    }
    if (!isset($_POST['kelas'])) {
        $error_kelas = "Kelas harus diisi";
      }
  }
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container">
      <!-- <h1>Form Input Mahasiswa</h1> -->
    <div class="card">
    <div class="card-header">Form Input Siswa</div> 
    <div class="card-body">
    <form action="" method="post" autocomplete="on">
      <div class="mb-3">
        <label for="nis" class="form-label">NIS:</label>
        <input type="number" class="form-control" id="nis" name="nis"pattern="[0-9]" onKeyPress="if(this.value.length==10) return false;" required>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
        <div class="invalid-feedback">
        Please enter name.
        </div>

      <label for="jenis-kelamin" class="form-label" >Jenis Kelamin:</label>
      <div class="form-check">
          <input class="form-check-input" name="jenis-kelamin" type="radio" value="pria" id="jenis-kelamin" <?php if (isset($_POST['jenis-kelamin']) && $_POST['jenis-kelamin'] == 'pria') echo 'checked' ?>>Pria
          <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
          </div>
      </div>

      <div class="form-check">
          <input class="form-check-input" name="jenis-kelamin" type="radio" value="wanita" id="jenis-kelamin" <?php if (isset($_POST['jenis-kelamin']) && $_POST['jenis-kelamin'] == 'wanita') echo 'checked' ?>>Wanita
          <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
          </div>
      </div>

      <label for="kelas" class="form-label">Kelas:</label>
      <select class="form-select" onchange="setEkstra()" id="kelas" name="kelas">
      <option value="" <?php if(!isset($_POST['kelas'])) echo 'selected' ?> disabled>-- Pilih Kelas --</option>
        <option value="X" <?php if (isset($_POST['kelas']) && ($_POST['kelas']== "X")) echo 'selected' ?>>X</option>
        <option value="XI" <?php if (isset($_POST['kelas']) && ($_POST['kelas']== "XI")) echo 'selected' ?>>XI</option>
        <option value="XII" <?php if (isset($_POST['kelas']) && ($_POST['kelas']== "XII")) echo 'selected' ?>>XII</option>
      </select>
      <div class="error text-danger"><?php if(isset($error_kelas)) echo $error_kelas;?></div>

      
      <div id="ekstra_container" <?php if((!isset($_POST['kelas'])) or (isset($_POST['kelas']) && $_POST['kelas'] != 'XII')) echo 'class="d-block"'; else echo 'class="d-none"' ?>>
        <label for="ekstrakulikuler" class="form-label">Ekstrakulikuler:</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Pramuka" name="ekstrakulikuler[]">
            <label class="form-check-label" for="ekstrakulikuler" >
              Pramuka
            </label>
            <div class="error text-danger"><?php if(isset($error_eskul)) echo $error_eskul;?></div>
        </div>
          
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Seni Tari"name="ekstrakulikuler[]">
            <label class="form-check-label" for="ekstrakulikuler" >
              Seni Tari
            </label>
            <div class="error text-danger"><?php if(isset($error_eskul)) echo $error_eskul;?></div>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Sinematografi" name="ekstrakulikuler[]">
            <label class="form-check-label" for="ekstrakulikuler" >
              Sinematografi
            </label>
            <div class="error text-danger"><?php if(isset($error_eskul)) echo $error_eskul;?></div>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Basket" name="ekstrakulikuler[]">
            <label class="form-check-label" for="ekstrakulikuler" >
              Basket
            </label>
            <div class="error text-danger"><?php if(isset($error_eskul)) echo $error_eskul;?></div>
        </div>
      </div>
      <br>
      <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
      <button type="reset" class="btn btn-danger" name="reset">Reset</button>
    </form>

    <br>

    <?php
      if (isset($_POST["submit"])&& isset($_POST["kelas"])) {
        if ($_POST["kelas"] == "X" || $_POST["kelas"] == "XI") {
            if(!isset($_POST["ekstrakulikuler"])){
                echo "<div class='alert alert-danger'>Minimal memilih 1 ekstrakurikuler</div>";
            }
            else if (count($_POST["ekstrakulikuler"]) > 3) {
                echo "<div class='alert alert-danger'>Maksimal memilih 3 ekstrakurikuler</div>";
            }
            elseif(isset($_POST["ekstrakulikuler"])){
                if (count($_POST["ekstrakulikuler"]) >= 1 || count($_POST["ekstrakulikuler"]) == 3) {
                    echo "<h3>Your Input</h3>";
                    echo 'NIS : ' . $_POST['nis'] . '<br />';
                    echo 'Nama : ' . $_POST['nama'] . '<br />';
                    echo 'Jenis Kelamin : ' . $_POST['jenis-kelamin'] . '<br />';
                    echo 'Kelas : ' . $_POST['kelas'] . '<br />';
                    
                    $ekstrakulikuler = $_POST['ekstrakulikuler'];
                    if(!empty($ekstrakulikuler)){
                        echo 'Ekstrakurikuler yang dipilih :';
                        foreach($ekstrakulikuler as $ekstrakulikuler_item){
                            echo '<br />' . $ekstrakulikuler_item;
                        }
                    }
                }
            }
            
        } else {
            if (!isset($_POST["ekstrakulikuler"])) {
                echo "<h3>Your Input</h3>";
                echo 'NIS : ' . $_POST['nis'] . '<br />';
                echo 'Nama : ' . $_POST['nama'] . '<br />';
                echo 'Jenis Kelamin : ' . $_POST['jenis-kelamin'] . '<br />';
                echo 'Kelas : ' . $_POST['kelas'] . '<br />';
        
            } else {
                echo "<div class='alert alert-danger'>Kelas XII tidak diperbolehkan mengikuti ekstrakurikuler</div>";
            }
        }
      }
    ?>
    
    </div>
    </div>
    <script>
      const setEkstra = () => {
        const kelas = document.getElementById('kelas').value;
        const ekstra_container = document.getElementById('ekstra_container');
        const checkbox = document.getElementsByClassName('form-check-input-eks');
        if (kelas != 'XII') {
            ekstra_container.classList.remove('d-none');
            ekstra_container.classList.add('d-block');
        }
        else {
            ekstra_container.classList.add('d-none');
            ekstra_container.classList.remove('d-block')
            for (let index = 0; index < checkbox.length; index++) {
                const element = checkbox[index];
                element.checked = false;
            }
        }

      }
  </script>
  </body>

</html>