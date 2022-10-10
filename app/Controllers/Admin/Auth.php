<?php

namespace App\Controllers\Admin;

class Auth extends AdminController
{
    function index(){
//                echo password_hash('123', PASSWORD_DEFAULT)."<br>";

        if (!empty(session('error'))){
        $data['error']='<div class="alert alert-danger alert-dismissible"  role="alert">
                        '.session('error').'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    }else{
        $data['error']='';
    }
        echo view('admin/login', $data);
    }
    function ActLogin(){
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
//echo $password;
//        echo password_hash('123', PASSWORD_DEFAULT)."<br>";
        if (!empty($username) & !empty($password)){
            $a=$this->db->table('user');
            $a->where('username', $username);
            $s=$a->get()->getRow();
            if (!empty($s)) {
                if (password_verify($password, $s->password)) {

                    $newdata = [
                        'id_user'  => $s->id_user,
                        'username'     => $s->username,
                        'nama'     => $s->nama,
                        'logged_in' => true,
                    ];
                    session()->set($newdata);
                    return redirect()->to(base_url('admin/home'));
                } else {
                    return redirect()->to(base_url('admin/auth'))->with('error', 'Username atau Password salah');
                }
            }else{
                return redirect()->to(base_url('admin/auth'))->with('error', 'Username atau Password salah');
            }
        }
    }

    function logout(){
        session_destroy();
        return redirect()->to(base_url('/admin/auth'));
    }

}