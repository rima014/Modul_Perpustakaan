<div class="panel panel-defaulf">
    <div class="panel-heading">
        Tambah Data
    </div>
    <div class="container col-md-12" style="margin-top: 20px">
        <form method="POST">
            <table class="table table-bordered">
                <tr>
                    <td>Nim</td>
                    <td><input name="nim" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input name="nama" type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td><input name="no_hp" type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td><input name="tempat_lahir" type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input name="tgl_lahir" type="date" class="form-control" /></td>
                </tr>
                <tr>
                    <td>
                        <label>Jenis Kelamin</label>

                    </td>
                    <td>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="L" name="jk"> Laki - Laki </inpu>
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="P" name="jk">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>
                        <select name="prodi" value="<?php echo $tb_mahasiswa['prodi']; ?>" class="form-control">
                            <option value="ti">Teknik Informatika</option>
                            <option value="ikm">Ilmu Kesehatan Masyrakat</option>
                            <option value="si">sistem informasi</option>
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
    $sql = $koneksi->query("insert into tb_mahasiswa (nim, nama, no_hp, tempat_lahir, tgl_lahir, jk, prodi)
    values('$nim','$nama','$no_hp','$tempat_lahir','$tgl_lahir','$jk','$prodi')");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href = "?page=mahasiswa";
        </script>
<?php
    }
}
?>