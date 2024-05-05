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

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();


if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $data =$tp->delete($id);
}elseif (isset($_POST['add'])){
    $data = array(
        'nama' => $_POST['nama'],
        'nik' => $_POST['nik'],
        'tempat' => $_POST['tempat'],
        'tl' => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'telp' => $_POST['telp']
    );
    $add = $tp->add($data);
}elseif (isset($_POST['ubah'])){
    $id = $_POST['id'];
    $data = array(
        'nama' => $_POST['nama'],
        'nik' => $_POST['nik'],
        'tempat' => $_POST['tempat'],
        'tl' => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'telp' => $_POST['telp']
    );
    $add = $tp->update($id, $data);
}elseif(isset ($_GET['id'])){
    $id = $_GET['id'];
    $data = $tp->formUpdate($id);
}else{
    $data = $tp->tampil();
}
