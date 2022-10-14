<?php

namespace App\Controllers\Admin;

class Pengaturan extends AdminController
{
    function index(){
        $data['thnak']=$this->db->table('thn_akademik')->get()->getResult();
        echo view('admin/template/header');
        echo view('admin/pengaturan', $data);
        echo view('admin/template/footer');
    }
    function cpassword(){
        if(empty(session('id_user'))){
            redirect()->to('admin/auth');
        }else{
            $id=session('id_user');
            $passbaru=$this->request->getPost('upasswordbaru');
            $passwordlama=$this->request->getPost('passlama');
            $cek=$this->db->table('user');
            $ceksplama=$cek->where('id_user', $id)->get()->getRow();
            $pbaru=password_hash($passbaru, PASSWORD_DEFAULT);
            if (password_verify($passwordlama, $ceksplama->password)){
                $lap['suc']=1;
                $cek->update(['password'=>$pbaru]);
            }else{
                $lap['error']=1;
            }
            echo json_encode($lap);

        }
    }
    function setaktif(){
        $setedit=$this->db->table('thn_akademik');
        $thn=$this->request->getPost('tahunajaran');
        if (!empty($thn)){
            $setedit->update(['aktif'=>0],['aktif'=>1]);
            $setedit->update(['aktif'=>1], ['thn_akademik'=> $thn]);
            $res['success']=1;
        }else{
            $res['error']=1;
        }
        echo json_encode($res);

    }
    function saveta(){
        $thnajara=$this->request->getPost('tahunajaran');
        $ins=$this->db->table('thn_akademik')->insert(['thn_akademik'=>$thnajara, 'aktif'=>0]);
        if ($ins){
            $resp['success']=1;
        }else{
            $resp['success']=0;
        }
        echo json_encode($resp);
    }
}