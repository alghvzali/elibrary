<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="margin-bottom:10px;">Data Buku</h4>
                        <p class="category"></p>
                        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari buku.." style="margin-top:6px;"> -->
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table id="myTable" class="table table-hover table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>ISBN</th>
                                <th>Jumlah</th>
                                <th>Lokasi Buku</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>

                                <?php

                                    $no = 1;

                                    $sql = $koneksi->query("select * from tb_buku");

                                    while ($data=$sql->fetch_assoc()){

                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['pengarang']; ?></td>
                                    <td><?php echo $data['penerbit']; ?></td>
                                    <td><?php echo $data['tahun_terbit']; ?></td>
                                    <td><?php echo $data['isbn']; ?></td>
                                    <td><?php echo $data['jumlah']; ?></td>
                                    <td><?php echo $data['lokasi']; ?></td>
                                    <td>
                                        <a href="?page=buku&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-info btn-fill" style="margin:4px 6px 4px 0;"><i class="far fa-edit" style="margin-right:7px;"></i>Ubah</a>
                                        <a href="?page=buku&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-fill" style="margin:4px 0 4px 0;"><i class="far fa-trash-alt" style="margin-right:7px;"></i>Hapus</a>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="?page=buku&aksi=tambah" class="btn btn-success btn-fill" style="margin:-6px 0 10px 0;"><i class="fas fa-plus" style="margin-right:7px;"></i>Tambah buku</a>
            </div>
        </div>
    </div>
</div>
