<?php
require_once "koneksi.php";
if(isset($_GET['nim']))
{
// query get data mahasiswa dan eksekusi query
$sql = "SELECT * FROM mahasiswa WHERE
nim=".$_GET['nim']."";
$query = mysqli_query($con, $sql);
} else {
// query get data mahasiswa dan eksekusi query
$sql = "SELECT * FROM mahasiswa";
$query = mysqli_query($con, $sql);
}
// cek data apakah ada atau tidak
if(mysqli_num_rows($query) > 0)
{
// looping data
while($result = mysqli_fetch_assoc($query)) {
$temp[] = $result;
}
// data berupa array dengan isi status dan data tersebut
$data = ["status" => 200, "data" => $temp];
} else {
// data berupa array dengan isi status dan data tersebut
$data = ["status" => 404, "data" => "Data tidak
temukan!"];
}
// send data sebagai json
header('content-type: application/json');
echo json_encode($data);
mysqli_close($con);