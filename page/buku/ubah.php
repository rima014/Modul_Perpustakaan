<?php
$id_buku = @($_GET['id_buku']);
$sql = $koneksi->query("select * from tb_buku where id_buku='$id_buku'");
$tampil = $sql->fetch_assoc();

$tahun2 = $tampil['tahun_terbit'];
$lokasi = $tampil['lokasi'];
?>

<div class="panel panel-defaulf">
    <div class="panel-heading">
        Ubah Data
    </div>
    <div class="container col-md-12" style="margin-top: 20px">
        <form method="POST">
            <table class="table table-bordered">
                <tr>
                    <td>Judul</td>
                    <td><input name="judul" class="form-control" value="<?php echo $tampil["judul"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td><input name="pengarang" type="text" class="form-control" value="<?php echo $tampil["pengarang"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input name="penerbit" type="text" class="form-control" value="<?php echo $tampil["penerbit"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td>
                        <select name="tahun_terbit" class="form-control">
                            <?php
                            $tahun = date("Y");
                            for ($i = $tahun - 29; $i <= $tahun; $i++) {

                                if ($i == $tahun2) {
                                    echo '<option value="' . $i . '"selected>' . $i . '</option>';
                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }

                            ?>
                        </select>
                    <td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td><input name="isbn" type="text" class="form-control" value="<?php echo $tampil["isbn"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Jumlah Buku</td>
                    <td><input name="jumlah_buku" type="text" type="number" class="form-control" value="<?php echo $tampil["jumlah_buku"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>
                        <select name="lokasi" class="form-control">
                            <option value="rak1" <?php if ($lokasi == 'rak1') {
                                                        echo "selected";
                                                    } ?>>Rak 1</option>
                            <option value="rak2" <?php if ($lokasi == 'rak2') {
                                                        echo "selected";
                                                    } ?>>Rak 2</option>
                            <option value="rak3" <?php if ($lokasi == 'rak3') {
                                                        echo "selected";
                                                    } ?>>Rak 3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Input</td>
                    <td><input name="tgl_input" type="date" class="form-control" value="<?php echo $tampil["tgl_input"]; ?>" /></td>
                </tr>
            </table>
            <tr>
                <td>
                    <button type="submit" name="simpan" value="ubah" class="btn btn-success">Ubah Data</button>
                    <a href="page/buku/buku.php" class="btn btn-primary">Kembali</a>
                </td>
            </tr>
        </form>
    </div>
</div>

<!-- set database -->
<?php
$judul = @$_POST['judul'];
$pengarang = @$_POST['pengarang'];
$penerbit = @$_POST['penerbit'];
$tahunterbit = @$_POST['tahun_terbit'];
$isbn = @$_POST['isbn'];
$jumlahbuku = @$_POST['jumlah_buku'];
$lokasi = @$_POST['lokasi'];
$tglinput = @$_POST['tgl_input'];

$simpan = @$_POST['simpan'];

if ($simpan) {
    $sql = $koneksi->query("update tb_buku set judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahunterbit', isbn='$isbn', jumlah_buku='$jumlahbuku', lokasi='$lokasi', tgl_input='$tglinput' where id_buku='$id_buku'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah");
            window.location.href = "?page=buku";
        </script>
<?php
    }
}
?>