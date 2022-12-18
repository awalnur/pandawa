<?php

namespace App\Controllers;

class Home extends BaseController
{
//    function __construct()
//    {
//        if (empty(session('nim'))){
//            return redirect()->to(base_url('auth'));
//        }
//    }

    public function index()
    {
        if(empty(session('logged_in'))){
            return redirect()->to(base_url('auth'));
        }
        if(empty(session('nim'))){
            return redirect()->to(base_url('auth'));
        }
        
        $dos=$this->db->table('mhs_kelas')->join('kelas', 'mhs_kelas.id_kelas=kelas.id_kelas')->join('dosen', 'kelas.nid=dosen.nid')->join('makul', 'kelas.kode_matkul=makul.kode_matkul')->join('thn_akademik', 'kelas.thn_akademik=thn_akademik.thn_akademik', 'inner')->where('thn_akademik.aktif=1')->where('mhs_kelas.nim='.session('nim'));
        $data['dosen']=$dos->get()->getResultObject();
//        var_dump($data['dosen']);
        $data['nama']=session('nama');
        $data['thn_akademik']=$this->db->table('thn_akademik')->where('aktif=1')->get()->getRow()->thn_akademik;
        echo view('front/template/header');
        echo view('front/home',$data);
    }
    function penilaian($dosen){
        if (empty(session('nim'))){
            return redirect()->to(base_url('auth'));
        }
        $data['nid']=$dosen;
        $data['dosen']=$this->db->table('dosen')->join('kelas', 'dosen.nid=kelas.nid', 'inner')->join('makul', 'kelas.kode_matkul=makul.kode_matkul', 'inner')->join('thn_akademik', 'kelas.thn_akademik=thn_akademik.thn_akademik', 'inner')->where('thn_akademik.aktif=1')->where('dosen.nid', $dosen)->get()->getRow();
        $jp=$this->db->table('jenis_pertanyaan')->get()->getResult();
        $data['jenispertanyaan']=$jp;
        foreach ($jp as $jitem) {
            $pa=$this->db->table('pertanyaan')->where('idjenis_pertanyaan', $jitem->idjenis_pertanyaan)->get()->getResultObject();
            $pertanyaan[$jitem->idjenis_pertanyaan]=$pa;
        }
        $data['pertanyaan']=$pertanyaan;
        echo view('front/template/header');
        echo view('front/penilaian', $data);
    }
    function saveNilai($nid){
        if (empty(session('nim'))){
            return redirect()->to(base_url('auth'));
        }
//        var_dump($this->request->getPost());
        if (empty($nid)){

            $laporan['success']=444;
            return json_encode($laporan);
        }else {

            $thakademik = $this->request->getPost('thaka');
            $idkelas = $this->request->getPost('idkelas');
            $this->db->table('mhs_kelas')->where(['id_kelas'=> $idkelas,'nim'=>session('nim')])->update(['dinilai'=>1]);
     
//                echo $idkelas;
            $pertanyaan = $this->db->table('pertanyaan')->get()->getResult();
            foreach ($pertanyaan as $pitem) {
                $nilai = $this->request->getPost('radioanswer' . $pitem->idpertanyaan);
                if (!empty($nilai)) {
                    $nl = $nilai;
                } else {
                    $nl = 1;
                }
                $data2 = [
                    'id_pertanyaan' => $pitem->idpertanyaan,
                    'nid' => $nid,
                    'nim' => session('nim'),
                    'nilai' => $nl,
                    'thn_akademik' => $thakademik,
                ];
                $this->db->table('nilai')->insert($data2);
            }
            $ks = $this->request->getPost('kritiksaran');
            $insertks = $this->db->table('kritiksaran');
            $insks = [
                'nid' => $nid,
                'nim' => session('nim'),
                'kritiksaran' => $ks,
                'thn_akademik' => $thakademik,
            ];
            $insertks->insert($insks);
            $laporan['success']=1;
        return json_encode($laporan);
        }

        
    }
}
