<?php

namespace App\Controllers\Admin;

use Fpdf\Fpdf;
use Mpdf\Mpdf;

class Penilaian extends AdminController
{
    function index()
    {
        $tab = $this->db->table('dosen');
        $tab->select('dosen.nid,nama_dosen, gelar, sum(nilai.nilai) as totalnilai,sum(nilai.nilai)/count(nilai.nilai) as rata')->join('nilai', 'dosen.nid=nilai.nid', 'left')->groupBy('dosen.nid');
        $data['dosen'] = $tab->get()->getResultObject();
        echo view('admin/template/header');
        echo view('admin/penilaian', $data);
        echo view('admin/template/footer');
    }

    function detail($nid = null)
    {
        if ($nid == null) {

        } else {
            $tab = $this->db->table('kelas')->select('nid, kelas.kode_matkul, matkul')->join('makul', 'kelas.kode_matkul=makul.kode_matkul', 'inner')->where('kelas.nid=' . $nid)->groupBy('makul.kode_matkul');
            $data['detpen'] = $tab->get()->getResultObject();
//            echo json_encode($data['detpen']);
            $sd = 1;
            $data['jenis'] = [];
            foreach ($data['detpen'] as $datum) {
                $n = $this->db->table('jenis_pertanyaan')->select('pertanyaan.idjenis_pertanyaan,kode_matkul, jenis, sum(nilai) as tnilai, sum(nilai)/count(nilai) as rata')->join('pertanyaan', 'jenis_pertanyaan.idjenis_pertanyaan=pertanyaan.idjenis_pertanyaan', 'inner')->join('nilai', 'pertanyaan.idpertanyaan=nilai.id_pertanyaan', 'inner')->where('nilai.kode_matkul', $datum->kode_matkul)->groupBy('idjenis_pertanyaan')->get()->getResultObject();
                foreach ($n as $item) {
                    $data['jenis'][$datum->kode_matkul][$item->idjenis_pertanyaan] = ['totalnilai' => $item->tnilai, 'rata' => $item->rata];
                }
            }
            $data['jp'] = $this->db->table('jenis_pertanyaan')->get()->getResultObject();

            echo view('admin/template/header');
            echo view('admin/detailpenilaian', $data);
            echo view('admin/template/footer');
        }

    }

    function preview()
    {
        echo view('cetaks');
    }

