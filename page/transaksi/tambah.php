<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  

<?php

    $tgl_pinjam = date("d-m-Y");
    $seminggu = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
    $kembali = date("d-m-Y", $seminggu);

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="margin-bottom:10px;">Tambah Transaksi</h4>
                    </div>
                    <div class="content">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Buku</label>
                                    <select class="form-control" name="buku">
                                        <?php

                                            $sql = $koneksi->query("select * from tb_buku order by id");

                                            while($data=$sql->fetch_assoc()){
                                                echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
                                            }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mahasiswa Peminjam</label>
                                    <select class="form-control" name="nama">
                                        <?php

                                            $sql = $koneksi->query("select * from tb_anggota order by nim");

                                            while($data=$sql->fetch_assoc()){
                                                echo "<option value='$data[nim].$data[nama]'>($data[nim]) $data[nama]</option>";
                                            }

                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Pinjam</label>
                                    <input type="text" class="form-control" name="tgl_pinjam" value="<?php echo $tgl_pinjam;?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input class="form-control" type="text" name="tgl_kembali" value="<?php echo $kembali;?>" readonly>
                                </div>
                            </div>
                        </div>

                        

                        <!-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" placeholder="City" value="Mike">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="number" class="form-control" placeholder="ZIP Code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Me</label>
                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                </div>
                            </div>
                        </div> -->

                        <input type="submit" class="btn btn-success btn-fill pull-right" name="tambah" value="Tambah">
                        <div class="clearfix"></div>
                    </form>
                    <?php
/* } */
?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['tambah'])){
        
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];

        $buku = $_POST['buku'];
        $pecah_buku = explode(".", $buku);
        $id = $pecah_buku[0];
        $judul = $pecah_buku[1];

        $nama = $_POST['nama'];
        $pecah_nama = explode(".", $nama);
        $nim = $pecah_nama[0];
        $nama = $pecah_nama[1];

        $sql = $koneksi->query("select * from tb_buku where judul = '$judul'");
        while ($data = $sql->fetch_assoc()){
            $sisa = $data['jumlah'];

            if ($sisa == 0){
                echo'<script type="text/javascript">';
                echo'setTimeout(function () { ';
                echo'swal({';
                echo'    title: "Tambah transaksi",';
                echo'    text: "Data transaksi gagal ditambah!",';
                echo'    type: "error",';
                echo'    confirmButtonText: "OK"';
                echo'},';
                echo'function(isConfirm){';
                echo'    if (isConfirm) {';
                echo'    window.location.href = "?page=transaksi&aksi=tambah";';
                echo'    }';
                echo'}); }, 1000);';
                echo'</script>';
            }
            else{
                $sql2 = $koneksi->query("insert into tb_transaksi(judul, nim, nama, tgl_pinjam, tgl_kembali, status) 
                values('$judul', '$nim', '$nama', '$tgl_pinjam', '$tgl_kembali', 'pinjam')");

                $sql3 = $koneksi->query("update tb_buku set jumlah=(jumlah-1) where id ='$id' ");

                echo'<script type="text/javascript">';
                echo'setTimeout(function () { ';
                echo'swal({';
                echo'    title: "Tambah transaksi",';
                echo'    text: "Data transaksi berhasil ditambah!",';
                echo'    type: "success",';
                echo'    confirmButtonText: "OK"';
                echo'},';
                echo'function(isConfirm){';
                echo'    if (isConfirm) {';
                echo'    window.location.href = "?page=transaksi";';
                echo'    }';
                echo'}); }, 1000);';
                echo'</script>';
            }
        }

    }

    /* if($tambah) {
        $sql = $koneksi->query("insert into tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jenis_kelamin, prodi, nomor_hp)
            values('$nim', '$nama', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$prodi', '$nomor_hp')");

        if ($sql){
            echo'<script type="text/javascript">';
            echo'setTimeout(function () { ';
            echo'swal({';
            echo'    title: "Tambah data",';
            echo'    text: "Data anggota berhasil ditambah!",';
            echo'    type: "success",';
            echo'    confirmButtonText: "OK"';
            echo'},';
            echo'function(isConfirm){';
            echo'    if (isConfirm) {';
            echo'    window.location.href = "?page=anggota";';
            echo'    }';
            echo'}); }, 1000);';
            echo'</script>';
                
        
        }
    } */
?>