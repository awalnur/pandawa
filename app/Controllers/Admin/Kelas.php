<?php

namespace App\Controllers\Admin;

use App\Models\MhsPrd;
use App\Models\MKelas;
use Config\Services;

class Kelas extends AdminController
{

    function __construct()
    {
        if (session('logged_in')==false){
            header('location:'.base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){ 
            header('location:'.base_url('/admin/auth'));
        }
    }
    function getKelas($ta = 0, $prodi = 0){
        $request = Services::request();
        $m_icd = new MKelas($request, $ta, $prodi);
        if ($request->getMethod(true) == 'POST') {
            $lists = $m_icd->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            //            $WhereAll
            foreach ($lists as $list) {

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama_prodi;
                $row[] = $list->matkul;
                $row[] = $list->kelas;
                $row[] = $list->nama_dosen.$list->gelar;
                $row[] = $list->thn_akademik;
                $row[] = $list->totalmhs;
                $row[] = '<a href="'.base_url('/admin/kelas/viewkelas/'.$list->id_kelas).'" class="btn bg-navy btn-sm"><i class="fa fa-eye"></i></a> <button class="btn btn-danger btn-sm"  id="hapuskelas" data-val="'.$list->id_kelas.'"><i class="fa fa-trash"></i></button>';
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $m_icd->count_all(),
                "recordsFiltered" => $m_icd->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }
        function index(){
        $data['kelas']=$this->db->table('kelas')->select('*, kelas.id_kelas as idkelas')->join('makul', 'kelas.kode_matkul=makul.kode_matkul', 'inner')->join('dosen', 'kelas.nid=dosen.nid','inner')->join('prodi', 'kelas.idprodi=prodi.idprodi', 'inner')->join("(SELECT count(nim) as totalmhs, id_kelas FROM mhs_kelas GROUP BY id_kelas) as c", 'c.id_kelas=kelas.id_kelas', 'left' )->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/kelas', $data);
        echo view('admin/template/footer');
    }
    function tambahkls(){
        $data['angkatan']=$this->db->table('mhs')->select('angkatan')->groupBy('angkatan')->get()->getResult();
        $data['ta']=$this->db->table('thn_akademik')->get()->getResult();
//        var_dump($data);
        echo view('admin/template/header');
        echo view('admin/tambahkelas',$data);
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

    function getmhs($prodi=null){
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

    function getmk(){
        if(!isset($_GET['searchTerm'])){
            $json = [];
        }else{
            $search = $_GET['searchTerm'];
            $dos=$this->db->table('makul')->like('matkul',$search)->get();
            $json = [];
            foreach($dos->getResultObject() as $d){
                $json[] = ['id'=>$d->kode_matkul, 'text'=>$d->matkul];
            }
        }

        echo json_encode($json);
    }
    function addmhs(){
        $data['suc']=0;
        $data['all']=0;
        $data['succees']=1;
        $mhs=$this->request->getPost('msh');
        $idkelas=$this->request->getPost('idkelas');
        if($mhs!=null){
            foreach ($mhs as $item) {
                $cek=$this->db->table('mhs_kelas')->where(['id_kelas'=>$idkelas, 'nim'=>$item])->countAllResults();
                $data['all']++;

                if($cek==0){
                    $inst=$this->db->table('mhs_kelas')->insert(['nim'=>$item,'id_kelas'=>$idkelas]);
                    $data['suc']++;
                }
            }
        }
        return json_encode($data);
    }
    function getsmsh($prodi=null, $angkatan=null){
                $ds=$this->db->table('mhsprodi');
                if ($angkatan==null and $prodi==null) {
                    $lists=$ds->get()->getResult();
                }elseif ($angkatan==null and $prodi!=null) {
                    $lists=$ds->where('idprodi',$prodi)->get()->getResult();
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

    function savekelas(){
//        var_dump($this->request->getPost());
        $mk=$this->request->getPost('mkk');
        $idd=$this->request->getPost('dosen');
        $kl=$this->request->getPost('kelas');
        $idl=$this->request->getPost('pilprodi');
        $ta=$this->request->getPost('ta');
            $ins=['kode_matkul'=>$mk,
                  'nid'=>$idd,
                  'kelas'=>$kl,
                  'thn_akademik'=>$ta,
                'idprodi'=>$idl];
            $tes=$this->db->table('kelas')->where($ins)->countAll();
            if ($tes>0) {
                $inskelas = $this->db->table('kelas')->insert($ins);
                $iid = $this->db->insertID();
                if (!empty($this->db->insertID())) {
                    $kmhs = $this->request->getPost('msh');
                    if(!empty($kmhs)){
                        for ($i = 0; $i < sizeOf($kmhs); $i++) {
                            $ins = $this->db->table('mhs_kelas')->insert(['nim' => $kmhs[$i], 'id_kelas' => $iid]);
                        }
                    }
                }
                return redirect()->to(base_url('/admin/kelas'))->with('success', 'Kelas dan siswa berhasil ditambahkan');
            }else{
                return redirect()->to(base_url('/admin/kelas'))->with('gagal', 'Kelas dengan dosen yang sama sudah tersedia');

            }
    }
    function editkelas(){

    }
    function viewkelas($id=null){
        if ($id==null){
            redirect()->back();
        }
        $data['angkatan']=$this->db->table('mhs')->select('angkatan')->groupBy('angkatan')->get()->getResult();
        $data['ta']=$this->db->table('thn_akademik')->get()->getResult();
        $data['kelas']=$this->db->table('kelas')->join('makul', 'kelas.kode_matkul=makul.kode_matkul', 'inner')->join('dosen', 'kelas.nid=dosen.nid','inner')->join("(SELECT count(nim) as totalmhs, id_kelas FROM mhs_kelas GROUP BY id_kelas) as c", 'c.id_kelas=kelas.id_kelas', 'left' )->join('prodi', 'kelas.idprodi=prodi.idprodi')->where('kelas.id_kelas', $id)->get()->getRow();
        $data['mhs']=$this->db->table('mhs_kelas')->join('mhs', 'mhs_kelas.nim=mhs.nim', 'inner')->where('mhs_kelas.id_kelas', $id)->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/detailkelas', $data);
        echo view('admin/template/footer');
    }
    function delete($mhs=null){
        if($mhs!=null){

            $kelas=$this->request->getPost('id');
            $nim=$this->request->getPost('nim');
            $res=$this->db->table('mhs_kelas')->delete(['id_kelas'=>$kelas,'nim'=>$nim]);
//            $res=$this->db->table('kelas')->delete(['id_kelas'=>$kelas]);

            if ($res){
                $ret['success']=1;
            }else{
                $ret['success']=0;
            }
            echo json_encode($ret);
        }else{

            $kelas=$this->request->getPost('id');
            $d2=$this->db->table('mhs_kelas')->delete(['id_kelas'=>$kelas]);
            $res=$this->db->table('kelas')->delete(['id_kelas'=>$kelas]);

            if ($res){
                $ret['success']=1;
            }else{
                $ret['success']=0;
            }
            echo json_encode($ret);
        }
    }
}