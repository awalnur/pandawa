<?php

namespace App\Controllers\Admin;

class Mahasiswa extends AdminController
{
    function index(){
        $data['mahasiswa']=$this->db->table('mhs')->join('prodi', 'mhs.idprodi=prodi.idprodi', 'inenr')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/mahasiswa', $data);
        echo view('admin/template/footer');
    }
    function tambahmhs(){
        $data['prodi']=$this->db->table('prodi')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/tambahmhs', $data);
        echo view('admin/template/footer');
    }
    function savemahasiswa(){

        $nim=$this->request->getPost('nim');
                echo password_hash('123', PASSWORD_DEFAULT)."<br>";

//        echo password_hash($nim, PASSWORD_DEFAULT);
        $nama=$this->request->getPost('nama');
        $angkatan=$this->request->getPost('angkatan');
        $prodi=$this->request->getPost('prodi');
//        $foto=$this->request->getPost('foto_dosen');
        $foto='default.png';
        $spass=password_hash(''.$nim.'', PASSWORD_DEFAULT);
        $data=[
            'nim'=>$nim,
            'nama_mhs'=>$nama,
            'angkatan'=>$angkatan,
            'idprodi'=>$prodi,
            'password'=>$spass,
        ];
        $this->db->table('mhs')->insert($data);
        return redirect()->back()->with('success', 1);

    }
}