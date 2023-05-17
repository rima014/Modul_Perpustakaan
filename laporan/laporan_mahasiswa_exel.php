<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli('localhost', 'root', '', 'modul-perpustakaan');

$filename = 'mahasiswa_exel-('.date('d,m,Y').').xls';

header("content-disposition: attachment; filename='$filename'");
header('content-type: application/vdn.ms-exel');

?>
<h2> Laporan Anggota</h2>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>No Hp</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Program Studi</th>
    </tr>
    <?php
        $no = 1;
$sql = $koneksi->query('select * from tb_mahasiswa');
while ($data = $sql->fetch_assoc()) {
    $jk = ($data['jk'] == 'L') ? 'Laki-Laki' : 'Wanita';
    $prodi = ($data['prodi'] == 'ti') ? 'Teknik Informatika' : 'Ilmu Kesehatan Masyarakat ';

    ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['no_hp']; ?></td>
                <td><?php echo $data['tempat_lahir']; ?></td>
                <td><?php echo $data['tgl_lahir']; ?></td>
                <td><?php echo $data['jk']; ?></td>
                <td><?php echo $data['prodi']; ?></td>
            </tr>
        <?php }
?>
</table>

