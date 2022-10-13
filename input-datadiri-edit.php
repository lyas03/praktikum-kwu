<?php
       include('./inputconfig.php');
       if ($_SESSION["login"] != TRUE) {
           header('location:login.php');
        }
   if ( isset($_GET["kodebarang"]) ){
        $kodebarang = $_GET["kodebarang"];
        $check_nis = "SELECT * FROM transaksi WHERE kodebarang = '$kodebarang'; ";
    
        $query = mysqli_query($mysqli,$check_nis );
        $row = mysqli_fetch_array($query);
    }
?>

<div class="container">
<h1>Edit Data</h1>
<form action="input-datadiri-edit.php" method="POST">
    <label for="kodebarang">Kode Barang :</label>
    <input class="form-control" type="text" name="kodebarang" value="<?php echo $row["kodebarang"]; ?>" placeholder="Ex. 12003102" readonly/><br>

    <label for="tanggal">Tanggal Transaksi :</label>
    <input class="form-control" type="date" name="tanggal" value="<?php echo $row["tanggal"]; ?>"/><br>

    <label for="pembeli">Pembeli :</label>
    <input class="form-control" type="text" name="pembeli" value="<?php echo $row["pembeli"]; ?>"/><br>

    <label for="namabarang">Nama Barang :</label>
    <input class="form-control" type="text" name="namabarang" value="<?php echo $row["namabarang"]; ?>"/><br>

    <label for="qty">Jumlah :</label>
    <input class="form-control" type="number" name="qty" value="<?php echo $row["qty"]; ?>"/><br>

    <label for="hargabeli">Harga Beli :</label>
    <input class="form-control" type="number" name="hargabeli" value="<?php echo $row["hargabeli"]; ?>"/><br>

    <label for="hargajual">Harga Jual :</label>
    <input class="form-control" type="number" name="hargajual" value="<?php echo $row["hargajual"]; ?>"/><br>

    <input class="form-control" type="submit" name="edit" value="Edit Data" />
    <a class='btn btn-danger btn-sm' href="inputdatadiri.php">Kembali</a>
</form>
</div>

<?php
    if( isset($_POST["edit"])){
        $kodebarang= $_POST["kodebarang"];
        $tanggal= $_POST["tanggal"];
        $pembeli= $_POST["pembeli"];
        $namabarang= $_POST["namabarang"];
        $qty= $_POST["qty"];
        $hargabeli= $_POST["hargabeli"];
        $hargajual= $_POST["hargajual"];


        //UPDATE - Memperbarui Data
        $query = "
                UPDATE transaksi SET tanggal = '$tanggal',
                pembeli = '$pembeli',
                namabarang = '$namabarang',
                qty = '$qty',
                hargabeli = '$hargabeli',
                hargajual = '$hargajual'
                WHERE kodebarang = '$kodebarang';
        ";

 
        $UPDATE = mysqli_query($mysqli, $query);

        if($UPDATE){
            echo "
            <script>
            alert('Data Berhasil Diperbaharui');
            window.location= 'inputdatadiri.php';
            </script>
            ";
        }else{
            echo"
            <script>
            alert('Data gagal Diperbaharui');
            window.location= 'input-datadiri-edit.php?nis=$nis';
            </script>
            ";
        }
    }
?>
