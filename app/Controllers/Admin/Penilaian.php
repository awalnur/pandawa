<?php

namespace App\Controllers\Admin;

use Mpdf\Mpdf;

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
    function preview(){
        echo view('cetaks');
    }
    function report(){

//        header("Content-type:application/pdf");
        $filename = "AppName_Day_gen_".date("Y-m-d_H-i").".pdf";
        header("Content-Type: application/pdf");
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Content-Transfer-Encoding: binary ");
// Send headers

        $html='';

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'c',
            'format'=>'legal-P',
            'margin_left' => 32,
            'margin_right' => 25,
            'margin_top' => 27,
            'margin_bottom' => 25,
            'margin_header' => 16,
            'margin_footer' => 13
        ]);
        $mpdf->addPage('P');
//        $mpdf->showImageErrors = true;
        $s='
    <img src="assets/img/logounsiq.jpg" alt="" style="margin-top: 150px">

<h1 style="font-family: \'Times New Roman\', serif; text-align: center; margin-top: 40px; font-size: 14pt">
    LAPORAN HASIL
</h1>

<h1 style="font-family: \'Times New Roman\', serif; text-align: center; margin-top: 5px; font-size: 14pt">
    PENILAIAN DAN EVALUASI DOSEN OLEH MAHASISWA
</h1>

<h1 style="font-family: \'Times New Roman\', serif; text-align: center; margin-top: 5px; font-size: 14pt">
    PEDOMA
</h1>';
        $mpdf->writeHtml($s, 2);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->addPage('L');
        $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

// Load a stylesheet
//        $stylesheet = file_get_contents('assets/mpdfstyletables.css');

//        $mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text
        $mpdf->WriteHTML($html,1);

        $mpdf->Output('php://output' );
//        return response($mpdf->Output('test.pdf',"I"),200)->header('Content-Type','application/pdf');

    }
}