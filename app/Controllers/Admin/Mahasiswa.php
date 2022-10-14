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
    function mhs_sync(){
        $pas=$this->request->getPost('password');
        $user=$this->db->table('user')->where('id_user', session('id_user'))->get()->getRow();
        if(password_verify($pas, $user->password)) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://ebfis.feb-unsiq.ac.id/api/mahasiswa",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            $responses = (object)json_decode($response, true); //because of true, it's in an array
            $dt = $responses->data;
            $jurusan = ['akuntansi' => 1, 'manajemen' => 2, 'perbankan syariah' => 3];
            $suc = 0;
            $er = 0;
            $all = 0;
            $this->db->table('mhs')->emptyTable();
            foreach ($dt as $datum) {
                $all++;
                $nim = $datum['nim'];
                $nama = $datum['nama'];
                $angkatan = substr($datum['nim'], 0, 4);
                $idprodi = $jurusan[$datum['prodi']];
                $password = password_hash($nim, PASSWORD_DEFAULT);
                $datains = ['nim' => $nim, 'nama_mhs' => $nama, 'angkatan' => $angkatan, 'idprodi' => $idprodi, 'password' => $password];
                $d = $this->db->table('mhs')->insert($datains);
                if ($d) {
                    $suc++;
                } else {
                    $er++;
                }
            }
            $data['success'] = $suc;
            $data['error'] = $er;
            $data['all'] = $all;
        }else{
            $data['paserror']=1;
        }
        echo json_encode($data);
    }
}