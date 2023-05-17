<?php
$koneksi = new mysqli('localhost', 'root', '', 'modul-perpustakaan');
?>
<h3><marquee>Selamat Datang Dihalaman Utama Aplikasi Perpustakaan UNIMA</marquee></h3>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">  
                        <!-- <h2>Welcome Back Admin/User,<?php echo $_SESSION['nama']; ?></h5> -->
                    </div>
                </div>              
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <!-- <i class="fa fa-envelope-o"></i> -->
                    <i class="fa fa-users"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">12</p>
                    <p class="text-muted">jumlah Mahasiswa</p>
                </div>
            </div>
		    </div>
                <div class="col-md-4 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <!-- <i class="fa fa-bars"></i> -->
                    <i class="fa fa-book"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">40</p>
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
                    <p class="main-text">3</p>
                    <p class="text-muted">transaksi</p>
                </div>
             </div>
		     </div>