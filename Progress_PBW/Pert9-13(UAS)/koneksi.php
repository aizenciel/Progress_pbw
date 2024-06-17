<?php

    $hostname = "localhost"; 
    $userDataBase = "root";
    $password = "";
    $dataBaseName = "pemrograman_web";

    // Membuat koneksi ke database
    $koneksi = mysqli_connect($hostname, $userDataBase, $password, $dataBaseName) or die(mysqli_error($koneksi));;

    // Cek koneksi
    //if (!$koneksi) {
        //die("Koneksi gagal: " . mysqli_connect_error());
    //} else {
        //echo "Berhasil koneksi";
//}

    // Menutup koneksi
    //mysqli_close($koneksi);
?>