<?php

namespace App\Controllers\Admin;

class Home extends AdminController
{
    function index(){
        echo view('admin/template/header');
        echo view('admin/home');
        echo view('admin/template/footer');
    }
}