<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(empty(session('logged_in'))){
            return redirect()->to(base_url('auth'));
        }
        $dos=$this->db->table('mhs_kelas')->join('kelas', 'mhs_kelas.id_kelas=kelas.id_kelas')->join('dosen', 'kelas.npm=dosen.npm')->join('makul', 'kelas.kode_matkul=makul.kode_matkul')->where('mhs_kelas.nim='.session('nim'));
        $data['dosen']=$dos->get()->getResultObject();
        var_dump($data['dosen']);
        $data['nama']=session('nama');
        return view('front/home',$data);
    }
    function penilaian($dosen){
        $data['npm']=$dosen;
        $jp=$this->db->table('jenis_pertanyaan')->get()->getResult();
        $data['jenispertanyaan']=$jp;
        foreach ($jp as $jitem) {
            $pa=$this->db->table('pertanyaan')->where('idjenis_pertanyaan', $jitem->idjenis_pertanyaan)->get()->getResultObject();
            $pertanyaan[$jitem->idjenis_pertanyaan]=$pa;
        }
        $data['pertanyaan']=$pertanyaan;
        return view('front/penilaian', $data);
    }
    function saveNilai($npm){
        var_dump($this->request->getPost());
        $pertanyaan=$this->db->table('pertanyaan')->get()->getResult();
        foreach ($pertanyaan as $pitem) {
            echo $this->request->getPost('radioanswer'.$pitem->idpertanyaan);
        }
        $ks=$this->request->getPost('kritiksaran');
        $thakademik='20222';
        $insertks=$this->db->table('kritiksaran');
        $insks=[
            'npm'=>$npm,
//            'nim'=>session('nim'),
            'nim'=>'12',
            'kritiksaran'=>$ks,
            'thn_akademik'=>$thakademik,
        ];
        $insertks->insert($insks);
    }
}
