<?php
$id_transaksi = $_GET['id_transaksi'];
$judul = $_GET['judul'];
$lambat = $_GET['lambat'];
$tgl_kembali = $_GET['tgl_kembali'];

if ($lambat > 7) {
    ?>
    <script type="text/javascript">
        alert("Data Buku Tidak Bisa Diperpanjang,karena lebih dari 7 hari...Kembalikan dahulu kemudian pinjam kembali");
        window.location.href = "?page=transaksi";
    </script>
    <?php

} else {
    $pecah_tgl_kembali = explode('-', $tgl_kembali);
    $next_7_hari = mktime(0, 0, 0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0] + 7, $pecah_tgl_kembali[2]);
    $hari_next = date('d-m-Y', $next_7_hari);

    $sql = $koneksi->query("update tb_transaksi set tgl_kembali='$hari_next' where id_transaksi='$id_transaksi'");
    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Perpanjangan Berhasil");
            window.location.href = "?page=transaksi";
        </script>
    <?php

    } else {
        ?>
        <script type="text/javascript">
            alert("Perpanjangan Gagal");
            window.location.href = "?page=transaksi";
        </script>
<?php

    }
}
?>