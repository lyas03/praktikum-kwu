<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

include('./inputconfig.php');
$no = 1;
$tabledata="";
$data = mysqli_query($mysqli," SELECT * FROM transaksi ");
while($row = mysqli_fetch_array($data)){
        $total_harga_beli = $row["qty"] * $row["hargabeli"];
        $total_harga_jual = $row["qty"] * $row["hargajual"];
        $laba = $total_harga_jual - $total_harga_beli;
       $tabledata .= "
       <tr>
           <td>".$no."</td>
           <td>".$row["kodebarang"] ."</td>
            <td>".$row["tanggal"] ."</td>
            <td>".$row["pembeli"] ."</td>
            <td>".$row["namabarang"] ."</td>
            <td>".$row["qty"] ."</td>
            <td> Rp.".$row["hargabeli"] ."</td>
            <td> Rp.".$row["hargajual"] ."</td>
            <td>Rp.$total_harga_beli</td>
            <td>Rp.$total_harga_jual</td>
            <td>Rp.$laba</td>
       <tr>
       ";
       $no++;
}

$table = "
<h1>Laporan KWU Kelas</h1>
<table cellpadding=5 border=1 cellspacing=0 width='100%'>
<tr>
    <th>No</th>
    <th>Kode Barang</th>
    <th>Tanggal Transaksi</th>
    <th>Pembeli</th>
    <th>Nama Barang</th>
    <th>Jumlah</th>
    <th>Harga Beli</th>
    <th>Harga Jual</th>
    <th>Total Harga Beli</th>
    <th>Total Harga Jual</th>
    <th>Laba</th>
</tr>
<tr><
$tabledata
</table>";

$mpdf->WriteHTML("$table");
$mpdf->Output();







?>