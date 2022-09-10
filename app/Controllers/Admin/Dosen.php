<?php

namespace App\Controllers\Admin;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Dosen extends AdminController
{
    function index(){

        $data['dosen']=$this->db->table('dosen')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/dosen',$data);
        echo view('admin/template/footer');
    }
    function tambah(){
        echo view('admin/template/header');
        echo view('admin/tambahdosen');
        echo view('admin/template/footer');
    }
    function savedosen(){
        $nid=$this->request->getPost('nid');
        $namadosen=$this->request->getPost('nama');
        $gelar=$this->request->getPost('gelar');
//        $foto=$this->request->getPost('foto_dosen');
        $foto='default.png';
        $data=[
            'nid'=>$nid,
            'nama_dosen'=>$namadosen,
            'gelar'=>$gelar,
            'foto_dosen'=>$foto,
        ];
        $this->db->table('dosen')->insert($data);

        return redirect()->back()->with('success', 1);

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
                    "INSERT INTO `pandawa`.dosen (`nid`, `nama_dosen`, `gelar`) VALUES 
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