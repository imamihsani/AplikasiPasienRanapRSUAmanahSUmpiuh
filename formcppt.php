<!DOCTYPE html>

<!--/DI BAWAH INI LOGIKA UNTUK KONEKSI DB & LOGIN-->
    <?php 
        include "session.php";
        // session_start(); //untuk konfigurasi notif alert (jangan diaktifkan, tidak cocok untuk penggunaan session yang login karena bisa bentur)
        include "connection.php";
        date_default_timezone_set('Asia/Jakarta'); //setting date format Jakarta/GMT +7
        error_reporting(0); //hidden galat yang tidak berpengaruh
    ?>
<!--/DI ATAS INI LOGIKA UNTUK KONEKSI DB & LOGIN-->

<!--/DIBUNGKUS DALAM FORMAT HTML-->
    <html lang="en">
        <head>
            <!--/DI BAWAH INI LINK, FRAMEWORK, LIBRARY, TITLE, FONT, SERTA ICON PENDUKUNG-->
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Form CPPT | RSU Amanah Sumpiuh</title>
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
                <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
                <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
                <link rel="icon" href="aset/logo.jpg" type="image/icon type">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display&display=swap" rel="stylesheet">
                <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

                <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
            <!--/DI ATAS INI LINK, FRAMEWORK, LIBRARY, TITLE, FONT, SERTA ICON PENDUKUNG-->

            <!--/DI BAWAH INI UNTUK DISABLE HISTORY INPUT-->
                <script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, null, null, null, null, null, null, null, null, null, null, null, null, window.location.href)
                    }   //skrip di atas untuk menghilangkan history inputan ketika refresh halaman sehingga tidak menimbulkan duplikat data yang diinput
                </script>
            <!--/DI ATAS INI UNTUK DISABLE HISTORY INPUT-->

            <!--/DI BAWAH INI UNTUK KUSTOMISASI TAMPILAN DATATABLE-->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#DataTable').DataTable( {
                            order: [[0, 'desc']],
                            "lengthMenu": [10],
                            "bLengthChange": false,
                            "bInfo": false,
                            "pageLength": 10,
                            "oLanguage": {
                                "sSearch": "Pencarian :"
                                }
                            // dom: 'Bfrtip',
                            // buttons: ['copy', 'excel', 'pdf', 'print']
                        } );} );
                </script>
            <!--/DI ATAS INI UNTUK KUSTOMISASI TAMPILAN DATATABLE-->
            
            <!--/DI BAWAH INI UNTUK FUNGSI PENCARIAN DATA DARI DB & TB.-->
                <!-- <script>
                $( function() {
                    $( "#nama_pegawai" ).autocomplete({ //function untuk pencarian autocomplete combobox data dari dataabase
                    source: "caritenagamedis.php" //terhubung dengan file caritenagamedis.php
                    });
                } );
                </script> -->
            <!--/DI ATAS INI UNTUK FUNGSI PENCARIAN DATA DARI DB & TB.-->

            <!--/DI BAWAH INI UNTUK SETTING FONT YANG DIPAKAI-->
                <style>
                    body{
                        font-family: 'Wix Madefor Display', sans-serif;
                    }
                </style>
            <!--/DI ATAS INI UNTUK SETTING FONT YANG DIPAKAI-->
        </head>

        <body>
            <!--/DI BAWAH INI PEMBUNGKUS LAMAN ISI CPPT-->
                <div class="container-fluid">
                    <!--/DI BAWAH INI NAVBAR TOP-->
                        <nav class="navbar mb-2 fixed-top justify-content-center" style="background-color:#3B71CA">
                            <h5 class="justify-content-center text-light">Form CPPT</h5>
                        </nav>
                    <!--/DI ATAS INI NAVBAR TOP-->
                    
                    <!--/DI BAWAH INI LOGIKA UNTUK MENAMPILKAN PENCARIAN-->
                        <?php 
                            if(isset($_GET['NOMOR'])){
                                $NOMOR= $_GET['NOMOR'];
                            }
                            else {
                                die ("Error. Nggak ada nomor kunjungan yang dipilih.");    
                            }
                            include "connection.php";
                            $query=mysqli_query($connection, "SELECT * FROM RSIAkunjunganPasienRanap WHERE NOMOR='$NOMOR'");
                            $result=mysqli_fetch_array($query);
                        ?>
                    <!--/DI ATAS INI LOGIKA UNTUK MENAMPILKAN PENCARIAN-->

                    <!--/DI BAWAH INI BODY UTAMA LAMAN FORM ISI CPPT-->
                        <div class="card mt-5">
                            <div class="card-body">
                                <button type="button" class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalriwayatcppt<?php echo $result['NOMOR']?>">
                                <i class="fa fa-sticky-note"></i> Riwayat CPPT
                                </button>
                                <button type="button" class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalriwayatlab<?php echo $result['NOMOR']?>">
                                <i class="fa fa-flask"></i> Riwayat Lab.
                                </button>
                                <button type="button" class="btn btn-dark btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalriwayatrad<?php echo $result['NOMOR']?>">
                                <i class="fa-solid fa-circle-radiation"></i> Riwayat Rad.
                                </button>
                                <div class="card" style="border:none">
                                <div class="row">
                                    <div class="col-3">
                                        <p>Nomor</p>
                                        <p>Nama</p>
                                    </div>
                                    <div class="col-9">
                                        <p>: <?php echo $result['NOMOR']?></p>
                                        <p>: <?php echo $result['NAMA']?></p>
                                    </div>
                                </div>
                            <!--/DI BAWAH INI FORMULIR INPUT CPPT-->
                                <form method="post">
                                    <div class="row">
                                            <input type="hidden" name="ID" class="form-control" autocomplete="off">
                                            <input type="hidden" name="KUNJUNGAN" class="form-control" autocomplete="off" value="<?php echo $result['NOMOR']?>">
                                            <?php
                                                include "connection.php";
                                                $tampilpengguna = mysqli_query($connection4, "SELECT * FROM RSUPengguna WHERE Username='$_SESSION[Username]'");
                                                $pengguna = mysqli_fetch_array($tampilpengguna);
                                            ?>
                                        <!--/DI BAWAH INI UNTUK MENAMPILKAN NOTIF BERHASIL INPUT DATA PAKAI ALERT-->
                                            <div class="card" style="border:none;">
                                                <?php
                                                    //if(isset($_SESSION['Nginput'])):
                                                ?>
                                                    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong><?php //echo $_SESSION['Nginput'];?></strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div> -->
                                                <?php 
                                                    //session_destroy();
                                                    //endif;
                                                ?>
                                            </div>
                                        <!--/DI ATAS INI UNTUK MENAMPILKAN NOTIF BERHASIL INPUT DATA PAKAI ALERT-->
                                        <div class="col-4">
                                            <label>Profesi</label>
                                            <input type="text" name="JENIS" class="form-control" autocomplete="off" required readonly value="<?php echo $pengguna['Nama_PPA']?>">
                                        </div>
                                        <div class="col-4">
                                            <label>Tenaga</label>
                                            <input type="text" name="TENAGA_MEDIS" id="nama_pegawai" class="form-control" autocomplete="off" required readonly value="<?php echo $pengguna['ID_PPA']?>">
                                        </div>
                                        <input type="hidden" name="OLEH" value="<?php echo $pengguna['ID']?>">
                                        <input type="hidden" name="STATUS" value="1">
                                        <div class="col-4">    
                                            <label>Waktu</label>
                                            <input type="datetime" name="TANGGAL" class="form-control" autocomplete="off" required readonly value="<?php echo date('Y-m-d H:i:s')?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Subjective</label>
                                            <textarea type="text" name="SUBYEKTIF" class="form-control" autocomplete="off"></textarea>
                                        </div>
                                        <div class="col-6">
                                            <label>Objective</label>
                                            <textarea type="text" name="OBYEKTIF" class="form-control" autocomplete="off"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Asesmen</label>
                                            <textarea type="text" name="ASSESMENT" class="form-control" autocomplete="off"></textarea>
                                        </div>
                                        <div class="col-6">
                                            <label>Planning</label>
                                            <textarea type="text" name="PLANNING" class="form-control" autocomplete="off"></textarea>
                                        </div>
                                    </div>
                                    <label>Instruksi</label>
                                    <textarea type="text" name="INSTRUKSI" class="form-control" autocomplete="off"></textarea>
                                    <button class="btn btn-sm mt-2 float-end btn-success" type="submit" name="kirimcppt"><i class="fa fa-save"></i> Kirim</button>
                                </form>
                            <!--/DI ATAS INI FORMULIR INPUT CPPT-->
                        </div>
                    <!--/DI ATAS INI BODY UTAMA LAMAN FORM ISI CPPT-->

                    <!--/DI BAWAH INI GROUP MODAL RIWAYAT CPPT, LAB, & RAD.-->
                        <div class="card-body">
                                <!------------------------------------AWAL MODAL RIWAYAT CPPT------------------------------------------------------->
                                    <div class="modal fade" id="exampleModalriwayatcppt<?php echo $result['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa fa-history"></i> Riwayat Ranap Pasien</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            <table class="table table-bordered table-stripped table-responsive nowrap">
                                                <tbody>
                                                <p>Pasien <?php echo $result['NAMA']?></p>
                                                <?php  
                                                include "connection.php";
                                                $NOPEN = $result['NOPEN'];
                                                $NOMOR = $result['NOMOR'];
                                                $ambildatakunjungan = mysqli_query($connection2, "CALL medicalrecord.CetakCPPT('$NOPEN','$NOMOR')");
                                                if (mysqli_num_rows($ambildatakunjungan) === 0){
                                                    echo '<div class="card mb-1">
                                                    <div class="card-body">
                                                        <p class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tidak ada data</p>
                                                    </div>
                                                    </div>';
                                                } else {
                                                while ($tampildatakunjungan = mysqli_fetch_array($ambildatakunjungan)) {
                                                ?>
                                                    <tr>
                                                        <div class="card mb-1" style="background-color:#f7f5bc">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <p><b>Tgl.</b></p>
                                                                        <p style="White-space: pre-wrap;"><b>PPA</b></p>
                                                                        <!-- <p style="White-space: pre-line;">Cttn.</p> -->
                                                                        
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <p>: <?php echo $tampildatakunjungan['TANGGAL']?></p>
                                                                        <p style="White-space: pre-wrap;">: <?php echo $tampildatakunjungan['PPA']?></p>
                                                                    </div>
                                                                    <div class="card">
                                                                        <b>Catatan :</b>
                                                                        <p style="White-space: pre-line;"><?php echo $tampildatakunjungan['CATATAN']?></p>
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
                                            
                                            </div>
                                        </div>
                                    </div>
                                <!--/---------------------------------AKHIR MODAL RIWAYAT CPPT------------------------------------------------------>

                                <!--/---------------------------------AWAL MODAL LAB & MODAL RIWAYAT LAB------------------------------------------------------>
                                    <div class="modal fade" id="exampleModalriwayatlab<?php echo $result['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel"><i class="fa fa-flask"></i> Riwayat Lab. Pasien</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            <table class="table table-bordered table-stripped table-responsive nowrap">
                                                <tbody>
                                                <p>Pasien <?php echo $result['NAMA']?></p>
                                                <?php  
                                                include "connection.php";
                                                // $NOPEN = $result['NOPEN'];
                                                $NOMOR = $result['NOMOR'];
                                                $ambildatakunjunganlab = mysqli_query($connection, "SELECT * FROM RSIAkunjunganPasienRanapOrderLab WHERE NOMOR_KUNJUNGAN = '$NOMOR' ORDER BY TGL_ORDER_LAB DESC");
                                                if (mysqli_num_rows($ambildatakunjunganlab) === 0){
                                                    echo '<div class="card mb-1">
                                                    <div class="card-body">
                                                        <p class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tidak ada data</p>
                                                    </div>
                                                    </div>';
                                                } else {
                                                while ($tampildatakunjunganlab = mysqli_fetch_array($ambildatakunjunganlab)) {
                                                ?>
                                                    <tr>
                                                        <div class="card mb-1" style="background-color:#d9f1ff">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <!-- <p>No. Kunjungan</p>  -->
                                                                        <p><b>Tgl.</b></p>  
                                                                        <p><b>Order</b></p>
                                                                        <!-- <p>Diagnosa</p>  -->
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <!-- <p>: <?php echo $tampildatakunjunganlab['NOMOR_KUNJUNGAN']?></p> -->
                                                                        <p>: <?php echo $tampildatakunjunganlab['TGL_ORDER_LAB']?></p>
                                                                        <p>: <?php echo $tampildatakunjunganlab['ORDER_LAB']?></p>
                                                                    </div>
                                                                    <div class="card">
                                                                        <b>Diagnosa :</b>
                                                                        <p><?php echo $tampildatakunjunganlab['ALASAN']?></p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-primary float-end mt-1" data-bs-toggle="modal" data-bs-target="#exampleModallabdetail<?php echo $result['NOMOR']?>">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                <?php } ?>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="exampleModallabdetail<?php echo $result['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Riwayat Lab. Pasien</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Pasien <?php echo $result['NAMA']?></p>
                                                    <?php
                                                        include "connection.php";
                                                        $ORDER_LAB = $tampildatakunjunganlab['ORDER_LAB'];
                                                        $ambildatakunjunganlabdetail = mysqli_query($connection, "SELECT * FROM RSIAkunjunganPasienRanapOrderLabDetail WHERE NOMOR_ORDER = '$ORDER_LAB' ORDER BY TANGGAL DESC");
                                                        if (mysqli_num_rows($ambildatakunjunganlabdetail) === 0){
                                                            echo '<div class="card mb-1">
                                                            <div class="card-body">
                                                                <p class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tidak ada data</p>
                                                            </div>
                                                            </div>';
                                                        } else {
                                                        while ($tampildatakunjunganlabdetail = mysqli_fetch_array($ambildatakunjunganlabdetail)) {
                                                    ?>
                                                        <div class="card mb-1" style="background-color:#d9f1ff">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <!-- <p>No. Kunjungan</p>  -->
                                                                        <p><b>Tgl.</b></p>  
                                                                        <p><b>Order</b></p>
                                                                        <p><b>Group</b></p>  
                                                                        <p><b>Parameter</b></p>
                                                                        <p><b>Hasil</b></p>  
                                                                        <p><b>Nilai</b></p>
                                                                        <p><b>Satuan</b></p>
                                                                        <!-- <p>Diagnosa</p>  -->
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <!-- <p>: <?php echo $tampildatakunjunganlabdetail['NOMOR_KUNJUNGAN']?></p> -->
                                                                        <p>: <?php echo $tampildatakunjunganlabdetail['TANGGAL']?></p>
                                                                        <p>: <?php echo $tampildatakunjunganlabdetail['NOMOR_ORDER']?></p>
                                                                        <p>: <?php echo $tampildatakunjunganlabdetail['GROUP_LABORAT']?></p>
                                                                        <p>: <?php echo $tampildatakunjunganlabdetail['PARAMETER']?></p>
                                                                        <p>: <?php echo $tampildatakunjunganlabdetail['HASIL']?></p>
                                                                        <p>: <?php echo $tampildatakunjunganlabdetail['NILAI_NORMAL']?></p>
                                                                        <p>: <?php echo $tampildatakunjunganlabdetail['SATUAN']?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-sm btn-primary float-start mt-1">
                                                                <i class="fa fa-arrow-left"></i> Kembali
                                                            </button>
                                                        </div>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!--/---------------------------------AKHIR MODAL LAB & MODAL RIWAYAT LAB----------------------------------------------------->

                                <!------------------------------------AWAL MODAL RADIOLOGI & MODAL RIWAYAT RADIOLOGI------------------------------------------>
                                    <div class="modal fade" id="exampleModalriwayatrad<?php echo $result['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header bg-dark">
                                                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel"><i class="fa fa-flask"></i> Riwayat Rad. Pasien</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            <table class="table table-bordered table-stripped table-responsive nowrap">
                                                <tbody>
                                                <p>Pasien <?php echo $result['NAMA']?></p>
                                                <?php  
                                                include "connection.php";
                                                // $NOPEN = $result['NOPEN'];
                                                $NOMOR = $result['NOMOR'];
                                                $ambildatakunjunganrad = mysqli_query($connection, "SELECT * FROM RSIAkunjunganPasienRanapOrderRad WHERE NOMOR_KUNJUNGAN = '$NOMOR' ORDER BY TGL_ORDER_RAD DESC");
                                                if (mysqli_num_rows($ambildatakunjunganrad) === 0){
                                                    echo '<div class="card mb-1">
                                                    <div class="card-body">
                                                        <p class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tidak ada data</p>
                                                    </div>
                                                    </div>';
                                                } else {
                                                while ($tampildatakunjunganrad = mysqli_fetch_array($ambildatakunjunganrad)) {
                                                ?>
                                                    <tr>
                                                        <div class="card mb-1" style="background-color:#cccccc">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <!-- <p>No. Kunjungan</p>  -->
                                                                        <p><b>Tgl.</b></p>  
                                                                        <p><b>Order</b></p>
                                                                        <!-- <p>Diagnosa</p>  -->
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <!-- <p>: <?php echo $tampildatakunjunganrad['NOMOR_KUNJUNGAN']?></p> -->
                                                                        <p>: <?php echo $tampildatakunjunganrad['TGL_ORDER_RAD']?></p>
                                                                        <p>: <?php echo $tampildatakunjunganrad['ORDER_RAD']?></p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-dark float-end mt-1" data-bs-toggle="modal" data-bs-target="#exampleModalraddetail<?php echo $result['NOMOR']?>">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                <?php } ?>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="exampleModalraddetail<?php echo $result['NOMOR']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Detail Riwayat Rad. Pasien</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Pasien <?php echo $result['NAMA']?></p>
                                                    <?php
                                                        include "connection.php";
                                                        $NOMOR_KUNJUNGAN = $result['NOMOR'];
                                                        $ambildatakunjunganraddetail = mysqli_query($connection, "SELECT * FROM RSIAkunjunganPasienRanapOrderRadDetail WHERE NOMOR_KUNJUNGAN = '$NOMOR_KUNJUNGAN' ORDER BY TGL_HASIL DESC");
                                                        if (mysqli_num_rows($ambildatakunjunganraddetail) === 0){
                                                            echo '<div class="card mb-1">
                                                            <div class="card-body">
                                                                <p class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tidak ada data</p>
                                                            </div>
                                                            </div>';
                                                        } else {
                                                        while ($tampildatakunjunganraddetail = mysqli_fetch_array($ambildatakunjunganraddetail)) {
                                                    ?>
                                                        <div class="card mb-1" style="background-color:#cccccc">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <!-- <p>No. Kunjungan</p>  -->
                                                                        <p><b>Tgl.</b></p>  
                                                                        <p><b>Tindakan</b></p>
                                                                        <!-- <p>Diagnosa</p>  -->
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <!-- <p>: <?php echo $tampildatakunjunganlabdetail['NOMOR_KUNJUNGAN']?></p> -->
                                                                        <p>: <?php echo $tampildatakunjunganraddetail['TGL_HASIL']?></p>
                                                                        <p>: <?php echo $tampildatakunjunganraddetail['NAMA_TINDAKAN']?></p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- <div>
                                                            <button class="btn btn-sm btn-dark float-start mt-1" data-bs-target="exampleModalriwayatrad<?php echo $result['NOMOR']?>" data-bs-toggle="modal">
                                                                <i class="fa fa-arrow-left"></i> Kembali
                                                            </button>
                                                        </div> -->
                                                    <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!--/---------------------------------AKHIR MODAL RADIOLOGI & MODAL RIWAYAT RADIOLOGI----------------------------------------->
                        </div>
                    <!--/DI BAWAH INI GROUP MODAL RIWAYAT CPPT, LAB, & RAD.-->

                    <!--/DI BAWAH INI BOTTOM NAVBAR-->
                        <nav class="navbar fixed-bottom" style="background-color:#3B71CA">
                            <div class=" container-fluid justify-content-center mb-2 mt-2">
                                <center><a href="index.php" style="text-decoration:none;"><button class="btn btn-sm-1 btn-success btn-block"><i class="fa fa-users"></i> Daftar List Pasien Ranap</button></a></center>
                            </div>
                        </nav>
                    <!--/DI ATAS INI BOTTOM NAVBAR-->
                </div>
            <!--/DI ATAS INI PEMBUNGKUS LAMAN ISI CPPT-->
        </body>
    </html>
<!--/DIBUNGKUS DALAM FORMAT HTML-->

<!--/DI BAWAH INI LOGIKA UNTUK INPUT CPPT-->
    <?php
        include "connection.php";
        $ID = $_POST['ID'];
        $KUNJUNGAN = $_POST['KUNJUNGAN'];
        $TANGGAL = $_POST['TANGGAL'];
        $SUBYEKTIF = $_POST['SUBYEKTIF'];
        $OBYEKTIF = $_POST['OBYEKTIF'];
        $ASSESMENT = $_POST['ASSESMENT'];
        $PLANNING = $_POST['PLANNING'];
        $INSTRUKSI = $_POST['INSTRUKSI'];
        $JENIS = $_POST['JENIS'];
        $TENAGA_MEDIS = $_POST['TENAGA_MEDIS'];
        $OLEH = $_POST['OLEH'];
        $STATUS = $_POST['STATUS'];

        $kirimdatacppt = "INSERT INTO medicalrecord.cppt set ID ='$ID', KUNJUNGAN = '$KUNJUNGAN', TANGGAL = '$TANGGAL', 
        SUBYEKTIF = '$SUBYEKTIF', OBYEKTIF = '$OBYEKTIF', ASSESMENT = '$ASSESMENT', 
        PLANNING = '$PLANNING', INSTRUKSI = '$INSTRUKSI', 
        JENIS = '$JENIS', TENAGA_MEDIS = '$TENAGA_MEDIS', 
        OLEH = '$OLEH', STATUS = '$STATUS'";

        if (isset($_POST['kirimcppt'])){
            $berhasil = mysqli_query($connection2, $kirimdatacppt);
            if ($berhasil){
            ?>

            <!--/DI BAWAH INI SWEETALERT UNTUK MENAMPILKAN NOTIF SETELAH INPUT-->
                <script>
                    swal({
                    title: "Success",
                    text: "Data berhasil diinput!",
                    icon: "success",
                    }).then(function() {
                    window.location.href = document.referrer;
                    });
                </script>
            <!--/DI ATAS INI SWEETALERT UNTUK MENAMPILKAN NOTIF SETELAH INPUT-->

            <?php
            exit; // Menghentikan eksekusi kode PHP setelah mengarahkan ulang halaman
            }
        }
    ?>
<!--/DI ATAS INI LOGIKA UNTUK INPUT CPPT-->