<?php 

    $koneksi = new mysqli ("sql212.byetcluster.com", "b7_22164534", "ALarmy12", "b7_22164534_elibrary" );

    $filename = "anggota_e-library_(".date('d-m-Y').").xls";

    header("content-disposition: attachment; filename=$filename");
    header("content-type: application/vdn.ms-excel");

?>

<h2>Laporan Anggota E-Library</h2>

<table border="1">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Program Studi</th>
        <th>Nomor Handphone</th>
    </tr>

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
    </tr>

    <?php } ?>

</table>