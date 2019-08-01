<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="margin-bottom:10px;">Data Anggota</h4>
                        <p class="category"></p>
                        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari buku.." style="margin-top:6px;"> -->
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table id="myTable" class="table table-hover table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Program Studi</th>
                                <th>Nomor Handphone</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>

                                <?php

                                    $no = 1;

                                    $sql = $koneksi->query("select * from tb_anggota");

                                    while ($data=$sql->fetch_assoc()){

                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nim']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['tempat_lahir']; ?></td>
                                    <td><?php echo $data['tgl_lahir']; ?></td>
                                    <td><?php echo $data['jenis_kelamin']; ?></td>
                                    <td><?php echo $data['prodi']; ?></td>
                                    <td><?php echo $data['nomor_hp']; ?></td>
                                    <td>
                                        <a href="?page=anggota&aksi=ubah&id=<?php echo $data['nim']; ?>" class="btn btn-info btn-fill" style="margin:4px 6px 4px 0;"><i class="far fa-edit" style="margin-right:7px;"></i>Ubah</a>
                                        <a href="?page=anggota&aksi=hapus&id=<?php echo $data['nim']; ?>" class="btn btn-danger btn-fill" style="margin:4px 0 4px 0;"><i class="far fa-trash-alt" style="margin-right:7px;"></i>Hapus</a>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="?page=anggota&aksi=tambah" class="btn btn-success btn-fill" style="margin:-6px 0 10px 0;"><i class="fas fa-plus" style="margin-right:7px;"></i>Tambah anggota</a>
                <a href="laporan/laporan_anggota_excel.php" target="_blank" class="laporan-btn btn btn-secondary btn-fill" style="margin:-6px 0px 10px 0px;"><i class="fas fa-print" style="margin-right:7px;"></i>Export Excel data anggota</a>
                <a href="laporan/laporan_anggota_pdf.php" target="_blank" class="laporan-btn btn btn-secondary btn-fill" style="margin:-6px 0px 10px 0px;"><i class="fas fa-print" style="margin-right:7px;"></i>Export PDF data anggota</a>
            </div>
        </div>
    </div>
</div>