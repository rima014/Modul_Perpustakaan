<?php
$nim = @$_GET['nim'];
$koneksi->query("delete from tb_mahasiswa where nim='$nim'");
?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus");
    window.location.href = "?page=mahasiswa";
</script>