
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
//include file connect.php untuk menyambungkan file create.php dengan database
include "koneksi.php";
//inisialisasi variabel yang akan ditampung dan diolah dengan query
$id = $_POST['id_pegawai'];
$nama = $_POST['nama_pegawai'];
$posisi = $_POST['posisi_pegawai'];
$gajih = $_POST['gajih_pegawai'];
//inisialiasi query INSERT	
$query = "UPDATE tbl_pegawai set nama = '$nama' and posisi = '$posisi' gajih = '$gajih' where id = '$id";
//pemanggilan fungsi mysqli_query untuk mengirimkan perintah sesuai parameter yang diisi
$sql = mysqli_query($connect, $query);
	
//pengkondisian saat fungsi mysqli_query berhasil atau gagal dieksekusi
if($sql){
     $response["value"] = 1;
     $response["message"] = "Sukses tambah data";
     echo json_encode($response); //merubah respone menjadi JsonObject
}else{
     $response["value"] = 0;
     $response["message"] = "Gagal tambah data";
     echo json_encode($response); //merubah respone menjadi JsonObject
}
//tutup koneksi
mysqli_close($connect);
}
?>