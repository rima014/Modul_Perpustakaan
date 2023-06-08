<!-- <a href="?page=buku&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a> -->
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                DATA BUKU
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>ISBN</th>
                                <th>Jumlah Buku</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query('select * from tb_buku');
                            while ($data = $sql->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['pengarang']; ?></td>
                                    <td><?php echo $data['penerbit']; ?></td>
                                    <td><?php echo $data['isbn']; ?></td>
                                    <td><?php echo $data['jumlah_buku']; ?></td>
                                    <td>
                                        <a href="?page=buku&aksi=ubah&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>Update</a></a>
                                        <a onclick="return confirm('Anda yakin akan menghapus data ini ....??')" href="?page=buku&aksi=hapus&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <a href="?page=buku&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px; margin-top:8px;"><i class="fa fa-plus"></i>Tambah Data</a>
                <a href="./laporan/laporan_buku_exel.php" target="blank" class="btn btn-default"  style="margin-bottom: 5px; margin-top:8px;">
                <i class="fa fa-print"></i>ExportToExel</a>
            </div>
        </div>
    </div>
</div>