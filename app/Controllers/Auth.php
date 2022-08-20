<?php

namespace App\Controllers;

class Auth extends BaseController
{
    function index(){
//        echo view('login');
        echo "auht";
    }
    function login(){
        echo view('front/login');
    }
}