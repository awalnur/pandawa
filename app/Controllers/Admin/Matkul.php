<?php

namespace App\Controllers\Admin;

class Matkul extends AdminController
{
    function index(){
        $data['matkul']=$this->db->table('makul')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/matakuliah',$data);
        echo view('admin/template/footer');    }
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
        $f=$this->db->table('makul')->insert($data);
        if ($f){
            return redirect()->back()->with('success', 1);

        }else{
            return redirect()->back()->with('error', 1);

        }

    }

}