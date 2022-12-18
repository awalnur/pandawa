<?php

namespace App\Controllers\Admin;

class Home extends AdminController
{
    function index(){
        if (session('logged_in')==false){
            return redirect()->to(base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){
            return redirect()->to(base_url('/admin/auth'));
        }
        
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
