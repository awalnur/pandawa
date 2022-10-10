<?php

namespace App\Controllers\Admin;

class Pengaturan extends AdminController
{
    function index(){
        $data=[];
        echo view('admin/template/header');
        echo view('admin/pengaturan',$data);
        echo view('admin/template/footer');
    }
}