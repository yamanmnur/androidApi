<?php
include "koneksi.php";//include file connect.php untuk menyambungkan file create.php dengan database
if($_SERVER['REQUEST_METHOD']=='GET') {
//inisialiasi query READ	
  $query = "SELECT * FROM tbl_pegawai ORDER BY nama ASC";
$sql = mysqli_query($connect, $query);//pemanggilan fungsi mysqli_query untuk mengirimkan perintah sesuai parameter yang diisi
  $result = array(); //inisialisasi array dengan variabel $result
  while($row = mysqli_fetch_array($sql)){
    array_push($result, array(
    	'id_pegawai'=>$row[0], 
    	'nama_pegawai'=>$row[1], 
    	'posisi_pegawai'=>$row[2], 
    	'gajih_pegawai'=>$row[3]));
  }//melakukan pengulangan dengan while untuk membaca seluruh data pada tabel mahasiswa, dan disimpan didalam row/baris. urutan row harus sesuai urutan pada database
  echo json_encode($result); //mengeluarkan data dalam bentuk json
  mysqli_close($connect); 
//tutup koneksi
}
?>