<?php

namespace App\Controllers\Admin;

class Penilaian extends AdminController
{
    function index(){
        $tab=$this->db->table('dosen');
        $tab->select('dosen.nid,nama_dosen, gelar, sum(nilai.nilai) as totalnilai,sum(nilai.nilai)/count(nilai.nilai) as rata')->join('nilai', 'dosen.nid=nilai.nid', 'left')->groupBy('dosen.nid');
        $data['dosen']=$tab->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/penilaian',$data);
        echo view('admin/template/footer');
    }
    function detail($nid=null){
        if ($nid==null){

        }else{
            $tab=$this->db->table('kelas')->select('nid, kelas.kode_matkul, matkul')->join('makul', 'kelas.kode_matkul=makul.kode_matkul', 'inner')->where('kelas.nid='.$nid)->groupBy('makul.kode_matkul');
            $data['detpen']=$tab->get()->getResultObject();
//            echo json_encode($data['detpen']);
            $sd=1;
            $data['jenis']=[];
            foreach ($data['detpen'] as $datum) {
                $n=$this->db->table('jenis_pertanyaan')->select('pertanyaan.idjenis_pertanyaan,kode_matkul, jenis, sum(nilai) as tnilai, sum(nilai)/count(nilai) as rata')->join('pertanyaan', 'jenis_pertanyaan.idjenis_pertanyaan=pertanyaan.idjenis_pertanyaan', 'inner')->join('nilai', 'pertanyaan.idpertanyaan=nilai.id_pertanyaan', 'inner')->where('nilai.kode_matkul', $datum->kode_matkul)->groupBy('idjenis_pertanyaan')->get()->getResultObject();
                foreach ($n as $item) {
                    $data['jenis'][$datum->kode_matkul][$item->idjenis_pertanyaan]=['totalnilai'=>$item->tnilai, 'rata'=>$item->rata];
                }
            }
            $data['jp']=$this->db->table('jenis_pertanyaan')->get()->getResultObject();

            echo view('admin/template/header');
            echo view('admin/detailpenilaian',$data);
            echo view('admin/template/footer');
        }

    }
}