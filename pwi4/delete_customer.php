<?php

require_once 'db_login.php';

$id = $_GET['id'];
function hapus($data){
    global $db;
    $query = "DELETE FROM customers WHERE customerid = $data";
    $result = $db -> query($query);
    return mysqli_affected_rows($db);
}

if(hapus($id)>0){
    echo "
        <script>
        alert('Data berhasil dihapus');
        document.location.href='view_customer2.php';
        </script>
    ";
} else{
    echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href='view_customer2.php';
        </script>
    ";
}

?>