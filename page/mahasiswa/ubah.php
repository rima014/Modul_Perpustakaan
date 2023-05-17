<?php
$nim = @($_GET['nim']);
$sql = $koneksi->query("select * from tb_mahasiswa where nim='$nim'");
$tampil = $sql->fetch_assoc();

$jkl = $tampil['jk'];
$prodi = $tampil['prodi'];
// $jrs = $tampil['prodi'];
// $mahasiswa = $tampil['prodi'];

// $tahun2 = $tampil['tahun_terbit'];
// $lokasi = $tampil['lokasi'];
?>
<div class="panel panel-defaulf">
    <div class="panel-heading b">
        Ubah Data
    </div>
    <div class="container col-md-12" style="margin-top: 20px">
        <form method="POST">
            <table class="table table-bordered">
                <tr>
                    <td>Nim</td>
                    <td><input name="nim" class="form-control" value="<?php echo  $tampil["nim"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input name="nama" type="text" class="form-control" value="<?php echo  $tampil["nama"]; ?>" /></td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td><input name="no_hp" type="text" class="form-control" value="<?php echo  $tampil["no_hp"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td><input name="tempat_lahir" type="text" class="form-control" value="<?php echo  $tampil["tempat_lahir"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input name="tgl_lahir" type="date" class="form-control" value="<?php echo  $tampil["tgl_lahir"]; ?>" /></td>
                </tr>
                <tr>
                    <td>
                        <label>Jenis Kelamin</label>

                    </td>
                    <td>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="L" name="jk" <?php echo ($jkl == "L") ? "checked" : ""; ?> /> Laki - Laki
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="P" name="jk" <?php echo ($jkl == "P") ? "checked" : ""; ?> /> Perempuan
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>
                        <select name="prodi" class="form-control">
                            <option value="ti" <?php if ($prodi == 'ti') {
                                                    echo "selected";
                                                } ?>>Teknik Informatika</option>
                            <option value="ikm" <?php if ($prodi == 'ikm') {
                                                    echo "selected";
                                                } ?>>Ilmu Kesehatan Masyrakat</option>
                            <option value="si" <?php if ($prodi == 'si') {
                                                    echo "selected";
                                                } ?>>Sistem Informasi</option>
                        </select>
                    </td>
                </tr>

            </table>
            <tr>
                <td>
                    <button type="submit" name="simpan" value="simpan" class="btn btn-success">Simpan Data</button>
                    <a href="page/buku/buku.php" class="btn btn-primary">Kembali</a>
                </td>
            </tr>
        </form>
    </div>
</div>

<?php
$nim = @$_POST['nim'];
$nama = @$_POST['nama'];
$no_hp = @$_POST['no_hp'];
$tempat_lahir = @$_POST['tempat_lahir'];
$tgl_lahir = @$_POST['tgl_lahir'];
$jk = @$_POST['jk'];
$prodi = @$_POST['prodi'];

$simpan = @$_POST['simpan'];

if ($simpan) {
    $sql = $koneksi->query("update tb_mahasiswa set nama='$nama',no_hp='$no_hp',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',jk='$jk',prodi='$prodi' where nim='$nim'");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah");
            window.location.href = "?page=mahasiswa";
        </script>
<?php
    }
}
?>