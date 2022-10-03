<?php

namespace App\Controllers\Admin;

class Pengaturan extends AdminController
{
    function index(){
        echo view('admin/template/header');
//        echo view('admin/matakuliah',$data);
        echo view('admin/template/footer');
    }
}