<!DOCTYPE html>
<html>
<head>
    <title>Grade Nilai Mahasiswa</title>
</head>
<body>
    <h2> Menentukan Grade Nilai Mahasiswa</h2>
    <form method="post" action="">
        Nama: <input type="text" name="nama"  required><br><br>
        Nilai: <input type="number" name="nilai" min="0" max="100" required><br><br>
        <input type="submit" name="submit" value="Proses">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nilai = $_POST['nilai'];

        if ($nilai >= 85 && $nilai <= 100) {
            $grade = "A";
        } elseif ($nilai >= 70) {
            $grade = "B";
        } elseif ($nilai >= 55) {
            $grade = "C";
        } elseif ($nilai >= 40) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        echo "<hr>";
        echo "<h3>Hasil Penilaian</h3>";
        echo "Nama Mahasiswa : <b>$nama</b><br>";
        echo "Nilai Anda     : <b>$nilai</b><br>";
        echo "Grade Anda     : <b>$grade</b><br>";
    }
    ?>
</body>
</html>
