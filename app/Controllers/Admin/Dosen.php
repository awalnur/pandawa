<?php

namespace App\Controllers\Admin;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Dosen extends AdminController
{
    function __construct()
    {
 
    }

    function index(){

        if (session('logged_in')==false){
            return redirect()->to(base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){
            return redirect()->to(base_url('/admin/auth'));
        }
        $data['dosen']=$this->db->table('dosen')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/dosen',$data);
        echo view('admin/template/footer');
    }
    function tambah(){
        if (session('logged_in')==false){
            return redirect()->to(base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){
            return redirect()->to(base_url('/admin/auth'));
        }
        echo view('admin/template/header');
        echo view('admin/tambahdosen');
        echo view('admin/template/footer');
    }

    function edit($id=null){
        if (session('logged_in')==false){
            return redirect()->to(base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){
            return redirect()->to(base_url('/admin/auth'));
        }
        if($id==null){
            return redirect()->back()->with('error', 'NID tidak ditemukan');
        }else{
            $data['dosen']=$this->db->table('dosen')->where(['nid'=>$id])->get()->getRow();
//            var_dump($data);
            echo view('admin/template/header');
            echo view('admin/editdosen', $data);
            echo view('admin/template/footer');
        }
    }
    function savedosen($edit=false, $id=null){
        $nid=$this->request->getPost('nid');
        $namadosen=$this->request->getPost('nama');
        $gelar=$this->request->getPost('gelar');
        $foto='default.png';
        $data=[
            'nid'=>$nid,
            'nama_dosen'=>$namadosen,
            'gelar'=>$gelar,
            'foto_dosen'=>$foto,
        ];
        if ($edit=='edit'){
            if (empty($nid)){
                $d=[
                    'nama_dosen'=>$namadosen,
                    'gelar'=>$gelar,
                    'foto_dosen'=>$foto,
                ];
            }else{
                $d=$data;
            }
//            var_dump($d);
            $this->db->table('dosen')->update($d, ['nid'=>$id]);
//            return redirect()->to()->with('success', 1);


                if (empty($nid)) {
                    return redirect()->to('/admin/dosen/edit/' . $id)->with('success', 1);
                }else{
                    return redirect()->to('/admin/dosen/edit/' . $nid)->with('success', 1);

                }
        }else{
            $this->db->table('dosen')->insert($data);
            return redirect()->to('/admin/dosen/tambah')->with('success', 1);
        }
    }

    function importing(){
        $file = $this->request->getFile('importDosen');
        if($file){
            $fileLocation = $file->getTempName();
            //baca file

            $reader 	= new Xlsx();
            $spreadsheet 	= $reader->load($fileLocation);

            $sheet	= $spreadsheet->getActiveSheet()->toArray();
            //looping untuk mengambil data
            $berhasil=0;
            foreach ($sheet as $idx => $data) {
                //skip eeindex 1 karena title excel
                if($idx==0){
                    continue;
                }
                $nid = $data[1];
                $nama = $data[2];
                $gelar = $data[3];
//                // insert data
                $ins=$this->db->query(
                    "INSERT INTO dosen (`nid`, `nama_dosen`, `gelar`) VALUES 
                    ('$nid', '".htmlentities($nama)."','".htmlentities($gelar)."');");
                echo $ins;
                if ($ins){
                    $resp[$idx]='berhasil';
                    $berhasil++;
                }else{
                    $resp[$idx]='Gagal';
                }
            }
            return redirect()->back()->with('success','Import Berhasil, ('.$berhasil.'/'.sizeof($resp).')');
        }else{
            return redirect()->back()->with('gagalss','Terjadi kesalahan saat Import data');
        }

    }
    function delete(){
        $nid=$this->request->getPost('id');
        $res=$this->db->table('dosen')->delete(['nid'=>$nid]);
        if ($res){
            $ret['success']=1;
        }else{
            $ret['success']=0;
        }
        echo json_encode($ret);
    }
}