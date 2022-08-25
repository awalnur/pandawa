<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['nama']=session('nama');
        return view('front/home',$data);
    }
    function penilaian(){
        return view('front/penilaian');
    }
}
