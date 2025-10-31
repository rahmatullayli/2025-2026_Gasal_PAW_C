<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Master Supplier Baru</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body style="margin:40px">

<h2>Tambah Data Master Supplier Baru</h2>
<hr>

<form method="post" class="form-horizontal" style="width:500px">

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama">
    </div>

    <div class="form-group">
        <label>Telp</label>
        <input type="text" name="telp" class="form-control" placeholder="telp">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" placeholder="alamat">
    </div>

    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-danger">Batal</a>

</form>

<?php
if (isset($_POST["simpan"])) {
    
    mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES (
        '$_POST[nama]',
        '$_POST[telp]',
        '$_POST[alamat]'
    )");

    echo "<script>alert('Data berhasil ditambahkan'); 
    window.location='index.php';</script>";
}
?>

</body>
</html>
