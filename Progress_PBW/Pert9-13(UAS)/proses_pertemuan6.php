<?php

    include "koneksi.php";

        // Menampilkan data inputan
        $nama_mhs = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $perulangan = $_POST['ulangi'];

        $proses = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama_mahasiswa, prodi) VALUES ('".$nama_mhs."','
                        ".$prodi."')")
        or die(mysqli_error($koneksi));

        if($proses){
            echo "
                <script>
                    alert('Data Berhasil Disimpan');
                    window.location.href='pertemuan6.php';    
                </script>";
        }else echo"
        
                <script>
                
                    alert('Data Gagal Disimpan');
                
                </script>"     
?>