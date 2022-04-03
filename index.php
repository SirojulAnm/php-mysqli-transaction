<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "coba";

// Create connection
$conn_mysql = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn_mysql) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Database Connected successfully<br>";
}

mysqli_autocommit($conn_mysql, FALSE);

$query = "INSERT INTO person (name, age) VALUES ('Ani', 15)";
$resultQuery1 = mysqli_query($conn_mysql, $query);
if ($resultQuery1) {
  echo "Run Query Person <br>";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn_mysql);
}

$query2 = "INSERT INTO kelas (kelas) VALUES ('X IPA')";
$resultQuery2 = mysqli_query($conn_mysql, $query2);
if ($resultQuery2) {
  echo "Run Query Kelas <br>";
} else {
  echo "Error: " . $query2 . "<br>" . mysqli_error($conn_mysql);
}

if ($resultQuery2) {
    mysqli_commit($conn_mysql);
    echo "Berhasil Insert Person Dan Kelas <br>";
} else {
    mysqli_rollback($conn_mysql);
    echo "Gagal Insert ke Database <br>";
}

mysqli_close($conn_mysql);
?>