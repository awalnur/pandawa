<?php

namespace App\Controllers\Admin;

use App\Models\MhsPrd;
use Config\Services;

class Kelas extends AdminController
{
    function index(){
        $data['kelas']=$this->db->table('kelas')->join('makul', 'kelas.kode_matkul=makul.kode_matkul', 'inner')->join('dosen', 'kelas.nid=dosen.nid','inner')->join("(SELECT count(nim) as totalmhs, id_kelas FROM mhs_kelas GROUP BY id_kelas) as c", 'c.id_kelas=kelas.id_kelas', 'left' )->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/kelas', $data);
        echo view('admin/template/footer');
    }
    function tambahkls(){
        echo view('admin/template/header');
        echo view('admin/tambahkelas');
        echo view('admin/template/footer');
    }
    function getDosen(){
        if(!isset($_GET['searchTerm'])){
            $json = [];
        }else{
            $search = $_GET['searchTerm'];
            $dos=$this->db->table('dosen')->like('nama_dosen',$search)->get();
            $json = [];
            foreach($dos->getResultObject() as $d){
                $json[] = ['id'=>$d->nid, 'text'=>$d->nama_dosen];
            }
        }

        echo json_encode($json);
    }
    function getmhs(){
        if(!isset($_GET['searchTerm'])){
            $json = [];
        }else{
            $search = $_GET['searchTerm'];
            $dos=$this->db->table('mhs')->like('nama_mhs',$search)->get();
            $json = [];
            foreach($dos->getResultObject() as $d){
                $json[] = ['id'=>$d->nim, 'text'=>$d->nama_mhs, 'nim'=>$d->nim];
            }
        }

        echo json_encode($json);
    }
    function getsmsh($prodi=null,$angkatan=null){
                $ds=$this->db->table('mhsprodi');
                if ($angkatan==null and $prodi==null) {
                    $lists=$ds->get()->getResult();
                }else{
                    $lists=$ds->where('idprodi',$prodi)->where('angkatan',$angkatan)->get()->getResult();

                }
                if (sizeof($lists)==0){
                    $data=[];
                }else{

                }

                $no=0;
                foreach ($lists as $list) {
                    $no++;
                    $row = [];
                    $row[] = $list->nim;
                    $row[] = $list->nama_mhs;
                    $row[] = $list->angkatan;
                    $row[] = $list->nama_prodi;
                    $data[] = $row;
                }

                $output = [
                    'recordsTotal' => sizeof($lists),
                    'data' => $data
                ];

                echo json_encode($output);
            }


}