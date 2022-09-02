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
        $data['prodi']=$this->db->table('prodi');
        echo view('admin/template/header');
        echo view('admin/tambahmhs', $data);
        echo view('admin/template/footer');
    }
}