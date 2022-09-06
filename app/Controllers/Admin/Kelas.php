<?php

namespace App\Controllers\Admin;

class Kelas extends AdminController
{
    function index(){
        $data['kelas']=$this->db->table('kelas')->join('makul', 'kelas.kode_matkul=makul.kode_matkul', 'inner')->join('dosen', 'kelas.nid=dosen.nid','inner')->join("(SELECT count(nim) as totalmhs, id_kelas FROM mhs_kelas GROUP BY id_kelas) as c", 'c.id_kelas=kelas.id_kelas', 'left' )->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/kelas', $data);
        echo view('admin/template/footer');
    }
    function tambahkls(){

    }

}