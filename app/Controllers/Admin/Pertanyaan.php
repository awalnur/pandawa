<?php

namespace App\Controllers\Admin;

class Pertanyaan extends AdminController
{
    function tambah($j=null){
        if (empty($j)){
            $data['jenis']=$this->db->table('jenis_pertanyaan')->get()->getResultObject();
            echo view('admin/template/header');
            echo view('admin/tambahpertanyaan',$data);
            echo view('admin/template/footer');
        }else{
            echo view('admin/template/header');
            echo view('admin/tambahjenispertanyaan');
            echo view('admin/template/footer');

        }
    }
    function jenis(){
        $data['jenis']=$this->db->table('jenis_pertanyaan')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/jenispertanyaan', $data);
        echo view('admin/template/footer');
    }
}