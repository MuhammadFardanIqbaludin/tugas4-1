<?php
    // deve
    // $kon = mysqli_connect("localhost", "root",'toor',"akademik");
    
    // production
    $kon = mysqli_connect("localhost", "id8941132_admin",'123456',"id8941132_posyandu");

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal : " .mysqli_connect_error();
    }
?>