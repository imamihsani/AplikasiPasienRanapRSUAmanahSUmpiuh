<?php
//MENAMAI VARIABEL UNTUK PROSES LOGIN/TAMBAH PENGGUNA BARU
  include "connection.php";
  $ID = $_POST['ID'];
  $LOGIN = $_POST['LOGIN'];
  $PASSWORD = $_POST['PASSWORD'];
  $NAMA = $_POST['NAMA'];
  $NIP = $_POST['NIP'];
  $NIK = $_POST['NIK'];
  $JENIS = $_POST['JENIS'];
  $LOCK_APP = $_POST['LOCK_APP'];
  $STATUS = $_POST['STATUS'];
//
//LOGIKA REGISTER USER BARU  
  if (isset($_POST['REGISTER'])){ //jika tombol REGISTER diklik, maka...
      mysqli_query($connection4, "INSERT INTO aplikasi.pengguna set ID ='$ID', LOGIN = '$LOGIN', PASSWORD = '$PASSWORD', 
      NAMA = '$NAMA', NIP = '$NIP', NIK = '$NIK', 
      JENIS = '$JENIS', LOCK_APP = '$LOCK_APP', STATUS = '$STATUS'"); //...masukkan data2 yang diinput dalam kolom inputan ke db aplikasi tabel/view pengguna
    }
    header("Location: ".$_SERVER['HTTP_REFERER']); //ketika berhasil menambah pengguna baru, maka tetap arahkan kembali ke laman yg sama (HTTP REFERER)
//


  