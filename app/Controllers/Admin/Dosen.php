<?php

namespace App\Controllers\Admin;

class Dosen extends AdminController
{
    function index(){

        $data['dosen']=$this->db->table('dosen')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/dosen',$data);
        echo view('admin/template/footer');
    }
    function tambah(){
        echo view('admin/template/header');
        echo view('admin/tambahdosen');
        echo view('admin/template/footer');
    }
    function savedosen(){
        $nid=$this->request->getPost('nid');
        $namadosen=$this->request->getPost('nama');
        $gelar=$this->request->getPost('gelar');
//        $foto=$this->request->getPost('foto_dosen');
        $foto='default.png';
        $data=[
            'nid'=>$nid,
            'nama_dosen'=>$namadosen,
            'gelar'=>$gelar,
            'foto_dosen'=>$foto,
        ];
        $this->db->table('dosen')->insert($data);
    }
}