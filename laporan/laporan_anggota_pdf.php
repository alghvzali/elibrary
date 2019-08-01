<?php
    $koneksi = new mysqli ("sql212.byetcluster.com", "b7_22164534", "ALarmy12", "b7_22164534_elibrary" );
    $content ='
        <style type="text/css">
            .tabel{
                border-collapse: collapse;
            }
            .tabel th{padding:8px 5px; background-color: lightgray;}
            .tabel td{padding:8px 5px; width:10%; font-size:11px;}
        </style>
    ';

    $content .='

    <page>
        <h2>Laporan Data Anggota E-Library</h2>

        <table border="1" class="tabel">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Program Studi</th>
                <th>Nomor Handphone</th>
            </tr>';

            $no = 1;

            $sql = $koneksi->query("select * from tb_anggota");

            while ($data=$sql->fetch_assoc()){

            $content .='
                
            <tr>
                <td>'.$no++.'</td>
                <td>'.$data['nim'].'</td>
                <td>'.$data['nama'].'</td>
                <td>'.$data['tempat_lahir'].'</td>
                <td>'.$data['tgl_lahir'].'</td>
                <td>'.$data['jenis_kelamin'].'</td>
                <td>'.$data['prodi'].'</td>
                <td>'.$data['nomor_hp'].'</td>
            </tr>
                
            ';
            }
        $content .='
        </table>
    </page>';

    require_once('../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('laporan_anggota_e-library.pdf');

?>