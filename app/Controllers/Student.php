<?php

namespace App\Controllers;
use App\Models\MJurnal;
use App\Controllers\BaseController;

class Student extends BaseController
{
    protected $helpers = ['custom'];
    function __construct()
    {
    $this->MJurnal = new MJurnal;
    }
    public function index()
    {
        return view('Students/Home');
    }

    public function FormJurnal()
    {
        return view('Students/Jurnal/FormJurnal');
    }


    public function saveJurnal()
    {
        
        if ($this->request->isAJAX()) {
        $p_tadarus = $this->request->getPost('p_tadarus');
        $p_bacaqr = $this->request->getPost('p_bacaqr');
        $p_tambahtahfidz = $this->request->getPost('p_tambahtahfidz');
        $p_murajaah = $this->request->getPost('p_murajaah');
        $p_ceramah = $this->request->getPost('p_ceramah');
        $tanggal_jurnal = $this->request->getPost('tgl_jurnal');
        $siswa_id= $this->request->getPost('siswa_id');
        $rombel_id = $this->request->getPost('rombel_id');

        $cekTgl = $this->MJurnal->CekTanggal($rombel_id,$siswa_id,$tanggal_jurnal);
        if ($cekTgl) {
            $rule_tgl = 'required|is_unique[jurnal_ramadhan.tgl_jurnal]';
        }else{
            $rule_tgl = 'required';
        }

        $this->validate= \Config\Services::validation();
        $validate = $this->validate(
        [
        'tgl_jurnal' => [
        'label'  => 'Tanggal Jurnal',
        'rules'  => $rule_tgl,
        'errors' => [
        'required' => '{field} Harus Diisi',
        'is_unique'=>'{field} Telah Diisi'

        ]
        ],
        'p_puasa' => [
        'label'  => 'Keterangan Puasa',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Harus Dipilih'
        ]
        ],
        // 'sholat' => [
        // 'label'  => 'Keterangan Sholat',
        // 'rules'  => 'required',
        // 'errors' => [
        // 'required' => '{field} Harus Diisi'
        // ]
        // ],
        'p_tadarus' => [
        'label'  => 'Keterangan Tadarus',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Harus Dipilih'
        ]
        ],
        'tadarus_mulai' => [
        'label'  => 'Keterangan Tadarus',
        'rules'  => $p_tadarus=='Ya'? 'required':'string',
        'errors' => [
        'required' => '{field} Harus Diisi'
        ]
        ],
        'tadarus_sampai' => [
        'label'  => 'Keterangan Tadarus',
        'rules'  => $p_tadarus=='Ya'? 'required':'string',
        'errors' => [
        'required' => '{field} Harus Diisi'
        ]
        ],

        'p_bacaqr' => [
        'label'  => 'Keterangan Baca Al-Quran',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Harus Dipilih'
        ]
        ],
        'bacaqr_mulai' => [
        'label'  => 'Keterangan Baca Al-Quran',
        'rules'  => $p_bacaqr=='Ya'? 'required':'string',
        'errors' => [
        'required' => '{field} Harus Diisi'
        ]
        ],
        'bacaqr_sampai' => [
        'label'  => 'Keterangan Baca Al-Quran',
        'rules'  => $p_bacaqr=='Ya'? 'required':'string',
        'errors' => [
        'required' => '{field} Harus Diisi'
        ]
        ],

        'p_tambahtahfidz' => [
        'label'  => 'Keterangan Tahfidz',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Harus Dipilih'
        ]
        ],
        'tambahhafidz' => [
        'label'  => 'Keterangan Tahfidz',
        'rules'  => $p_tambahtahfidz=='Ya'? 'required':'string',
        'errors' => [
        'required' => '{field} Harus Diisi'
        ]
        ],

