<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MJurnal;
use App\Models\MStudent;

class Walas extends BaseController
{
    protected $helpers = ['custom'];
    function __construct()
    {
    $this->MJurnal = new MJurnal;
    $this->MStudent = new MStudent;
    }
    public function index()
    {
        $data = [
            'student'=> $this->MStudent->AkunClass(MyClass()->id)
        ];
        return view('Teachers/Home',$data);
    }
    public function ListStudent()
    {
        $data = ['student'=> $this->MStudent->ByClass(MyClass()->id)];
        return view('Teachers/Student/index', $data);
    }

    // JurnalSiswa
    public function JurnalSiswa($id)
    {
        $data = [
            'student'=> $this->MJurnal->DetailSiswa($id),
            'jurnal'=> $this->MJurnal->ByStudent($id),
            'target'=> $this->MJurnal->TampilData('target_ramadhan',['student_id'=> $id])
        ];
        return view('Teachers/Student/list_jurnal', $data);
    }

    // FormConfim
    public function FormConfim()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $data = ['siswa'=> $this->MStudent->find($id)];
            $msg = ['view'=> view('Teachers/Student/confirm', $data)];
            echo json_encode($msg);
        }
    }
    // StoreConfim
    public function StoreConfim()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $data = [
                'id'=> $id,
                'is_active'=> $this->request->getVar('acc')
            ];
            $this->MStudent->save($data);
            $msg = ['sukses'=>200];

            echo json_encode($msg);
        }
    }
      // MoveKelas
      public function MoveKelas()
      {
          if ($this->request->isAJAX()) {
              $id = $this->request->getVar('id');
              $data = [
                  'id'=> $id,
                  'rombel_id'=> $this->request->getVar('kelas')
              ];
              $this->MStudent->save($data);
              $msg = ['sukses'=>200];
  
              echo json_encode($msg);
          }
      }

    // JurnalByDate
    public function JurnalByDate ($rombel,$tgl)
    {
        $data = ['tgl'=> $tgl,'jurnal'=> $this->MJurnal->ByDate($rombel,$tgl)];
        return view('Teachers/Jurnal/ByTanggal', $data);
    }

 


    function Logout()
{
session()->remove('walas_ses');
return redirect()->to(base_url('/'));
    
}
}
