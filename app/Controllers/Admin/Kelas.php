<?php

namespace App\Controllers\Admin;

use App\Models\MhsPrd;
use App\Models\MKelas;
use Config\Services;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Kelas extends AdminController
{
    
    public function __construct()
    {
        if (session('logged_in')==false){
            return redirect()->to(base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){
            return redirect()->to(base_url('/admin/auth'));
        }
    }
    function index(){
        if (session('logged_in')==false){
            return redirect()->to(base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){
            return redirect()->to(base_url('/admin/auth'));
        }   
        $data['thnakademik']=$this->db->table('thn_akademik')->orderBy('thn_akademik', 'DESC')->get()->getResult();
        $data['prodi']=$this->db->table('prodi')->get()->getResult();
        $data['matakuliah']=$this->db->table('makul')->get()->getResult();
        echo view('admin/template/header');
        echo view('admin/kelas', $data);
        echo view('admin/template/footer');
    }
    function getKelas($ta = 0, $prodi = 0, $matkul =0){
           
        $request = Services::request();
        $m_icd = new MKelas($request, $ta, $prodi, $matkul);
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
                $row[] = '<a href="'.base_url('/admin/kelas/viewkelas/'.$list->idkelas).'" class="btn bg-navy btn-sm"><i class="fa fa-eye"></i></a> <button class="btn btn-danger btn-sm"  id="hapuskelas" data-val="'.$list->idkelas.'"><i class="fa fa-trash"></i></button>';
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
        
    function tambahkls(){
        if (session('logged_in')==false){
            return redirect()->to(base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){
            return redirect()->to(base_url('/admin/auth'));
        }
        $data['angkatan']=$this->db->table('mhs')->select('angkatan')->groupBy('angkatan')->get()->getResult();
        $data['ta']=$this->db->table('thn_akademik')->get()->getResult();
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
        if (session('logged_in')==false){
        return redirect()->to(base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){
            return redirect()->to(base_url('/admin/auth'));
        }
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
                echo "s";
                return redirect()->to(base_url('/admin/kelas/tambahkls'))->with('sukses', 'Tambah Kelas berhasil');
                exit();
            }else{
                return redirect()->to(base_url('/admin/kelas/tambahkls'))->with('gagal', 'Kelas dengan dosen yang sama sudah tersedia');

            }
    }
    function importing(){
        $file = $this->request->getFile('importkelas');
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
                if($data[1]==0){
                    continue;
                }
                $kode_matkul = $data[1];
                $nid = $data[2];
                $kelas = $data[3];
                $thn_akademik = $data[4];
                $idprodi = $data[5];
//                // insert data
                $ins=$this->db->query(
                    "INSERT INTO kelas (`kode_matkul`, `nid`, `kelas`, `thn_akademik`, `idprodi` ) VALUES 
                    ('".htmlentities($kode_matkul)."', '".htmlentities($nid)."', '".htmlentities($kelas)."','".htmlentities($thn_akademik)."', '".htmlentities($idprodi)."');");
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
    function viewkelas($id=null){
        if (session('logged_in')==false){
            return redirect()->to(base_url('/admin/auth'));
        }
        if (session('logged_as')!='admin'){
            return redirect()->to(base_url('/admin/auth'));
        }
        if ($id==null){
            return redirect()->back();
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
           
            // $res=$this->db->table('kelas')->delete(['id_kelas'=>$kelas]);

            if ($res){
                $ret['success']=1;
            }else{
                $ret['success']=0;
            }
            echo json_encode($ret);
        }else{

            $kelas=$this->request->getPost('id');
            $d2=$this->db->table('mhs_kelas')->delete(['id_kelas'=>$kelas]);
            if($d2){

                $res=$this->db->table('kelas')->delete(['id_kelas'=>$kelas]);

                if ($res){
                    $ret['success']=1;
                }else{
                    $ret['success']=0;
                }
            }else{

                $res=$this->db->table('kelas')->delete(['id_kelas'=>$kelas]);

                $ret['success']=0;

            }
            echo json_encode($ret);
        }
    }
}