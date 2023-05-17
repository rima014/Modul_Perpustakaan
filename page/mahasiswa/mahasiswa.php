
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
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query('select * from tb_mahasiswa');
                            while ($data = $sql->fetch_assoc()) {
                                $jk = ($data['jk'] == 'l') ? 'Laki-Laki' : 'Wanita';
                                $jk = ($data['prodi'] == 'ti') ? 'Teknik Informatika' : 'Ilmu Kesehatan ';

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
                                    <td>
                                        <a href="?page=mahasiswa&aksi=ubah&nim=<?php echo $data['nim']; ?>" class="btn btn-info">Ubah</a>
                                        <a onclick="return confirm('Anda yakin akan menghapus data ini ....??')" href="?page=mahasiswa&aksi=hapus&nim=<?php echo $data['nim']; ?>" class="btn btn-danger">delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <a href="?page=mahasiswa&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px; margin-top:8px;"><i class="fa fa-plus"></i>Tambah Data</a>
                <a href="./laporan/laporan_mahasiswa_exel.php" target="blank" class="btn btn-default"  style="margin-bottom: 5px; margin-top:8px;">
                <i class="fa fa-print"></i>ExportToExel</a>
                <!-- <a href="./laporan/laporan_mahasiswa_pdf.php" target="blank" class="btn btn-default"  style="margin-bottom: 5px; margin-top:8px;">
                <i class="fa fa-print"></i>ExportToPdf</a> -->
            </div>
        </div>
    </div>
</div>