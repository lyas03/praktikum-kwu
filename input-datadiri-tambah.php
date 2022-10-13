<div class="container">
<h1>Tambah Data</h1>
<form action="kwu-tambah.php" method="POST">
    <label for="kodebarang">Kode Barang :</label>
    <input type="text" name="kodebarang" placeholder="Ex. 12003102"/><br>

    <label for="tanggal">Tanggal Transaksi :</label>
    <input type="date" name="tanggal" placeholder="Ex. Agung Aryanto"/><br>

    <label for="pembeli">Pembeli :</label>
    <input type="text" name="pembeli"/><br>

    <label for="namabarang">Nama Barang :</label>
    <input type="text" name="namabarang"/><br>

    <label for="qty">Jumlah :</label>
    <input type="number" name="qty"/><br>

    <label for="hargabeli">Harga Beli :</label>
    <input type="number" name="hargabeli"/><br>

    <label for="hargajual">Harga Jual :</label>
    <input type="number" name="hargajual"/><br>

    <input class="btn btn-success btn-sm" type="submit" name= "simpan" value="Simpan Data"/>
    <a class="btn btn-secondary btn-sm" href="inputdatadiri.php"> Kembali </a>
</form> 
</div>

<?php
 include('./inputconfig.php');
 if ($_SESSION["login"] != TRUE) {
     header('location:login.php');
  }

  if ($_SESSION["role"] != "admin") {
    echo "
            <script>
            alert('Akses Tidak Di Berikan,MInimal Admin Dulu Ngab');
            window.location= 'inputdatadiri.php';
            </script>
            ";
 }
  


    if( isset($_POST["simpan"])){
        $nis= $_POST["nis"];
        $namalengkap= $_POST["nama"];
        $tanggal_lahir= $_POST["tanggal_lahir"];
        $nilai= $_POST["nilai"];

        echo $nis . "<br>";
        echo $namalengkap . "<br>";
        echo $tanggal_lahir . "<br>";
        echo $nilai . "<br>";

        //CREATE - Menambahkan Data ke Database
        $query = "
        INSERT INTO datadiri VALUES
        ('$nis', '$namalengkap', '$tanggal_lahir', '$nilai', '', '');
        ";

      
        $insert = mysqli_query($mysqli, $query);

        if ($insert){
            echo "
            <script>
            alert('Data Berhasil Ditambahkan');
            window.location= 'inputdatadiri.php';
            </script>
            ";
      }
    }
?>