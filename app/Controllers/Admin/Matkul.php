<?php

namespace App\Controllers\Admin;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Matkul extends AdminController
{
    function index(){
        $data['matkul']=$this->db->table('makul')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/matakuliah',$data);
        echo view('admin/template/footer');
    }
    function tambah(){
        echo view('admin/template/header');
        echo view('admin/tambahmatkul');
        echo view('admin/template/footer');
    }

    function edit($kodematkul=null){
        if($kodematkul==null){
            return redirect()->back()->with('error', 'kode matakuliah tidak ditemukan');
        }
        $data['matkul']=$this->db->table('makul')->where(['kode_matkul'=>$kodematkul])->get()->getRow();
        echo view('admin/template/header');
        echo view('admin/editmatkul',$data);
        echo view('admin/template/footer');
    }
    function savematkul($edit=false, $kodemk=null){
        $kodematkul=$this->request->getPost('kodematkul');
        $nama=$this->request->getPost('nama');
        $sks=$this->request->getPost('sks');
        $semester=$this->request->getPost('semester');
        $data=[
            'kode_matkul'=>$kodematkul,
            'matkul'=>$nama,
            'sks'=>$sks,
            'semester'=>$semester,
        ];
        if ($edit==false){
            $f=$this->db->table('makul')->insert($data);

            if ($f){
                return redirect()->to(base_url('/admin/matkul/tambah'))->with('success', 1);

            }else{
                return redirect()->to(base_url('/admin/matkul/tambah'))->with('error', 1);
            }
        }else{
            if(empty($kodematkul)){
                $d=[
                    'matkul'=>$nama,
                    'sks'=>$sks,
                    'semester'=>$semester,
                ];
            }else{
                $d=$data;
            }
            $f=$this->db->table('makul')->update($d, ['kode_matkul'=>$kodemk]);
            if ($f){
                return redirect()->to(base_url('/admin/matkul/edit/'.$kodemk))->with('success', 1);
            }else{
                return redirect()->to(base_url('/admin/matkul/edit/'.$kodemk))->with('error', 1);
            }
        }
    }
    function importing(){
        $file = $this->request->getFile('importMatkul');
        if($file){
            $fileLocation = $file->getTempName();

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
                $kmk = $data[1];
                $mk = $data[2];
                $sks = (int)$data[3];
                $semester = (int)$data[4];
//                // insert data
                $ins=$this->db->query(
                    "INSERT INTO `makul` (`kode_matkul`, `matkul`, `sks`, `semester`) VALUES 
                    ('$kmk', '$mk', '$sks', '$semester');");
                echo $ins;
                if ($ins){
                    $resp[$idx]='berhasil';
                    $berhasil++;
                }else{
                    $resp[$idx]='Gagal';
                }
            }
//            var_dump($resp);
            return redirect()->back()->with('success','Import Berhasil, ('.$berhasil.'/'.sizeof($resp).')');
        }else{
            return redirect()->back()->with('gagalss','Terjadi kesalahan saat Import data');
        }

    }
    function delete(){
        $km=$this->request->getPost('id');
        $res=$this->db->table('makul')->delete(['kode_matkul'=>$km]);
        if ($res){
            $ret['success']=1;
        }else{
            $ret['success']=0;
        }
        echo json_encode($ret);
    }

}