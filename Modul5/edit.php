<?php 
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Master Supplier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body style="margin:40px">

<h2>Edit Data Master Supplier</h2>
<hr>

<form method="post" class="form-horizontal" style="width:500px">

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>">
    </div>

    <div class="form-group">
        <label>Telp</label>
        <input type="text" name="telp" class="form-control" value="<?php echo $d['telp']; ?>">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?php echo $d['alamat']; ?>">
    </div>

    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-danger">Batal</a>

</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE supplier SET
        nama='$_POST[nama]',
        telp='$_POST[telp]',
        alamat='$_POST[alamat]'
        WHERE id='$id'
    ");

    echo "<script>alert('Data berhasil diupdate'); 
    window.location='index.php';</script>";
}
?>

</body>
</html>
