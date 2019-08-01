<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  

<?php

    $id = $_GET['id'];
    $judul = $_GET['judul'];

    $sql = $koneksi->query("update tb_transaksi set status='kembali' where id='$id'");

    $sql = $koneksi->query("update tb_buku set jumlah=(jumlah+1) where judul='$judul'");

    echo'<script type="text/javascript">';
    echo'setTimeout(function () { ';
    echo'swal({';
    echo'    title: "Pengembalian Buku",';
    echo'    text: "Buku berhasil dikembalikan!",';
    echo'    type: "success",';
    echo'    confirmButtonText: "OK"';
    echo'},';
    echo'function(isConfirm){';
    echo'    if (isConfirm) {';
    echo'    window.location.href = "?page=transaksi";';
    echo'    }';
    echo'}); }, 1000);';
    echo'</script>';

?>