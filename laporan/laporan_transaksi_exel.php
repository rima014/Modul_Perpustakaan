<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli('localhost', 'root', '', 'modul-perpustakaan');

// $filename = 'mahasiswa_exel-('.date('d,m,Y').').xls';

// header("content-disposition: attachment; filename='$filename'");
// header('content-type: application/vdn.ms-exel');

// fungsi header dengan mengirimkan raw data excel
header('Content-type: application/vnd-ms-excel');
// membuat nama file ekspor "data-anggota.xls"
header('Content-Disposition: attachment; filename=data-Transaksi.xls');

?>
<h2 class="text aling-center"> Laporan Transaksi</h2>

<table border="1">
    <tr>
        <th>No</th>
        <<th>Judul</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>status</th>
    </tr>
    <?php
        $no = 1;
$sql = $koneksi->query('select * from tb_transaksi');
while ($data = $sql->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['nim']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['tgl_pinjam']; ?></td>
            <td><?php echo $data['tgl_kembali']; ?></td>
            <td><?php echo $data['status']; ?></td>
        </tr>
    <?php }
?>
</table>

