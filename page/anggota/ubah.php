<?php

    $nim = $_GET['id'];

    $sql = $koneksi->query("select * from tb_anggota where nim = '$nim'");

    $tampil = $sql->fetch_assoc();

    $jenis_kelamin = $tampil['jenis_kelamin'];
    $prodi = $tampil['prodi'];

?>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="margin-bottom:10px;">Ubah Data Anggota</h4>
                    </div>
                    <div class="content">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nomor Induk Mahasiswa</label>
                                    <input type="text" class="form-control" placeholder="NIM" name="nim" value="<?php echo $tampil['nim']?>" readonly required>
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
                                    <label>Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="nama" value="<?php echo $tampil['nama']?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $tampil['tempat_lahir']?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir']?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki" required <?php if($jenis_kelamin=='Laki-Laki') {echo "checked";} ?>/>
                                            <label for="laki">Laki-Laki</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required <?php if($jenis_kelamin=='Perempuan') {echo "checked";} ?> />
                                            <label for="perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Program Studi</label>
                                    <select class="form-control" name="prodi" id="prodi" required>
                                        <option value="Teknik Informatika" <?php if($prodi=='Teknik Informatika') {echo "selected";} ?>>Teknik Informatika</option>
                                        <option value="Teknik Elektronika" <?php if($prodi=='Teknik Elektronika') {echo "selected";} ?>>Teknik Elektronika</option>
                                        <option value="Teknik Mekatronika" <?php if($prodi=='Teknik Mekatronika') {echo "selected";} ?>>Teknik Mekatronika</option>
                                        <option value="Akuntansi" <?php if($prodi=='Akuntansi') {echo "selected";} ?>>Akuntansi</option>
                                        <option value="Akuntansi Keuangan Publik" <?php if($prodi=='Akuntansi Keuangan Publik') {echo "selected";} ?>>Akuntansi Keuangan Publik</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nomor Handphone</label>
                                    <input class="form-control" type="text" name="nomor_hp" placeholder="Contoh : 08961010xxxx" value="<?php echo $tampil['nomor_hp']?>" required>
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

                        <input type="submit" class="btn btn-info btn-fill pull-right" name="tambah" value="Ubah">
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
    /* $nim = ($_POST ['nim']); */
    $nama = ($_POST ['nama']);
    $tempat_lahir = ($_POST ['tempat_lahir']);
    $tgl_lahir = ($_POST ['tgl_lahir']);
    $jenis_kelamin = ($_POST ['jenis_kelamin']);
    $prodi = ($_POST ['prodi']);
    $nomor_hp = ($_POST ['nomor_hp']);

    $tambah = ($_POST ['tambah']);

    if($tambah) {
        $sql = $koneksi->query("update tb_anggota set nama='$nama', tempat_lahir='$tempat_lahir', 
        tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', prodi='$prodi', nomor_hp='$nomor_hp' where nim='$nim'");

        if ($sql){
            echo'<script type="text/javascript">';
            echo'setTimeout(function () { ';
            echo'swal({';
            echo'    title: "Ubah data",';
            echo'    text: "Data anggota berhasil diubah!",';
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
    }
?>