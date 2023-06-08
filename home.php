<?php
$koneksi = new mysqli('localhost', 'root', '', 'modul-perpustakaan');
$get1 = mysqli_query($koneksi, 'SELECT * FROM tb_mahasiswa');
$count1 = mysqli_num_rows($get1);

$get2 = mysqli_query($koneksi, 'SELECT * FROM tb_buku');
$count2 = mysqli_num_rows($get2);

$get3 = mysqli_query($koneksi, 'SELECT * FROM tb_transaksi');
$count3 = mysqli_num_rows($get3);

$get4 = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status='pinjam'");
$count4 = mysqli_num_rows($get4);

$get5 = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status='kembali'");
$count5 = mysqli_num_rows($get5);

?>
<h3><marquee>Selamat Datang Dihalaman Utama Aplikasi Perpustakaan UNIMA</marquee></h3>
            <div id="page-inner">
                <!-- <div class="row">
                    <div class="col-md-12">  
                        <h2>Welcome Back Admin,<?php echo @$_SESSION['nama']; ?></h5>
                    </div>
                </div>               -->
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-users"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $count1; ?></p>
                    <p class="text-muted">jumlah Mahasiswa</p>
                </div>
            </div>
		    </div>
                <div class="col-md-4 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
    
                    <i class="fa fa-book"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $count2; ?></p>
                    <p class="text-muted">Jumlah Buku</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $count3; ?></p>
                    <p class="text-muted">transaksi</p>
                </div>
                <div class="text-box" >
                    <p class="main-text">Pinjam :<?php echo $count4; ?></p>
                    <p class="main-text">Kembali :<?php echo $count5; ?></p>
                  
                </div>
             </div>
		     </div>