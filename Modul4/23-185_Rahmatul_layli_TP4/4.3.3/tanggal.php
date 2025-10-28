<!-- checkdate()
Memvalidasi apakah tanggal vali -->
<?php
$month = 8;
$day = 12;
$year = 2004;

if (checkdate($month, $day, $year)) {
    echo "Valid date!";
} else {
    echo "Invalid date!";
}
