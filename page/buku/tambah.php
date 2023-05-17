<div class="panel panel-defaulf">
    <div class="panel-heading">
        Tambah Data
    </div>
    <div class="container col-md-12" style="margin-top: 20px">
        <form method="POST">
            <table class="table table-bordered">
                <tr>
                    <td>Judul</td>
                    <td><input name="judul" type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td><input name="pengarang" type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input name="penerbit" type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td>
                        <select name="tahun_terbit" class="form-control">
                            <?php
                            $tahun = date("Y");
                            for ($i = $tahun - 29; $i <= $tahun; $i++) {
                                echo '
                                        <option value="' . $i . '">' . $i . '</option>
                                ';
                            }
                            ?>
                        </select>
                    <td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td><input name="isbn" type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Jumlah Buku</td>
                    <td><input name="jumlah_buku" type="text" type="number" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>
                        <select name="lokasi" class="form-control">
                            <option value="rak1">Rak 1</option>
                            <option value="rak2">Rak 2</option>
                            <option value="rak3">Rak 3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Input</td>
                    <td><input name="tgl_input" type="date" class="form-control" /></td>
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
    $sql = $koneksi->query("insert into tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi, tgl_input)
        values('$judul','$pengarang','$penerbit','$tahunterbit','$isbn','$jumlahbuku','$lokasi','$tglinput')");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href = "?page=buku";
        </script>
<?php
    }
}
?>