        'p_murajaah' => [
        'label'  => 'Keterangan Murajaah',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Harus Dipilih'
        ]
        ],
        'murajaah' => [
        'label'  => 'Keterangan Murajaah',
        'rules'  => $p_murajaah=='Ya'? 'required':'string',
        'errors' => [
        'required' => '{field} Harus Diisi'
        ]
        ],

        'p_ceramah' => [
        'label'  => 'Keterangan Ceramah',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Harus Dipilih'
        ]
        ],

        'ceramah_nm_masjid' => [
        'label'  => 'Keterangan Masjid',
        'rules'  => $p_ceramah=='Ya'? 'required':'string',
        'errors' => [
        'required' => '{field} Harus Diisi'
        ]
        ],
        'ceramah_judul' => [
        'label'  => 'Keterangan Judul',
        'rules'  => $p_ceramah=='Ya'? 'required':'string',
        'errors' => [
        'required' => '{field} Harus Diisi'
        ]
        ],
        'ceramah_link' => [
        'label'  => 'Link Dokumentasi',
        'rules'  => $p_ceramah=='Ya'? 'required':'string',
        'errors' => [
        'required' => '{field} Harus Diisi'
        ]
        ],
        'is_valid' => [
        'label'  => 'Link Dokumentasi',
        'rules'  => 'required',
        'errors' => [
        'required' => 'Harap Konfirmasi Dulu'
        ]
        ],

        ]
        );

        if (!$validate) {
        $msg = [
        'error' => [
        'tgl_jurnal' => $this->validate->getError('tgl_jurnal'),
        'p_puasa' => $this->validate->getError('p_puasa'),
        // 'sholat' => $this->validate->getError('sholat'),

        'p_tadarus' => $this->validate->getError('p_tadarus'),
        'tadarus_mulai' => $this->validate->getError('tadarus_mulai'),
        'tadarus_sampai' => $this->validate->getError('tadarus_sampai'),

        'p_bacaqr' => $this->validate->getError('p_bacaqr'),
        'bacaqr_mulai' => $this->validate->getError('bacaqr_mulai'),
        'bacaqr_sampai' => $this->validate->getError('bacaqr_sampai'),

        'p_tambahtahfidz' => $this->validate->getError('p_tambahtahfidz'),
        'tambahhafidz' => $this->validate->getError('tambahhafidz'),

        'p_murajaah' => $this->validate->getError('p_murajaah'),
        'murajaah' => $this->validate->getError('murajaah'),

        'p_ceramah' => $this->validate->getError('p_ceramah'),       
        'ceramah_nm_masjid' => $this->validate->getError('ceramah_nm_masjid'),
        'ceramah_judul' => $this->validate->getError('ceramah_judul'),
        'ceramah_link' => $this->validate->getError('ceramah_link'),
        'is_valid' => $this->validate->getError('is_valid')
        ]
        ];
        }else{
            
            
            $data = [
            'periode_id' => 1,
            'rombel_id' => $rombel_id,
            'siswa_id' =>$siswa_id,
            'tgl_jurnal'=>$tanggal_jurnal,
            'puasa'=>$this->request->getPost('p_puasa'),
            'sholat'=>serialize($this->request->getPost('sholat')),
            'tadarus_mulai'=>$this->request->getPost('tadarus_mulai'),
            'tadarus_sampai'=>$this->request->getPost('tadarus_sampai'),
            'bcquran_mulai'=>$this->request->getPost('bacaqr_mulai'),
            'bcquran_sampai'=>$this->request->getPost('bacaqr_sampai'),
            'hafalan'=>$this->request->getPost('tambahhafidz'),
            'murajaah'=>$this->request->getPost('murajaah'),
            'masjid'=>$this->request->getPost('ceramah_nm_masjid'),
            'judul_ceramah'=>$this->request->getPost('ceramah_judul'),
            'link_ceramah'=>$this->request->getPost('ceramah_link')

            ];
            $this->MJurnal->save($data);
            $msg = ['sukses'=>200];
            
  
        }


        echo json_encode($msg);
        }
      

        // dd($_POST);
        // dd($_POST);
       
    }


    // JurnalkuId
    public function JurnalkuId($id = null)
    {
        $data =['jurnal'=> $this->MJurnal->find($id)];
        return view('Students/Jurnal/JurnalID', $data);
    }

    
    
    
    public function TargetRamadhan()
    {
        $data =['target'=> $this->MJurnal->TampilData('target_ramadhan',['student_id'=> session('student_ses')])];
        return view('Students/Jurnal/TargetRamadhan',$data);
    }
    // SaveTargetRamadhan
    public function SaveTargetRamadhan()
    {
        
        if ($this->request->isAJAX()) {
         $data = [
            'student_id'=>$this->request->getPost('id'),
            'target'=>$this->request->getPost('target')
            ];
            $this->MJurnal->SimpanData('target_ramadhan',$data);
            $msg = ['sukses'=>200];
        echo json_encode($msg);
        }
      

       
    }


    public function Cetak($id = null)
    {
        $studentID = intval($id);
        $std = $this->MJurnal->DetailSiswa($studentID);
        $jurnal= $this->MJurnal->TampilData('jurnal_ramadhan',['siswa_id'=> $studentID]);
        $target= $this->MJurnal->TampilData('target_ramadhan',['student_id'=> $studentID]);

        $data =[
            'std'=> $std,
            'jurnal'=> $jurnal,
            'target'=>$target
         ];
        return view('Students/Jurnal/Cetak', $data);
    }

    public function HapusRow()
    {
       if ($this->request->isAJAX()) {
        $id = $this->request->getPost('id');
        $table = $this->request->getPost('table');
        $del = $this->MJurnal->HapusData($table,['id'=>$id]);
        $msg = ['res'=> 200];
        echo json_encode($msg);
       }
    }


function Logout()
{
session()->remove('student_ses');
return redirect()->to(base_url('/'));
    
}
    
}
