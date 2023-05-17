<?php
$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$kembali = date("d-m-Y", $tujuh_hari);
?>
<div class="panel panel-defaulf">
    <div class="panel-heading">
        Tambah Data
    </div>
    <div class="container col-md-12" style="margin-top: 20px">
        <form method="POST">
            <table class="table table-bordered">

                <tr>
                    <td>Judul</td>
                    <td>
                        <select name="buku" class="form-control">
                            <?php
                            $sql = $koneksi->query('select * from tb_buku order by id_buku');
                            while ($data = $sql->fetch_assoc()) {
                                echo "<option value='$data[id_buku].$data[judul]'>$data[judul]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>
                        <select name="nama" class="form-control">
                            <?php
                            $sql = $koneksi->query('select * from tb_mahasiswa order by nim');
                            while ($data = $sql->fetch_assoc()) {
                                echo "<option value='$data[nim].$data[nama]'>$data[nim].$data[nama]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Tanggal Pinjam</td>
                    <td><input name="tgl_pinjam" type="text" id="id_transaksi" class="form-control" value="<?php echo $tgl_pinjam; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Tanggal Kembali</td>
                    <td><input name="tgl_kembali" type="text" id="id_transaksi" class="form-control" value="<?php echo $kembali; ?>" readonly /></td>
                </tr>

            </table>
            <tr>
                <td>
                    <button type="submit" name="simpan" value="simpan" class="btn btn-success">Simpan Data</button>
                    <a href="page/transaksi/transaksi.php" class="btn btn-primary">Kembali</a>
                </td>
            </tr>
        </form>
    </div>
</div>

<?php

if (isset($_POST['simpan'])) {
    $tgl_kembali = $_POST['tgl_kembali'];
    $tgl_pinjam = $_POST['tgl_pinjam'];

    $buku = $_POST['buku'];
    $pecah_buku = explode(".", $buku);
    $id_buku = $pecah_buku[0];
    $judul = $pecah_buku[1];


    $nama = $_POST['nama'];
    $pecah_nama = explode(".", $nama);
    $nim = $pecah_nama[0];
    $nama = $pecah_nama[1];

    $sql = $koneksi->query("select * from tb_buku where judul = '$judul'");
    while ($data = $sql->fetch_assoc()) {
        $sisa = $data['jumlah_buku'];
        if ($sisa == 0) {
?>
            <script type="text/javascript">
                alert("Stok Buku Habis, Transaksi Tidak Dapat dilakukan, Silakan Tambah buku Terlebih Dahulu");
                window.location.href = "?page=transaksi&aksi=tambah";
            </script>
        <?php
        } else {
            $sql = $koneksi->query("insert into tb_transaksi(judul, nim, nama, tgl_pinjam, tgl_kembali ,status)
            values('$judul','$nim','$nama','$tgl_pinjam','$tgl_kembali','pinjam')");

            $sql2 = $koneksi->query("update tb_buku set jumlah_buku=(jumlah_buku-1)where id_buku='$id_buku'");
        ?>
            <script type="text/javascript">
                alert("Simpan Data Berhasil");
                window.location.href = "?page=transaksi";
            </script>
<?php

        }
    };
}
?>