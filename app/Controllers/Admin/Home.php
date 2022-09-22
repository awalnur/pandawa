<?php

namespace App\Controllers\Admin;

class Home extends AdminController
{
    function index(){
        $mahasiswa=$this->db->table('mhs')->countAll();
        $dos=$this->db->table('dosen')->countAll();
        $makul=$this->db->table('makul')->countAll();
        $data['mahasiswa']=$mahasiswa;
        $data['dosen']=$dos;
        $data['makul']=$makul;
        echo view('admin/template/header');
        echo view('admin/home',$data);
        echo view('admin/template/footer');
    }
}
