<?php

namespace App\Controllers\Admin;

class Pertanyaan extends AdminController
{

    function __construct()
    {
        if (session('logged_in')==false){
            header('location:'.base_url('/admin/auth'));
        }
    }

    function index(){
        return $this->pertanyaan();
    }
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
    function ljenis(){
        $data['data']=$this->db->table('jenis_pertanyaan')->get()->getResultObject();
        return $data;
    }
    function savejenis($edit=null){
        if ($edit==null){

            $jenis=$this->request->getPost('jenis');
            $data=['jenis'=>$jenis];
            $ins=$this->db->table('jenis_pertanyaan')->insert($data);
            $d['success']=1;
        }else{

            $id=$this->request->getPost('id');
            $jenis=$this->request->getPost('jenis');
            $data=['jenis'=>$jenis];
            $ins=$this->db->table('jenis_pertanyaan')->update($data, ['idjenis_pertanyaan'=>$id]);
            $d['success']=1;
        }
        return json_encode($d);
    }

    function delete($s='pert'){
        if ($s!='pert'){
            $id=$this->request->getPost('id');
            $res=$this->db->table('jenis_pertanyaan')->delete(['idjenis_pertanyaan'=>$id]);
            if ($res){
                $ret['success']=1;
            }else{
                $ret['success']=0;
            }
        }else{
            $id=$this->request->getPost('id');
            $res=$this->db->table('pertanyaan')->delete(['idpertanyaan'=>$id]);
            if ($res){
                $ret['success']=1;
            }else{
                $ret['success']=0;
            }
        }
        return json_encode($ret);
    }
    function pertanyaan($id=null){
        if (!empty($id)){
            $data['pertanyaan']=$this->db->table('pertanyaan')->join('jenis_pertanyaan', 'pertanyaan.idjenis_pertanyaan=jenis_pertanyaan.idjenis_pertanyaan')->where('pertanyaan.idjenis_pertanyaan', $id)->get()->getResultObject();
        }else{
            $data['pertanyaan']=$this->db->table('pertanyaan')->join('jenis_pertanyaan', 'pertanyaan.idjenis_pertanyaan=jenis_pertanyaan.idjenis_pertanyaan')->get()->getResultObject();
        }
        $data['jenis']=$this->db->table('jenis_pertanyaan')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/pertanyaan', $data);
        echo view('admin/template/footer');
    }

    function savepertanyaan($edit=null){
        if ($edit==null){

            $jenis=$this->request->getPost('jenis');
            $pertanyaan=$this->request->getPost('pertanyaan');
            $data=['idjenis_pertanyaan'=>$jenis,
                'pertanyaan'=>$pertanyaan];
            $ins=$this->db->table('pertanyaan')->insert($data);
            if ($ins){
                $d['success']=1;
            }
        }else{

            $jenis=$this->request->getPost('jenis');
            $id=$this->request->getPost('id');
            $pertanyaan=$this->request->getPost('pertanyaan');
            $data=['idjenis_pertanyaan'=>$jenis,
                'pertanyaan'=>$pertanyaan];
            $ins=$this->db->table('pertanyaan')->update($data,['idpertanyaan'=>$id]);
            if ($ins){
                $d['success']=1;
            }
        }
        return json_encode($d);
    }
}