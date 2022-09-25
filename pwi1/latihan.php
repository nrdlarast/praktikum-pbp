<html>
    <head>
        <title>Latihan</title>
    </head>
    <body>
        <?php
            $array_mhs = array('Abdul' => array(89,90,54),
                            'Budi' => array(78,60,64),
                            'Nina' => array(67,56,84),
                            'Budi' => array(87,69,50),
                            'Budi' => array(98,65,74),
                            );

            function print_mhs($array_mhs){
                echo '<table border="1">';
                echo '<tr>
                    <td>Nama</td>
                    <td>Nilai 1</td>
                    <td>Nilai 2</td>
                    <td>Nilai 3</td>
                    <td>Rata2</td>
                    </tr>';
                
                foreach($array_mhs as $mhs => $nilai){
                    echo '<tr>
                        <td>'.$mhs.'</td>
                        <td>'.$nilai[0].'</td>
                        <td>'.$nilai[1].'</td>
                        <td>'.$nilai[2].'</td>
                        <td>'.hitung_rata($nilai).'</td>
                        </tr>';
                }
                
            }

            function hitung_rata($array){
                return array_sum($array)/3;
            }

            print(print_mhs($array_mhs));

        ?>
        
    </body>
</html>