
<?php
    include('./inputconfig.php');
    echo "<div class='container'>";
    if ($_SESSION["login"] != TRUE) {
        header('location:login.php');
     }

     echo "Selamat Datang, " . $_SESSION["nama_akun"] . "<br>";
     echo "Anda Sebagai : " . $_SESSION["role"] ;
     echo "<br>";
     echo "<a href='logout.php'>Logout Ngab</a>";
     echo "<hr>";
     echo "<a class='btn btn-primary btn-sm' href='input-datadiri-tambah.php'>Tambah Data</a>    -   ";
     echo "<a class='btn btn-warning btn-sm' href='input-datadiri-pdf.php'>Download PDF</a>";
     echo "<hr>";
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
                <td>
                    <a class='btn btn-success btn-sm' href='input-datadiri-edit.php?kodebarang=".$row["kodebarang"]."'>Edit</a>
                    
                    <a class='btn btn-danger btn-sm' href='input-datadiri-hapus.php?kodebarang=".$row["kodebarang"]."' 
                              onclick='return confirm(\"Yakin Dek ?\");'>Hapus</a>
                </td>
            <tr>
            ";
            $no++;
     }
     

     echo "
        <table class='table table-danger table-bordered table-striped'>
            <tr>
            <th>NO</th>
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
            <th>Aksi</th>
            </tr>
            $tabledata
        </table>
     ";
     echo "</div>";
?>