<!DOCTYPE html>
<?php
    ob_start();
    session_start();
    echo password_hash('1234',PASSWORD_BCRYPT);
    include "connection.php";
?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register CPPT | RSU Amanah Sumpiuh</title>
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
        <link rel="icon" href="aset/logo.jpg" type="image/icon type">
        <script type="text/javascript">
            $(document).ready(function() {
                $('#DataTable').DataTable( {
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excel', 'pdf', 'print']
                } );} );
        </script>

    </head>

    <body>
        <style>
            body{
                background-image: url("aset/");
                background-size: cover;
                background-repeat: no-repeat, repeat;
                background-position:center;
                height:940px;
            }
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 mt-5">
                    <div class="card shadow">
                        <div class="card-body">
                            
                            <center><img src="aset/regist.jpg" style="max-width:250px;max-height:250px;" class=""></center>
                            <h4 class="text-center">Register CPPT</h4>
                            <hr>
                            <form method="post" action="proses.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="LOGIN" autocomplete="off" required>
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="PASSWORD" autocomplete="off" required>
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="NAMA" autocomplete="off" required>
                                        <label>NIP</label>
                                        <input type="text" class="form-control" name="NIP" autocomplete="off">
                                    </div>
                                    <div class="col-6">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="NIK" autocomplete="off">
                                        <label>Jenis</label>
                                        <input type="text" class="form-control" name="JENIS" autocomplete="off">
                                        <label>Lock App</label>
                                        <input type="text" class="form-control" name="LOCK_APP" autocomplete="off">
                                        <label>Status</label>
                                        <input type="text" class="form-control" name="STATUS" autocomplete="off">
                                    </div>
                                </div>
                                <!-- <center><a href="https://api.whatsapp.com/send?phone=6281290231840&text=Permisi,%20Saya%20lupa%20password%20aplikasi%20CPPT%20saya,%20mohon%20dikirimkan%20password%20baru.%20Terimakasih." target="_blank" class="mt-3">Lupa kata sandi?</a></center> -->
                                <marquee class="text-danger"><b>RSU Amanah Sumpiuh, Banyumas, Jawa Tengah - Aplikasi Catatan Perkembangan Pasien Terintegrasi</b></marquee>
                                <button class="btn btn-warning mt-3 float-end" name="REGISTER" type="submit"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Daftar</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
