<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan LP11
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getPasienbyId($id)
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien WHERE id=$id";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function addPasien ($data){
		$nama = $data['nama'];
		$nik = $data['nik'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		if (!empty($nama) && !empty($nik) && !empty($tempat) && !empty($tl) && !empty($gender) && !empty($email) && !empty($telp)){
			$query = "INSERT INTO pasien VALUE ('','$nik','$nama','$tempat','$tl','$gender','$email','$telp')";

			return $this->execute($query);
		}
	}

	function updateData ($data, $id){
		$nama = $data['nama'];
		$nik = $data['nik'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		$query = "UPDATE pasien SET nama='$nama', nik='$nik', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";

		return $this->execute($query);
	}

	function deleteData ($id){
		$query = "DELETE FROM pasien WHERE id='$id'";
		return $this->execute($query);
	}
}
