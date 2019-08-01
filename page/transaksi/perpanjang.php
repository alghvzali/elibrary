<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  

<?php

    $id = $_GET['id'];
    $judul = $_GET['judul'];
    $tgl_kembali = $_GET['tgl_kembali'];
    $lambat = $_GET['lambat'];

    if ($lambat > 0){

        echo'<script type="text/javascript">';
        echo'setTimeout(function () { ';
        echo'swal({';
        echo'    title: "Perpanjangan Gagal",';
        echo'    text: "Buku tidak dapat diperpanjang karena telah melewati batas pengembalian, kembalikan terlebih dahulu kemudian pinjam kembali",';
        echo'    type: "error",';
        echo'    confirmButtonText: "OK"';
        echo'},';
        echo'function(isConfirm){';
        echo'    if (isConfirm) {';
        echo'    window.location.href = "?page=transaksi";';
        echo'    }';
        echo'}); }, 1000);';
        echo'</script>';

    }
    else{
        $pecah_tgl_kembali = explode("-", $tgl_kembali);
        $next_7_hari = mktime(0,0,0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0]+7, $pecah_tgl_kembali[2]);
        $hari_next = date("d-m-y", $next_7_hari);

        $sql = $koneksi->query("update tb_transaksi set tgl_kembali='$hari_next' where id='$id'");

        if($sql){
            echo'<script type="text/javascript">';
            echo'setTimeout(function () { ';
            echo'swal({';
            echo'    title: "Perpanjangan Berhasil",';
            echo'    text: "Perpanjangan buku berhasil! perpanjangan di tambah 7 hari",';
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
        else{
            echo'<script type="text/javascript">';
            echo'setTimeout(function () { ';
            echo'swal({';
            echo'    title: "Perpanjangan Gagal",';
            echo'    text: "Perpanjangan buku gagal!",';
            echo'    type: "error",';
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

?>