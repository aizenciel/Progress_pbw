<?php 
    $namaMahasiswa = "Muhammad Rizqi Fadhilah";
    $namaSaya = "Qilah";
    $jenisKelamin = NULL;

    if ($namaMahasiswa == "Rizqi") {
        $jenisKelamin = "Laki-laki";
    } else {
        $jenisKelamin = "Perempuan";
    }
    echo $namaMahasiswa . " Selamat datang, <br>saya " . $namaSaya;
?>

<html>
    <body>
        <h1>Ini adalah <?php echo $namaMahasiswa ?></h1>
        <h2>Saya adalah <?php echo $jenisKelamin ?></h2>
    </body>
</html>