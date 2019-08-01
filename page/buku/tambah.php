<?php
/* // --- koneksi ke database
$koneksi = mysqli_connect("localhost","root","","e-library") or die(mysqli_error());
// --- Fngsi tambah data (Create)
function tambah($koneksi){
    
    if (($_POST['tambah_buku'])){
        $judul = ($_POST ['judul']);
        $pengarang = ($_POST ['pengarang']);
        $penerbit = ($_POST ['penerbit']);
        $tahun_terbit = ($_POST ['tahun_terbit']);
        $isbn = ($_POST ['isbn']);
        $jumlah = ($_POST ['jumlah']);
        $lokasi = ($_POST ['lokasi']);
        $tanggal = ($_POST ['tgl_input']);
        
        if(!empty($judul) && !empty($pengarang) && !empty($penerbit) && !empty($tahun_terbit) && !empty($isbn) && !empty($jumlah) && !empty($lokasi) && !empty($tanggal)){
            $sql = "INSERT INTO tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah, lokasi, tgl_input) VALUES(".$judul.",'".$pengarang."','".$penerbit."','".$tahun_terbit."','".$isbn."','".$jumlah."','".$lokasi."','".$tanggal."')";
            $simpan = mysqli_query($koneksi, $sql);
            if($simpan && ($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    header('location: index.php');
                }
            }
        } else {
            $pesan = "Tidak dapat menyimpan, data belum lengkap!";
        }
    } */
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
                        <h4 class="title" style="margin-bottom:10px;">Tambah Buku</h4>
                    </div>
                    <div class="content">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" placeholder="judul buku" name="judul" required>
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
                                    <label>Pengarang</label>
                                    <input type="text" class="form-control" placeholder="nama pengarang buku" name="pengarang" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" class="form-control" placeholder="Penerbit buku, contoh : Erlangga" name="penerbit" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <select class="form-control" name="tahun_terbit">
                                    <?php 
                                        for($i = 1985 ; $i <= date('Y'); $i++){
                                            echo "<option>$i</option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text" class="form-control" placeholder="ISBN" name="isbn">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" class="form-control" placeholder="Jumlah buku" name="jumlah" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <select class="form-control" id="lokasi" name="lokasi">
                                    <option value="rak1">Rak 1</option>
                                    <option value="rak2">Rak 2</option>
                                    <option value="rak3">Rak 3</option>
                                </select>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Input</label>
                                    <input class="form-control" type="date" name="tgl_input">
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
    $judul = ($_POST ['judul']);
    $pengarang = ($_POST ['pengarang']);
    $penerbit = ($_POST ['penerbit']);
    $tahun_terbit = ($_POST ['tahun_terbit']);
    $isbn = ($_POST ['isbn']);
    $jumlah = ($_POST ['jumlah']);
    $lokasi = ($_POST ['lokasi']);
    $tanggal = ($_POST ['tgl_input']);

    $tambah = ($_POST ['tambah']);

    if($tambah) {
        $sql = $koneksi->query("insert into tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah, lokasi, tgl_input)
            values('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah', '$lokasi', '$tanggal')");

        if ($sql){
            echo'<script type="text/javascript">';
            echo'setTimeout(function () { ';
            echo'swal({';
            echo'    title: "Tambah data",';
            echo'    text: "Data buku berhasil ditambah!",';
            echo'    type: "success",';
            echo'    confirmButtonText: "OK"';
            echo'},';
            echo'function(isConfirm){';
            echo'    if (isConfirm) {';
            echo'    window.location.href = "?page=buku";';
            echo'    }';
            echo'}); }, 1000);';
            echo'</script>';
                
        
        }
    }
?>
<!-- <script>
                    alert("Data Buku Berhasil Ditambah");
                    window.location = "?page=buku";
                </script> -->