    function report($idprodi = 1, $thaka = 20221)
    {
        $prodi = $this->db->table('prodi')->where('idprodi', $idprodi)->get()->getRow();

//        header("Content-type:application/pdf");
        $filename = "AppName_Day_gen_" . date("Y-m-d_H-i") . ".pdf";

        $this->response->setHeader('Content-Type', 'application/pdf');

//        $fpdf= new Fpdf();
        $pdf = new FPDF();
        $pdf->AddPage('P', 'LEGAL');
        $pdf->Image('assets/img/logounsiq.jpg', 70, 100, 70);

        $pdf->SetFont('Times', 'B', 18);
        $pdf->setXY(10, 220);
        $pdf->Cell(195, 10, 'LAPORAN HASIL', 0, 1, 'C');
        $pdf->Cell(195, 10, 'PENILAIAN DAN EVALUASI DOSEN OLEH MAHASISWA ', 0, 1, 'C');
        $pdf->Cell(195, 10, '(PEDOMA)', 0, 1, 'C');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(195, 10, 'SEMESTER '.(substr($thaka,-1)==1)?"SEMESTER GANJIL":"GENAP", 0, 1, 'C');
        $pdf->Cell(195, 10, substr($thaka, 0,4), 0, 1, 'C');
        $pdf->AddPage('L', 'Legal');
        $pdf->SetFont('Times', 'B', 14);

        $pdf->Cell(335, 6, 'REKAPITULASI DATA PENILAIAN DAN EVALUASI DOSEN OLEH MAHASISWA (PEDOMA)', 0, 1, 'C');
        $pdf->Cell(335, 6, ' '.(substr($thaka,-1)==1)?"SEMESTER GANJIL ":"SEMESTER GENAP ".substr($thaka, 0,4), 0, 1, 'C');
        $pdf->SetFont('Times', '', 12);

        $pdf->Cell(335, 4, strtoupper($prodi->nama_prodi . ' | ' . $prodi->fakultas), 0, 1, 'C');
//        $pdf->Cell(335,1,'',0,);
        $pdf->ln();
        $pdf->Cell(335, 0, '', 1);
        $pdf->Cell(335, 4, '', 0);
        $pdf->ln();
        $w = array(40, 35, 40, 45);
        // Header
        $pdf->ln();
        $jenispert = $this->db->table('jenis_pertanyaan')->get()->getResult();
        $perta = $this->db->table('pertanyaan')->countAll();
        $pdf->SetFillColor(255, 134, 128);
        $pdf->Cell(10, 14, 'NO', 1, 0, 'C', true);

        $pdf->Cell(100, 14, 'NAMA DOSEN', 1, 0, 'C', true);

        foreach ($jenispert as $item) {
            $pdf->Cell(160 / sizeof($jenispert), 7, $item->jenis, 1, 0, 'C', true);

        }
        $pdf->Cell(35, 14, 'RESPONDEN', 1, 0, 'C', true);
        $pdf->Cell(15, 14, 'NRR', 1, 0, 'C', true);
        $pdf->Cell(15, 14, 'IKM', 1, 0, 'C', true);
        $pdf->setXY(120, 45);
        for ($i = 1; $i <= $perta; $i++) {
            $pdf->Cell(8, 7, $i, 1, 0, 'C', true);
        }

        $pdf->ln();
        $dosen = $this->db->table('dosen')->select(' dosen.nid as nid, nama_dosen, count(nama_dosen) as totalkelas')->join('kelas', 'dosen.nid=kelas.nid', 'left')->where(['kelas.idprodi' => $idprodi, 'thn_akademik' => $thaka])->groupBy('dosen.nid')->get()->getResult();
        $n = 1;
        foreach ($dosen as $item) {
            $nilai = $this->db->table('nilai')->join('kelas', 'nilai.nid=kelas.nid', 'inner')->where(['kelas.idprodi' => $idprodi, 'kelas.thn_akademik' => $thaka, 'kelas.nid'=>$item->nid]);
            $pdf->Cell(10, 7, $n++, 1, 0, 'C');
            $pdf->Cell(100, 7, ' ' . $item->nama_dosen, 1, 0, 'L');
            foreach ($jenispert as $items) {
                $sub = $this->db->table('pertanyaan')->where(['idjenis_pertanyaan' => $items->idjenis_pertanyaan])->get()->getResult();
//                e$pdf->Cell(160/sizeof($jenispert),7,$item->jenis,1,0,'C',true);
                foreach ($sub as $it) {
                    $sub = $nilai->select('AVG(nilai) as rata')->where(['id_pertanyaan' => $it->idpertanyaan, 'nilai.nid' => $item->nid])->get()->getRow();
                    if ($sub->rata != 0) {
                        $pdf->Cell(8, 7, number_format($sub->rata, 1), 1, 0, 'C');
                    } else {
                        $pdf->Cell(8, 7, '0', 1, 0, 'C');
                    }
                }
            }
            $resp = $nilai->select('count(id_pertanyaan) as responden, avg(nilai) as rata,  avg(nilai)*25 as ikm')->where(['nilai.nid' => $item->nid])->get()->getRow();
            $pdf->Cell(35, 7, $resp->responden, 1, 0, 'C');
            $pdf->Cell(15, 7, (!empty($resp->rata)) ? number_format($resp->rata, 1) : "0", 1, 0, 'C');
            $pdf->Cell(15, 7, (!empty($resp->ikm)) ? number_format($resp->ikm, 1) : "0", 1, 0, 'C');
            $pdf->ln();

        }
        $pdf->SetFont('Times', 'B', 12);

        $tol = $nilai->select('avg(nilai) as tol, COUNT(nilai) as total')->get()->getRow();
        $pdf->Cell(270, 7, "TOTAL NILAI INDEX KEPUASAN MAHASISWA", 1, 0, 'L');
        $pdf->Cell(65, 7, (!empty($tol->tol)) ? number_format($tol->tol, 1) : '0', 1, 1, 'C');

        $pdf->Cell(270, 7, "JUMLAH RESPONDEN", 1, 0, 'L');
        $pdf->Cell(65, 7, (!empty($tol->total)) ? number_format($tol->total, 1) : '0', 1, 1, 'C');

        $pdf->Cell(270, 8, "TOTAL NILAI IKM SETELAH DI KONVERSI", 1, 0, 'L');
        $pdf->Cell(65, 8, (!empty($tol->tol)) ? number_format($tol->tol, 1) * 25 : '0', 1, 1, 'C');

        $pdf->Cell(270, 8, "TOTAL MUTU PELAYANAN", 1, 0, 'L');
        $pdf->Cell(65, 8, (!empty($tol->tol)) ? number_format($tol->tol, 1) : '0', 1, 1, 'C');

        $pdf->Cell(270, 8, "KINERJA PELAYANAN", 1, 0, 'L');
        $pdf->Cell(65, 8, (!empty($tol->tol)) ? number_format($tol->tol, 1) : '0', 1, 1, 'C');


        foreach ($dosen as $ldosen) {
            $pdf->addPage('L', 'LEGAL');

//            $nilai = $this->db->table('nilai')->join('kelas', 'nilai.nid=kelas.nid', 'inner')->where(['kelas.idprodi' => $idprodi, 'kelas.thn_akademik' => $thaka]);
            //perdosen
            $pdf->Cell(335, 6, 'REKAPITULASI DATA PENILAIAN DAN EVALUASI DOSEN OLEH MAHASISWA (PEDOMA)', 0, 1, 'C');
            $pdf->Cell(335, 6, 'SEMESTER GENAP '.substr($thaka, 0,4), 0, 1, 'C');
            $pdf->SetFont('Times', '', 12);

            $pdf->Cell(335, 4, strtoupper($prodi->nama_prodi . ' | ' . $prodi->fakultas), 0, 1, 'C');
            //        $pdf->Cell(335,1,'',0,);
            $pdf->ln();
            $pdf->Cell(335, 0, '', 1);
            $pdf->Cell(335, 4, '', 0);
            $pdf->ln(1);
            $pdf->Cell(30, 8, 'NIDN');
            $pdf->setFont('Times', 'B', 12);
            $pdf->Cell(100, 8, ' : ' . $ldosen->nid, 0, 1);

            $pdf->setFont('Times', '', 12);
            $pdf->Cell(30, 8, 'NAMA');
            $pdf->setFont('Times', 'B', 12);
            $pdf->Cell(100, 8, ' : ' . $ldosen->nama_dosen, 0, 1);

            $pdf->ln(3);
            $pdf->Cell(10, 10, "No", 1, 0, 'C', true);
            $pdf->Cell(40, 10, "Aspek", 1, 0, 'C', true);
            $pdf->Cell(220, 10, "Pertanyaan", 1, 0, 'C', true);
            $pdf->Cell(23, 10, "Nilai", 1, 0, 'C', true);
            $pdf->Cell(15, 10, "Bobot", 1, 0, 'C', true);
            $pdf->Cell(22, 10, "Nilai IKM", 1, 1, 'C', true);

            $pdf->setFont('Times', '', 11);
            $nom = 1;
            foreach ($jenispert as $jpitem) {
                $sub = $this->db->table('pertanyaan')->where(['idjenis_pertanyaan' => $jpitem->idjenis_pertanyaan])->get()->getResult();
                //                e$pdf->Cell(160/sizeof($jenispert),7,$item->jenis,1,0,'C',true);

                foreach ($sub as $it) {
                    $nper = $this->db->table('nilai')->select('avg(nilai) as nilair')->join('kelas', 'nilai.nid=kelas.nid', 'INNER')->where(['nilai.nid' => $ldosen->nid, 'kelas.idprodi' => $idprodi, 'nilai.id_pertanyaan' => $it->idpertanyaan, 'nilai.thn_akademik' => $thaka])->get()->getRow();
                    $nils=number_format((!empty($nper->nilair)) ? $nper->nilair : 0, 1) ;
                    $pdf->Cell(10, 5, $nom++, 1, 0, 'C');
                    $pdf->Cell(40, 5, $jpitem->jenis, 1, 0, 'L');
                    $pdf->Cell(220, 5, $it->pertanyaan, 1, 0, 'L');
                    $pdf->Cell(13, 5, $nils, 1, 0, 'C');
                    $pdf->Cell(10, 5, $this->huruf($nils), 1, 0, 'C');
                    $pdf->Cell(15, 5, "25", 1, 0, 'C');
                    $pdf->Cell(22, 5, $nils*25, 1, 1, 'C');

                }
            }

            $pdf->setFont('Times', 'B', 11);
            $nitotal=$nilai->select('avg(nilai) as n,count(nim) as responden')->where('nid', $ldosen->nid)->get()->getRow();
            $respp=$nilai->select('count(DISTINCT nim) as responden')->where('nid', $ldosen->nid)->groupBy('nim')->get()->getRow();
//            var_dump($responden);
            if ($respp==null){
                $responden="0";
            }else{
                $responden=$respp->responden;
            }
            if (empty($nitotal->n)){
                $ntotal=0;
            }else{
                $ntotal=$nitotal->n;

            }
            $pdf->Cell(270, 5, ' Jumlah Nilai Indeks Kepuasan Mahasiswa', 1, 0, 'L', true);
            $pdf->Cell(60, 5, '  '.number_format($ntotal,1), 1, 1, 'l', true);

            $pdf->setFont('Times', 'B', 11);
            $pdf->Cell(270, 5, ' Jumlah Responden', 1, 0, 'L', true);
            $pdf->Cell(60, 5, "  ".(($responden!=null)?$responden:0)." MAHASISWA", 1, 1, 'l', true);

            $pdf->setFont('Times', 'B', 11);
            $pdf->Cell(270, 5, ' Nilai IKM Setelah Di Konversi', 1, 0, 'L', true);
            $pdf->Cell(60, 5, "   ".number_format($ntotal*25,1 ), 1, 1, 'l', true);

            $pdf->setFont('Times', 'B', 11);
            $pdf->Cell(270, 5, ' Mutu Pelayanan', 1, 0, 'L', true);
            $pdf->Cell(60, 5, '   '.$this->huruf(number_format($ntotal,1)), 1, 1, 'l', true);

            $pdf->setFont('Times', 'B', 11);
            $pdf->Cell(270, 5, ' Kinerja Pelayanan', 1, 0, 'L', true);
            $pdf->Cell(60, 5, '   '.$this->kinerja(number_format($ntotal,1)), 1, 1, 'l', true);
        }
//endDosen
        $pdf->Output();

    }

    function huruf($nilai = 0)
    {
        return ($nilai>= 3.5)? "A":(($nilai>=2.5)?"B":(($nilai>=2)?"C":(($nilai>=1)?"D":"E")));
    }

    function kinerja($nilai = 0)
    {
        return ($nilai>= 3.5)? "Sangat Baik":(($nilai>=2.5)?"Baik":(($nilai>=2)?"Cukup":(($nilai>=1)?"Buruk":"Sangat Buruk")));
    }
}
