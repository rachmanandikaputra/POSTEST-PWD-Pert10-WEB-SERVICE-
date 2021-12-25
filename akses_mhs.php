<!-- Form pencarian dengan input text dan button cari -->
<h3>Form Pencarian Mahasiswa Dengan PHP</h3>
<form action="" method="get">
<label for="cari">Cari : </label>
<input type="text" name="nim">
<input type="submit" value="Cari">
</form>
<?php
if(isset($_GET['nim']))
{
$cari = $_GET['nim'];
echo "<b>Hasil pencarian: ".$cari."</b>";
// url webservice
$url =
"http://localhost/akademik/getdatamhs.php?nim=".
$cari."";
} else {
// url webservice
$url =
"http://localhost/akademik/getdatamhs.php";
}
// menginisialisi sesi baru
$client = curl_init($url);
// mengatur opsi pada curl dengan kembalian berupa string
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
// mengeksekusi query curl
$response = curl_exec($client);
// mengubah menjadi objek json menjadi objek php
$result = json_decode($response);
if($result->status == 404)
{
echo "<br>".$result->data;
} else {
foreach($result->data as $r){
echo "<p>";
echo "NIM : ".$r->nim."<br />";
echo "Nama : ".$r->Nama."<br />";
echo "Jenis Kel : ".$r->jkel."<br />";
echo "ALamat : ".$r->alamat."<br />";
echo "Tgl-Lhair : ".$r->tgllhr."<br />";
echo "</p>";
}
}
?>