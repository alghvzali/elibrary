<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="margin-bottom:10px;">Data Transaksi</h4>
                        <p class="category"></p>
                        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari buku.." style="margin-top:6px;"> -->
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table id="myTable" class="table table-hover table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Terlambat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>

                                <?php

                                    $no = 1;

                                    $sql = $koneksi->query("select * from tb_transaksi where status='pinjam'");

                                    while ($data=$sql->fetch_assoc()){

                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['nim']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['tgl_pinjam']; ?></td>
                                    <td><?php echo $data['tgl_kembali']; ?></td>
                                    <td>
                                        <?php 

                                            $denda = 2000;

                                            $tgl_dateline2 = $data['tgl_kembali'];
                                            $tgl_kembali = date('Y-m-d');

                                            $lambat = terlambat($tgl_dateline2, $tgl_kembali);
                                            $denda1 = $lambat*$denda;

                                            if ($lambat>0){
                                                echo "
                                                    <font color ='red'>$lambat Hari<br>Denda (Rp.$denda1)</font>
                                                ";
                                            }
                                            else{
                                                echo $lambat . " Hari";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td>
                                        <a href="?page=transaksi&aksi=kembali&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']; ?>" class="btn btn-success btn-fill" style="margin:4px 6px 4px 0;"><i class="fas fa-reply" style="margin-right:7px;"></i>Kembali</a>

                                        <a href="?page=transaksi&aksi=perpanjang&id=<?php echo $data['id'];?>&judul=<?php echo $data['judul']?>&lambat=<?php echo $lambat?>&tgl_kembali=<?php echo $data['tgl_kembali']?>" class="btn btn-info btn-fill" style="margin:4px 0 4px 0;"><i class="far fa-clock" style="margin-right:7px;"></i>Perpanjang</a>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="?page=transaksi&aksi=tambah" class="btn btn-success btn-fill" style="margin:-6px 0 10px 0;"><i class="fas fa-plus" style="margin-right:7px;"></i>Tambah transaksi</a>
            </div>
        </div>
    </div>
</div>