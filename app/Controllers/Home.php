<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(empty(session('logged_in'))){
            return redirect()->to(base_url('auth'));
        }
        $data['nama']=session('nama');
        return view('front/home',$data);
    }
    function penilaian(){
        $jp=$this->db->table('jenis_pertanyaan')->get()->getResult();
        $data['jenispertanyaan']=$jp;
        foreach ($jp as $jitem) {
            $pa=$this->db->table('pertanyaan')->where('idjenis_pertanyaan', $jitem->idjenis_pertanyaan)->get()->getResultObject();
            $pertanyaan[$jitem->idjenis_pertanyaan]=$pa;
        }
        $data['pertanyaan']=$pertanyaan;
        return view('front/penilaian', $data);
    }
}
