<html>
    <head>
        <title>Hello World</title>
    </head>
    <body>
        <?php
            //assign nilai ke variabel
            $a = 15;
            // echo 'Variabel a berisi : '.$a.'<br />';
            $a = 'Pemrograman Web dan Internet';
            echo 'Variabel a berisi : '.$a.'<br />';

        //variabel lokal
            // Define a function
            function diskon( ){
                $harga = 1000;
                $harga = 0.2 * $harga;
            }
            $harga = 2000;
            diskon();

            echo 'harga = '.$harga.'<br />';

        //variabel global
            // Define a function
            function diskon1( ){
                // Define harga as a global variable
                global $harga;
                // Multiple harga by 0.8
                $harga = 0.8 * $harga;
            }
            // Set harga
            $harga = 2000;
            // Call the function
            diskon1( );
            // Display the age
            echo 'harga = '.$harga.'<br />';

        //variabel statik
            // Define the function
            function diskon2( ){
                // Define harga as a static variable
                static $harga = 1000;
                $harga = 0.8 * $harga;
                echo 'harga = '.$harga.'<br />';
            }
            // Set harga to 2000
            $harga = 30;
            // Call the function twice
            diskon2();
            diskon2();
            // Display the harga
            echo 'harga = '.$harga.'<br />';

        //variabel super global
            echo htmlentities($_SERVER["PHP_SELF"]);
            // echo '<br />'
        //konstanta
            define("PWI", "Permograman Web dan Internet ");
            echo 'Hari ini sedang praktikum '.PWI.'<br />';

            $constant_name = "PWI";
            echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';

            //konstanta bawaan PHP
            echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'.
            __LINE__ .'"<br />';

            //file menampilkan file saat ini
            //line untuk codingan dibaris berapa
            ?>
        
    </body>
</html>