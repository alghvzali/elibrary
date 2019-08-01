<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php

    $id = $_GET[id];

    $koneksi->query("delete from tb_buku where id=$id");

    echo'<script type="text/javascript">';
    echo'setTimeout(function () { ';
    echo'swal({';
    echo'    title: "Hapus data",';
    echo'    text: "Data buku berhasil dihapus!",';
    echo'    type: "success",';
    echo'    confirmButtonText: "OK"';
    echo'},';
    echo'function(isConfirm){';
    echo'    if (isConfirm) {';
    echo'    window.location.href = "?page=buku";';
    echo'    }';
    echo'}); }, );';
    echo'</script>';
?>




    