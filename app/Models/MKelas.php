<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
class MKelas extends \CodeIgniter\Model
{
    protected $table = 'kelas';
    protected $column_order = ['kelas.kelas', 'prodi.nama_prodi', 'dosen.nama_dose', 'makul.matkul'];
    protected $column_search = ['kelas.kelas', 'prodi.nama_prodi', 'dosen.nama_dose'];
    protected $order = ['kelas.id_kelas' => 'DESC'];
    protected $request;
    protected $db;
    protected $dt;
    protected $prodi=0;
    protected $angkatan=0;
    function __construct(RequestInterface $request, $prodi, $angkatan){
        parent::__construct();
        
            
        error_reporting(0);
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table($this->table);
        $this->dt->join('makul', 'kelas.kode_matkul=makul.kode_matkul', 'inner')->join('dosen', 'kelas.nid=dosen.nid','inner')->join('prodi', 'kelas.idprodi=prodi.idprodi', 'inner')->join("(SELECT count(nim) as totalmhs, id_kelas FROM mhs_kelas GROUP BY id_kelas) as c", 'c.id_kelas=kelas.id_kelas', 'left' );
    }
    private function _get_datatables_query(){
        $i = 0;
        foreach ($this->column_search as $item){
            if($this->request->getPost('search')['value']){
                if($i===0){
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                }
                else{
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if(count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if($this->request->getPost('order')){
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        }
        else if(isset($this->order)){
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }
    function get_datatables(){
        $this->_get_datatables_query();
        if($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));

        $query = $this->dt->get();
        return $query->getResult();
    }
    function count_filtered(){
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }
    public function count_all(){
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
}

    
