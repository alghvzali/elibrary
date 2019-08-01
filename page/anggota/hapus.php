<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php

    $nim = $_GET[id];

    $koneksi->query("delete from tb_anggota where nim=$nim");

    echo'<script type="text/javascript">';
    echo'setTimeout(function () { ';
    echo'swal({';
    echo'    title: "Hapus data",';
    echo'    text: "Data anggota berhasil dihapus!",';
    echo'    type: "success",';
    echo'    confirmButtonText: "OK"';
    echo'},';
    echo'function(isConfirm){';
    echo'    if (isConfirm) {';
    echo'    window.location.href = "?page=anggota";';
    echo'    }';
    echo'}); }, );';
    echo'</script>';
?>