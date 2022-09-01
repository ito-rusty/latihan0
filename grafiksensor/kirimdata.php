<?php
	//koneksi ke database
	$konek = mysqli_connect("localhost", "root", "", "grafiksensor");
	
	//tangkap parameter yang dikirimkan oleh nodeMcu
	$suhu = $_GET['suhu'];
	$kelembaban = $_GET['kelembaban'];

	//simpan ke tabel tb_sensor
	//atur IG selalu dimulai dari 1
	mysqli_query($konek, "ALTER TABLE tb_sensor AUTO_INCREMENT=1");
	//simapn niali syhu dan kelembaban ke tabel tb_sensor
	$simpan = mysqli_query($konek, "INSERT INTO tb_sensor(suhu, kelembaban)VALUES('$suhu', '$kelembaban')");

	//berikan respon ke nodemcu
	if($simpan)
		echo "Berhasil disimpan";
	else
		echo "Gagal disimpan";

?>