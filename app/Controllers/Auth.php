<?php

namespace App\Controllers;

class Auth extends BaseController
{
    function index(){
//        echo view('login');
            return $this->login();
    }
    function login(){
        if (!empty(session('error'))){
            $data['error']='<div class="alert alert-danger alert-dismissible"  role="alert">
                        '.session('error').'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }else{
            $data['error']='';
        }
        echo view('front/login', $data);
    }
    function auth(){
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
//echo $password;
//        echo password_hash('123', PASSWORD_DEFAULT)."<br>";
        if (!empty($username) & !empty($password)){
            $a=$this->db->table('mhs');
            $a->where('nim', $username);
            $s=$a->get()->getRow();
            if (!empty($s)) {
                if (password_verify($password, $s->password)) {

                    $newdata = [
                        'nim'  => $s->nim,
                        'nama'     => $s->nama_mhs,
                        'idprodi'     => $s->idprodi,
                        'logged_in' => true,
                    ];
                    session()->set($newdata);
                    return redirect()->to(base_url('home'));
                } else {
                    return redirect()->to(base_url('auth'))->with('error', 'Username atau Password salah');
                }
            }else{
                return redirect()->to(base_url('auth/login'))->with('error', 'Username atau Password salah');
            }
        }

    }
    function logout(){
        session()->destroy();
        return redirect()->to(base_url());
    }
}