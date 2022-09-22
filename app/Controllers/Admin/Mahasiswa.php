<?php

namespace App\Controllers\Admin;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use App\Models\MhsModel;
class Mahasiswa extends AdminController
{
    public function __construct(){
        $this->mhs = new MhsModel();
    }
    function index(){
        $data['mahasiswa']=$this->db->table('mhs')->join('prodi', 'mhs.idprodi=prodi.idprodi', 'inenr')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/mahasiswa', $data);
        echo view('admin/template/footer');
    }
    function tambahmhs(){
        $data['prodi']=$this->db->table('prodi')->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/tambahmhs', $data);
        echo view('admin/template/footer');
    }
    function importing(){
        $file = $this->request->getFile('importMhs');
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
                $nim = $data[1];
                $nama = $data[2];
                $prodi = (int)$data[3];
//                // insert data
                $ins=$this->mhs->query(
                    "INSERT INTO `mhs` (`nim`, `nama_mhs`, `angkatan`, `idprodi`, `password`) VALUES 
                    ('$nim', '".htmlentities($nama)."', '".substr($nim, 0, 4)."','".str_replace(' ', '', $prodi)."', '".password_hash($nim,PASSWORD_DEFAULT)."');");
                echo $ins;
                if ($ins){
                    $resp[$idx]='berhasil';
                    $berhasil++;
                }else{
                    $resp[$idx]='Gagal';
                }
            }
            return redirect()->to(base_url('/admin/mahasiswa'))->with('success','Import Berhasil, ('.$berhasil.'/'.sizeof($resp).')');
        }else{
            return redirect()->to(base_url('/admin/mahasiswa'))->with('gagalss','Terjadi kesalahan saat Import data');
        }

    }
    function savemahasiswa(){

        $nim=$this->request->getPost('nim');
                echo password_hash('123', PASSWORD_DEFAULT)."<br>";

//        echo password_hash($nim, PASSWORD_DEFAULT);
        $nama=$this->request->getPost('nama');
        $angkatan=$this->request->getPost('angkatan');
        $prodi=$this->request->getPost('prodi');
//        $foto=$this->request->getPost('foto_dosen');
        $foto='default.png';
        $spass=password_hash(''.$nim.'', PASSWORD_DEFAULT);
        $data=[
            'nim'=>$nim,
            'nama_mhs'=>$nama,
            'angkatan'=>$angkatan,
            'idprodi'=>$prodi,
            'password'=>$spass,
        ];
        $this->db->table('mhs')->insert($data);
        return redirect()->back()->with('success', 1);

    }
    function delete(){
            $nim=$this->request->getPost('id');
            $res=$this->db->table('mhs')->delete(['nim'=>$nim]);
            if ($res){
                $ret['success']=1;
            }else{
                $ret['success']=0;
            }
            echo json_encode($ret);
    }

}