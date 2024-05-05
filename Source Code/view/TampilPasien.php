<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");


// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan LP11
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{

		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
				<a href='index.php?id=" .$this->prosespasien->getId($i) ."' title='Edit Data'><i class='bi bi-pencil-square text-warning'></i></a>&nbsp;
				<a href='index.php?hapus=" .$this->prosespasien->getId($i) ."'  title='Delete Data' >
				<i class='bi bi-trash-fill text-danger'></i>
			</a>
			</td>";
		}

		

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	public function add($data){
		$this->prosespasien->add($data);
	}

	public function update($id, $data){
		$this->prosespasien->update($id, $data);
	}

	public function delete ($id){
		$data = null;
		$data = '<div class="container mt-5 pt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Hapus Data Pengurus</h5>
            </div>
			<div class="card-body">
			<p>Apakah Anda yakin ingin menghapus data pengurus ini?</p>
			<form action="#" method="POST">
				<input type="hidden" name="pengurus_id" value="pengurus_id">
				<a href="index.php"><button type="submit" class="btn btn-danger" name="btn-hapus">Hapus</button></a>
				<a href="index.php" class="btn btn-secondary">Batal</a>
			</form>
		</div>';
		if (isset($_POST['btn-hapus'])) {
			if ($id > 0) {
				$this->prosespasien->delete($id);
			}
		}
		$this->tpl = new Template("templates/skinform.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("FORM", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	public function formUpdate($id){

		$pasien = $this->prosespasien->DataById($id);
		$data = null;

		$data .='
		<div class="modal-dialog">
			<form action="index.php" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="my-0" >Ubah Data</h3>
					</div>
					<input type="hidden" name="id" value="' . $pasien->getId() . '">
					<div class="modal-body">
						<div class="mb-6">
							<label for="exampleFormControlInput1" class="form-label">NIK </label>
							<input type="text" class="form-control" name="nik" value="'.$pasien->getNik().'">
						</div>
						<div class="mb-6">
						<label for="exampleFormControlInput1" class="form-label">Nama </label>
						<input type="text" class="form-control" name="nama" value="'.$pasien->getNama().'">
						</div>
						<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Tempat</label>
								<input type="text" class="form-control" name="tempat" value="'. $pasien->getTempat().'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
								<input type="date" class="form-control" name="tl" value="'.$pasien->getTl().'">
							</div>
						</div>
					</div>

					<div class="mb-6">
						<label for="exampleFormControlInput1" class="form-label">Jenis Kelamin </label>
						<select name ="gender" class="form-control me-2">';
						$data .= "<option value=".$pasien->getGender() ." selected >Perempuan</option>";
						$data .= "<option value=".$pasien->getGender() ." selected >Laki-laki</option>";
					$data.= '</select>
					</div>
					<div class="mb-6">
					<label for="exampleFormControlInput1" class="form-label">Email </label>
					<input type="email" class="form-control" name="email" value="'.$pasien->getEmail().'">
				</div>
				<div class="mb-6">
					<label for="exampleFormControlInput1" class="form-label">No Handphone </label>
					<input type="text" class="form-control" name="telp" value="'.$pasien->getTelp().'">
				</div>
				<div class="modal-footer">
				<a href="index.php" class="btn btn-danger">Batal</a>

					<button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
				</div>
				</div>
			</form>
		</div>
	</div>';

  		$this->tpl = new Template("templates/skinform.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("FORM", $data);

		// Menampilkan ke layar
		$this->tpl->write();

	}
}
