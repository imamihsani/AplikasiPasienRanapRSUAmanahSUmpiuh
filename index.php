<!DOCTYPE html>
<!--/SYNTAX WAJIB PHP-->
    <?php 
        include "session.php"; //session ini harus selalu dibawa untuk membawa sesi login username
        include "connection.php"; //koneksi ke database
        error_reporting(0); //menyembunyikan error yang tidak berpengaruh
        session_start(); //sesi awal mulainya halaman setelah login
    ?>
<!--/BATAS SYNTAX WAJIB PHP-->

<html lang="en">

<!--/HEAD UNTUK MENGHUBUNGKAN LIBRARY, ASET CSS, JS, FRAMEWORK, DATATABLE, JUDUL, IKON & FONT-->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List Pasien Ranap | RSU Amanah Sumpiuh</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="aset/logo.jpg" type="image/icon type">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display&display=swap" rel="stylesheet">
        <script type="text/javascript">
            $(document).ready(function() {
                $('#DataTable').DataTable( {
                    order: [[0, 'desc']], //pengurutan dari data yang masuk terbaru
                    "dom": 'lrtip', //ini untuk disable tombol search
                    "lengthMenu": [10],
                    "bLengthChange": false,
                    "bInfo": false,
                    "pageLength": 10,
                    "oLanguage": {
                        "sEmptyTable": "Pasien tidak ada, coba masukkan nama atau No. RM dengan benar", //untuk kustom notif kalau tidak ada data
                        "sSearch": "Pencarian :" //untuk kustom tulisan search
                        }
                    // dom: 'Bfrtip',
                    // buttons: ['copy', 'excel', 'pdf', 'print'] //untuk nampilin tombol pdf csv excel print
                } );} );
        </script>
        <style>
            body{
                font-family: 'Wix Madefor Display', sans-serif;
            }
        </style>
    </head>
<!--/BATAS HEAD UNTUK MENGHUBUNGKAN LIBRARY, ASET CSS, JS, FRAMEWORK, DATATABLE, JUDUL, IKON & FONT-->

