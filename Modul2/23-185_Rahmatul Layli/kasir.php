<!DOCTYPE html>
<html>
<head>
    <title> warungku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            border: 1px solid #000;
            padding: 10px;
            width: 300px;
        }
        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 500px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }
        input, select {
            width: 100%;
            padding: 5px;
            margin: 4px 0;
        }
    </style>
</head>
<body>

<h2>warungku</h2>

<form method="post">
    <label>Pilih Menu:</label><br>
    <select name="menu" required>
        <option value="">-- Pilih Menu --</option>
        <option value="Nasi Goreng">Nasi Goreng</option>
        <option value="Mie Ayam">Mie Ayam</option>
        <option value="Es Teh">Es Teh</option>
        <option value="Kopi Susu">Kopi Susu</option>
    </select><br>

    <label>Jumlah:</label><br>
    <input type="number" name="jumlah" min="1" required><br><br>

    <input type="submit" name="tambah" value="Tambah Pesanan">
    <input type="submit" name="selesai" value="Selesai">
</form>

<?php
session_start();

// Inisialisasi pesanan
if (!isset($_SESSION['pesanan'])) {
    $_SESSION['pesanan'] = [];
}

// Jika tombol Tambah diklik
if (isset($_POST['tambah'])) {
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];

    // Tentukan harga menu
    switch ($menu) {
        case "Nasi Goreng": $harga = 15000; break;
        case "Mie Ayam": $harga = 12000; break;
        case "Es Teh": $harga = 5000; break;
        case "Kopi Susu": $harga = 8000; break;
        default: $harga = 0; break;
    }

    // Tambahkan ke daftar pesanan
    $_SESSION['pesanan'][] = [
        "menu" => $menu,
        "jumlah" => $jumlah,
        "harga" => $harga
    ];

    echo "<p>Pesanan <b>$menu</b> berhasil ditambahkan.</p>";
}

// Tampilkan daftar pesanan
if (!empty($_SESSION['pesanan'])) {
    echo "<table>";
    echo "<tr><th>No</th><th>Menu</th><th>Jumlah</th><th>Harga</th><th>Subtotal</th></tr>";

    $no = 1;
    $total = 0;
    foreach ($_SESSION['pesanan'] as $p) {
        $subtotal = $p['jumlah'] * $p['harga'];
        echo "<tr>
                <td>$no</td>
                <td>{$p['menu']}</td>
                <td>{$p['jumlah']}</td>
                <td>Rp{$p['harga']}</td>
                <td>Rp$subtotal</td>
              </tr>";
        $total += $subtotal;
        $no++;
    }

    echo "<tr><td colspan='4'><b>Total Bayar</b></td><td><b>Rp$total</b></td></tr>";
    echo "</table>";
}

// Jika tombol Selesai diklik
if (isset($_POST['selesai'])) {
    if (!empty($_SESSION['pesanan'])) {
        echo "<h3>Terima kasih, Layli!</h3>";
        echo "<p>Total pembayaran Anda: <b>Rp$total</b></p>";
        session_destroy();
    } else {
        echo "<p>Belum ada pesanan.</p>";
    }
}
?>

</body>
</html>
