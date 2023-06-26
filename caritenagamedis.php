<?php
include "connection.php";
//LOGIKA PENCARIAN TENAGA MEDIS
    $term = trim(strip_tags($_GET['term'])); //wajib ada parameter $term untuk pencarian
    $query = mysqli_query($connection3, "SELECT * FROM pegawai WHERE NAMA LIKE '%$term%' LIMIT 10"); //menampilkan maksimal 10 data pegawai berdasarkan Nama yang disearch
    $array = array(); //tampilkan dalam bentuk array
    while($data = mysqli_fetch_assoc($query)){ //menampilkan looping data
        $row['value'] = $data['NAMA']; //tampilkan nama pegawai berdasar isian/value yang disearch
        array_push($array, $row); //tampilkan dalam bentuk array yang menurun membentuk row
    }
    echo json_encode($array); //wajib diaktifkan karena pencarian ini memerlukan encoding json
//
?>