<?php

namespace App\Controllers\Admin;

class Matkul extends AdminController
{
    function index(){
        echo "matkul";
    }
    function tambah(){
        echo view('admin/template/header');
        echo view('admin/tambahmatkul');
        echo view('admin/template/footer');
    }
    function savematkul(){
        $kodematkul=$this->request->getPost('kodematkul');
        $nama=$this->request->getPost('nama');
        $sks=$this->request->getPost('sks');
        $semester=$this->request->getPost('semester');
        $data=[
            'kode_matkul'=>$kodematkul,
            'matkul'=>$nama,
            'sks'=>$sks,
            'semester'=>$semester,
        ];
        $this->db->table('makul')->insert($data);
        return redirect()->back()->with('success', 1);

    }

}