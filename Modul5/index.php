<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th { background: #d7eefb; padding: 10px; }
        td { padding: 10px; border: 1px solid #ddd; }
        .btn-tambah { float: right; padding: 8px 12px; background: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        .btn-edit { background: orange; padding: 5px 10px; color: white; border-radius: 4px; text-decoration: none; }
        .btn-hapus { background: red; padding: 5px 10px; color: white; border-radius: 4px; text-decoration: none; }
    </style>
</head>
<body>

<h2>Data Master Supplier</h2>
<a href="tambah.php" class="btn-tambah">Tambah Data</a>
<br><br>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Telp</th>
        <th>Alamat</th>
        <th>Tindakan</th>
    </tr>

    <?php
    $no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM supplier");
    while ($d = mysqli_fetch_array($data)) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['telp']; ?></td>
        <td><?php echo $d['alamat']; ?></td>
        <td>
            <a class="btn-edit" href="edit.php?id=<?php echo $d['id']; ?>">Edit</a>
            <a class="btn-hapus" href="hapus.php?id=<?php echo $d['id']; ?>" 
               onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