<!--/BODY UTAMA LAMAN INDEX-->
    <body>
        <!--PEMBUNGKUS LAMAN INDEX-->
            <div class="container-fluid">
                <!--/NAVBAR FIXED TOP-->
                    <nav class="navbar fixed-top" style="background-color:#3B71CA">
                        <h5 class="float-left text-light text-center" style="padding-left:10px">Pasien Rawat Inap</h5>
                        <button type="button" style="margin-right:10px; border:none" class="btn float-right btn-outline-light btn-sm float-right justify-content-right" data-bs-toggle="modal" data-bs-target="#exampleModallogout">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </button>
                    </nav>
                <!--/BATAS NAVBAR FIXED TOP-->

                <!-- MODAL USER-->
                    <div class="modal fade" id="exampleModallogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h1 class="modal-title fs-5 text-light text-center" id="exampleModalLabel"><i class="fa fa-user" aria-hidden="true"></i> Profil</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- <p>Username : <?php echo $_SESSION['Username']?></p> -->
                                    <?php
                                        $tampilpengguna = mysqli_query($connection4, "SELECT * FROM RSUPengguna WHERE Username='$_SESSION[Username]'");
                                        $pengguna = mysqli_fetch_array($tampilpengguna);
                                    ?>
                                    <div class="row">
                                        <div class="col-4">
                                            <p style="White-space: pre-wrap;">Nama</p>
                                            <p style="White-space: pre-wrap;">Username</p>
                                            <p style="White-space: pre-wrap;">NIP</p>
                                            <!-- <p>Kode</p> -->
                                            <!-- <p>Jenis</p> -->
                                            <p style="White-space: pre-wrap;">Profesi</p>
                                        </div>
                                        <div class="col-8">
                                            <p>: <?php echo $pengguna['NAMA_MEDIS']?></p>
                                            <p>: <?php echo $pengguna['Username']?></p>
                                            <p>: <?php echo $pengguna['NIP']?></p>
                                            <!-- <p>: <?php echo $pengguna['ID_PPA']?></p> -->
                                            <!-- <p>: <?php echo $pengguna['Nama_PPA']?></p> -->
                                            <p>: <?php echo $pengguna['Desk_PPA']?></p>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> LogOut
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- MODAL KONFIRMASI LOGOUT -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title fs-5 text-light" id="exampleModalLabel"><i class="fa fa-sign-out" aria-hidden="true"></i> Anda yakin untuk keluar?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <center><img src="aset/logout.jpg" style="width:200px; height:150px;"></center>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Tidak</button>
                                            <a href="logout.php"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Ya</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- BATAS MODAL KONFIRMASI LOGOUT -->
                <!-- BATAS MODAL USER-->

                <!--PEMBUNGKUS SEARCH BAR DAN TABLE PASIEN RANAP-->   
                <div class="container-fluid mt-5">
                    <center>
                    <div class="card" style="border:none">
                        <div class="card-body">
                            <form method="get" action="index.php" class="">
                                <div class="input-group mb-2">
                                    <input type="text" style="border-color: black" class="form-control" autocomplete="off" placeholder="Cari Nama/No. RM Pasien" aria-label="Cari Pasien berdasarkan Nama atau No. RM" name="search" aria-describedby="button-addon2">
                                    <button style="border-color: black"  class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </center>
                    <?php
                    include "connection.php";
                    $search = mysqli_real_escape_string($connection, $_GET['search']);
                    $sql = "SELECT * FROM RSIAkunjunganPasienRanap WHERE NAMA LIKE '%$search%' OR NORM LIKE '%$search%'";
                    $result = mysqli_query($connection, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {?>
                        <?php } ?>
                        <?php } else { 
                        echo "Pasien tidak ada, coba masukkan nama atau No. RM dengan benar";?>  
                    <?php }
                    ?> 
                    <table class="table mt-5 table-responsive nowrap table-striped table-bordered" id="DataTable">
                    <thead>
                        <tr style="background-color:#3B71CA">
                            <th scope="col" style="width:10px" class="text-light">RM</th>
                            <th scope="col" class="text-light">Nama</th>
                            <th scope="col" class="text-light text-center">Form</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "connection.php";
                            $ambildatapasien = mysqli_query($connection, "SELECT * FROM RSIAkunjunganPasienRanap WHERE NAMA LIKE '%$search%' OR NORM LIKE '%$search%' ORDER BY MASUK DESC");
                            while ($tampildatapasien = mysqli_fetch_array($ambildatapasien)) {
                        ?>
                        <tr style="border-color: #0275d8">
                            <th><?php echo $tampildatapasien['NORM']?></th>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $tampildatapasien['NOMOR']?>">
                                <?php echo $tampildatapasien['NAMA']?>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $tampildatapasien['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel"><i class="fa fa-id-card-o" aria-hidden="true"></i> Data Umum Pasien</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <h5>Detail Pasien</h5> -->
                                        <div class="row">
                                            <div class="col-4">
                                                <p style="White-space: pre-wrap;">Nama Pasien</p>
                                                <p style="White-space: pre-wrap;">No. Kunjungan</p>
                                                <p style="White-space: pre-wrap;">No. Reg</p>
                                                <p style="White-space: pre-wrap;">No. RM</p>
                                                <p style="White-space: pre-wrap;">Ruangan</p>
                                                <p style="White-space: pre-wrap;">Pembayaran</p>
                                                <p style="White-space: pre-wrap;">Dokter</p>
                                                <p style="White-space: pre-wrap;">No. SEP</p>
                                                <p style="White-space: pre-wrap;">No. Konsul</p>
                                            </div>
                                            <div class="col-8">
                                                <p style="White-space: pre-wrap;">: <?php echo $tampildatapasien['NAMA']?></p>
                                                <p style="White-space: pre-wrap;">: <?php echo $tampildatapasien['NOMOR']?></p>
                                                <p style="White-space: pre-wrap;">: <?php echo $tampildatapasien['NOPEN']?></p>
                                                <p style="White-space: pre-wrap;">: <?php echo $tampildatapasien['NORM']?></p>
                                                <p style="White-space: pre-wrap;">: <?php echo $tampildatapasien['DESKRIPSI']?></p>
                                                <p style="White-space: pre-wrap;">: <?php echo $tampildatapasien['PENJAMIN']?></p>
                                                <p style="White-space: pre-wrap;">: <?php echo $tampildatapasien['NAMA_DOKTER']?></p>
                                                <p style="White-space: pre-wrap;">: <?php echo $tampildatapasien['NO_SEP']?></p>
                                                <p style="White-space: pre-wrap;">: <?php echo $tampildatapasien['NO_KONSUL']?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalpemeriksaan<?php echo $tampildatapasien['NOMOR']?>">
                                        <i class="fa fa-list"></i> Pemeriksaan Pasien
                                        </button>
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModallaborat<?php echo $tampildatapasien['NOMOR']?>">
                                        <i class="fa fa-flask" aria-hidden="true"></i> Hasil Laborat
                                        </button>
                                        <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalradiologi<?php echo $tampildatapasien['NOMOR']?>">
                                        <i class="fa-solid fa-circle-radiation"></i> Hasil Radiologi
                                        </button>
                                    
                                    </div>
                                    </div>  
                                </div>
                                </div>
                                        <?php 
                                            include "connection.php";
                                            $NOMOR = $tampildatapasien['NOMOR'];
                                            $ambildatapemeriksaan = mysqli_query($connection, "SELECT * FROM RSIAkunjunganPasienRanapDetail WHERE NOMOR = '$NOMOR' ORDER BY MASUK DESC");
                                            while ($tampildatapemeriksaan = mysqli_fetch_array($ambildatapemeriksaan)) {
                                        ?>
                                        <div class="modal fade" id="exampleModalpemeriksaan<?php echo $tampildatapemeriksaan['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel"><i class="fa fa-list"></i> Pemeriksaan Pasien</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- <p>Pasien :<?php echo $tampildatapemeriksaan['PASIEN']?></p>
                                                <p>Tempat Tidur :<?php echo $tampildatapemeriksaan['TEMPAT_TIDUR']?></p>
                                                <p>Penjamin :<?php echo $tampildatapemeriksaan['PENJAMIN']?></p>
                                                <p>Pasien :<?php echo $tampildatapemeriksaan['NAMA_DOKTER']?></p>
                                                <p>Pasien :<?php echo $tampildatapemeriksaan['PEMERIKSAAN_FISIK']?></p> -->
                                                <div class="row">
                                                    <div class="alert alert-success" role="alert">
                                                        <p style="White-space: pre-wrap;"><?php echo $tampildatapemeriksaan['PASIEN']?></p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>Bed</p>
                                                        <p>Penjamin</p>
                                                        <p>Dokter</p>
                                                        <p>Pemr. Fisik</p>
                                                        <p>Penl. Fisik</p>
                                                        <p>Diagnosis</p>
                                                        <p>Terapi</p>
                                                        <p>Keadaan Umum</p>
                                                        <p>Kesadaran</p>
                                                        <p>Tingkat Sadar</p>
                                                        <p>TTV</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>: <?php echo $tampildatapemeriksaan['TEMPAT_TIDUR']?></p>
                                                        <p>: <?php echo $tampildatapemeriksaan['PENJAMIN']?></p>
                                                        <p style="White-space: pre-wrap;">: <?php echo $tampildatapemeriksaan['NAMA_DOKTER']?></p>
                                                        <p>: <?php echo $tampildatapemeriksaan['PEMERIKSAAN_FISIK']?></p>
                                                        <p>: <?php echo $tampildatapemeriksaan['PENILAIAN_FISIK']?></p>
                                                        <p>: <?php echo $tampildatapemeriksaan['DIAGNOSIS']?></p>
                                                        <p>: <?php echo $tampildatapemeriksaan['PERENCANAAN_TERAPI']?></p>
                                                        <p>: <?php echo $tampildatapemeriksaan['KEADAAN_UMUM']?></p>
                                                        <p>: <?php echo $tampildatapemeriksaan['KESADARAN']?></p>
                                                        <p>: <?php echo $tampildatapemeriksaan['TINGKAT_KESADARAN']?></p>
                                                        <p style="White-space: pre-wrap;">: <?php echo $tampildatapemeriksaan['TTV']?></p>
                                                    </div>
                                                    </div>
                                                        <button class="btn btn-success btn-sm float-left" data-bs-target="#exampleModal<?php echo $tampildatapasien['NOMOR']?>" data-bs-toggle="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <?php } ?>

                                        <div class="modal fade" id="exampleModallaborat<?php echo $tampildatapasien['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa fa-flask" aria-hidden="true"></i> Hasil Laborat</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Pasien <?php echo $tampildatapasien['NAMA'] ?></p>
                                                    <div class="tab-content mb-2" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="home-tab-pane<?php echo $tampildatapasien['NOMOR']?>" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                            <!-- <p><?php echo $tampildatapasien['NAMA']?></p>
                                                            <p><?php echo $tampildatapasien['NOMOR']?></p> -->
                                                            <table class="table table-responsive table-striped table-bordered">
                                                                
                                                                <tbody>
                                                                    <?php
                                                                        include "connection.php";
                                                                        $NOMOR = $tampildatapasien['NOMOR'];
                                                                        $ambildatariwayatlabpasien = mysqli_query($connection, "SELECT * FROM ERM_RSIA.RSIAkunjunganPasienRanapOrderLab WHERE NOMOR_KUNJUNGAN='$NOMOR'");
                                                                        if (mysqli_num_rows($ambildatariwayatlabpasien) === 0){
                                                                            echo '<div class="card mb-1">
                                                                            <div class="card-body">
                                                                                <p class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tidak ada data</p>
                                                                            </div>
                                                                            </div>';
                                                                        } else {
                                                                        while ($tampildatariwayatlabpasien = mysqli_fetch_array($ambildatariwayatlabpasien)) {
                                                                    ?>
                                                                    <tr>
                                                                        <div class="card mb-1">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        <p>Kunjungan</p>
                                                                                        <p>Tgl. Order</p>
                                                                                        <p>Diagnosa</p>
                                                                                        <p>No. Order</p>
                                                                                    </div>
                                                                                    <div class="col-9">
                                                                                        <p>:<?php echo $tampildatariwayatlabpasien['NOMOR_KUNJUNGAN'];?></p>
                                                                                        <p>:<?php echo $tampildatariwayatlabpasien['TGL_ORDER_LAB'];?></p>
                                                                                        <p>:<?php echo $tampildatariwayatlabpasien['ALASAN'];?></p>
                                                                                        <p>:<?php echo $tampildatariwayatlabpasien['ORDER_LAB'];?></p>
                                                                                        <div>
                                                                                            <button type="button" class="btn btn-sm btn-info float-end" data-bs-toggle="modal" data-bs-target="#exampleModallabdetil<?php echo $tampildatapasien['NOMOR']?>">
                                                                                                    <i class="fa fa-info-circle"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                            </div>
                                                                        </div> 
                                                                    </tr>
                                                                    <?php } ?>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- <div class="tab-pane fade" id="profile-tab-pane<?php echo $tampildatapasien['NOMOR']?>" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">B</div>
                                                        <div class="tab-pane fade" id="contact-tab-pane<?php echo $tampildatapasien['NOMOR']?>" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">C</div> -->
                                                    </div>
                                                        <button class="btn btn-info btn-sm float-left" data-bs-target="#exampleModal<?php echo $tampildatapasien['NOMOR']?>" data-bs-toggle="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="exampleModalradiologi<?php echo $tampildatapasien['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel"><i class="fa-solid fa-circle-radiation"></i> Hasil Radiologi</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Pasien <?php echo $tampildatapasien['NAMA'];?></p>
                                                    <?php 
                                                        include "connection.php";
                                                        $NOMOR = $tampildatapasien['NOMOR'];
                                                        $ambildataradiologi = mysqli_query($connection, "SELECT * FROM RSIAkunjunganPasienRanapOrderRad WHERE NOMOR_KUNJUNGAN = '$NOMOR' ORDER BY TGL_ORDER_RAD DESC");
                                                        if (mysqli_num_rows($ambildataradiologi) === 0){
                                                            echo'<div class="card mb-1">
                                                            <div class="card-body">
                                                                <p class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tidak ada data</p>
                                                            </div>
                                                            </div>';
                                                        } else {
                                                        while ($tampildataradiologi = mysqli_fetch_array($ambildataradiologi)) {
                                                    ?>
                                                    
                                                    <div class="card mb-1">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <p>Tgl. Order</p>
                                                                    <p>No. Order Rad.</p>
                                                                </div>
                                                                <div class="col-9">
                                                                    <p>: <?php echo $tampildataradiologi['TGL_ORDER_RAD']?></p>
                                                                    <p>: <?php echo $tampildataradiologi['ORDER_RAD']?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php } ?>
                                                    <button class="btn btn-dark btn-sm float-left" data-bs-target="#exampleModal<?php echo $tampildatapasien['NOMOR']?>" data-bs-toggle="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
                                                </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                            </td>
                            <td class="justify-content-center"><center><a href="formcppt.php?NOMOR=<?=$tampildatapasien['NOMOR']?>"><button class="btn btn-warning btn-sm"><i class="fa fa-list"></i></button></a></center> </td>
                        </tr>

                        <!--MODAL DETIL LAB-->
                                                                        <div class="modal fade" id="exampleModallabdetil<?php echo $tampildatapasien['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            
                                                                            <div class="modal-dialog modal-xl">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-info">
                                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa fa-info-circle"></i> Detail Pasien Laborat</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                
                                                                                    <div class="modal-body">
                                                                                        
                                                                                            <?php 
                                                                                                    include "connection.php";
                                                                                                    $NOMOR_ORDER = $tampildatariwayatlabpasien['ORDER_LAB'];
                                                                                                    $ambildatariwayatlabpasiendetil = mysqli_query($connection, "SELECT * FROM RSIAkunjunganPasienRanapOrderLabDetail WHERE NOMOR_ORDER = '$NOMOR_ORDER'");
                                                                                                    if (mysqli_num_rows($ambildatariwayatlabpasiendetil) === 0) {
                                                                                                        echo '<div class="card mb-1">
                                                                                                                <div class="card-body">
                                                                                                                    <p class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tidak ada data</p>
                                                                                                                </div>
                                                                                                            </div>';
                                                                                                    } else {
                                                                                                        while ($tampildatariwayatlabpasiendetil = mysqli_fetch_array($ambildatariwayatlabpasiendetil)) {
                                                                                                            echo '<div class="card">
                                                                                                                    <div class="card-body">
                                                                                                                        <p>No. Order : ' . $tampildatariwayatlabpasiendetil['NOMOR_ORDER'] . '</p>    
                                                                                                                        <p>Group : </p>
                                                                                                                        <p>Parameter : </p>    
                                                                                                                        <p>Hasil : </p>  
                                                                                                                        <p>Nilai : </p>    
                                                                                                                        <p>Satuan: </p>                                  
                                                                                                                    </div>
                                                                                                                </div>';
                                                                                                        }
                                                                                                    }                      
                                                                                            ?>
                                                                                        
                                                                                        <button type="button" class="btn btn-info btn-sm float-left" data-bs-target="#exampleModallaborat<?php echo $tampildatapasien['NOMOR']?>" data-bs-toggle="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
                <!--AKHIR PEMBUNGKUS SEARCH BAR DAN TABLE PASIEN RANAP-->

                <!--NAVBAR FIXED BOTTOM-->
                    <nav class="navbar fixed-bottom" style="background-color:#3B71CA">
                        <div class=" container-fluid justify-content-center mb-2 mt-2">
                            <center><a href="index.php"><button class="btn btn-sm-1 active btn-success  btn-block"><i class="fa fa-users"></i> Daftar List Pasien Ranap</button></a></center>  
                        </div>
                    </nav>
                <!--AKHIR NAVBAR FIXED BOTTOM-->
            </div>
        <!--PEMBUNGKUS LAMAN INDEX-->
    </body>
<!--/BATAS BODY UTAMA LAMAN INDEX-->

</html>