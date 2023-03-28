<?php

namespace App\Controllers;
use App\Libraries\Hash;
use App\Models\MJurnal;
use App\Models\MStudent;
use App\Models\MTeacher;
use App\Models\MAuth;
use App\Controllers\BaseController;

class Super extends BaseController
{
    protected $helpers = ['custom'];
    function __construct()
    {
        $this->MAuth = new MAuth;
    $this->MJurnal = new MJurnal;
    $this->MStudent = new MStudent;
    $this->MTeacher = new MTeacher;
    }
    public function index()
    {
       $data = ['student'=> $this->MStudent->PermintaanGabung()];
        return view('Supers/Home', $data);
    }

    public function EduId($id)
    {
        $data = [
            'edu'=>  $this->MStudent->EduLevel($id),
            'kelas'=> $this->MStudent->KelasEdu($id)];
    //    dd($id);
    return view('Supers/Student/by_edulevel', $data);
    }

    // ShowStudentRoom
    public function ShowStudentRoom()
    {
        if ($this->request->isAJAX()) {
           $id = $this->request->getVar('rombel_id');
           $data = [
            'rombel'=> $this->MStudent->Rombel($id),
           'student'=>$this->MStudent->ByClass($id)];
           $msg = ['view'=> view('Supers/Student/showclass',$data)];

           echo json_encode($msg);
        }
    }
    public function JurnalSiswa($id)
    {
        $student = $this->MStudent->find($id);
        $data = [
            'rombel'=> $this->MStudent->Rombel($student['rombel_id']),
            'student'=> $student,
            'jurnal'=> $this->MJurnal->ByStudent($id)];
        return view('Supers/Student/list_jurnal', $data);
    }

    public function Jurnal($date)
    {
       $data = [
        'tgl'=> $date,
        'jurnal'=> $this->MJurnal->JurnalByDate($date)];
        return view('Supers/Jurnal/list_jurnal', $data);
    }

    public function ListWalas()
    {
       $data = ['walas'=> $this->MTeacher->Walas()];
        return view('Supers/Walas/index', $data);
    }

    // AktivasiWalas
    public function AktivasiWalas()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $status = $this->request->getVar('status');
            $data = [
                'id'=> $id,
                'is_active'=> $status==1 ? 0 : 1];
            $this->MTeacher->save($data);
            $msg = ['sukses'=>200];
            echo json_encode($msg);
        }
    }

    // ListSantri
    public function ListSantri($key)
    {
        $data = ['student'=> $this->MAuth->AllSantri($key)];
        return view('Supers/Student/index', $data);
    }



        // FormConfim
        public function FormConfim()
        {
            if ($this->request->isAJAX()) {
                $id = $this->request->getVar('id');
                $data = ['siswa'=> $this->MStudent->find($id)];
                $msg = ['view'=> view('Supers/Student/confirm', $data)];
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


       // AktivasiWalas
       public function ResetPasswordWalas()
       {
           if ($this->request->isAJAX()) {
               $id = $this->request->getVar('id');
               $walas =  $this->MTeacher->find($id); 

               $data = [
                   'id'=> $id,
                   'password'=>Hash::make($walas['nuptk'])];
               $this->MTeacher->save($data);
               $msg = ['sukses'=>200];
               echo json_encode($msg);
           }
       }

    //    ResetPasswordStudent
    public function ResetPasswordStudent()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $student =  $this->MStudent->find($id); 

            $data = [
                'id'=> $id,
                'password'=>Hash::make($student['nisn'])];
            $this->MStudent->save($data);
            $msg = ['sukses'=>200];
            echo json_encode($msg);
        }
    }


// Login
public function Login()
{
    return view('Auth/SuperLogin');
}


public function LoginCek()
{
   if ($this->request->isAJAX()) {
    $is_santri = $this->request->getPost('is_santri');
    $this->validate= \Config\Services::validation();
    $validate = $this->validate(
    [
    'xcode' => [
    'label'  => 'User ID',
    'rules'  => 'required',
    'errors' => [
    'required' => '{field} Tidak Boleh Kosong'
    ]
    ],
     'xpass' => [
    'label'  => 'Password',
    'rules'  => 'required',
    'errors' => [
    'required' => '{field} Tidak Boleh Kosong'
    ]
    ],
    ]
    );

    if (!$validate) {
        $msg = [
        'error' => [
        'xcode' => $this->validate->getError('xcode'),
        'xpass' => $this->validate->getError('xpass')
        ]
        ];
    }else{
        $xcode   = $this->request->getPost('xcode');
        $xpass    = $this->request->getPost('xpass');
        $super = $this->MAuth->CekEmail($xcode);
        if ($super) {
            // Cek Apakah is_ctive=1 akun aktif
            if ($super->is_active==1) {
                $is_valid = Hash::check($xpass, $super->password);
                // cek password jika valid
                if ($is_valid) {
                    // buat session user login 
                    $new_session = ['super_ses' => intval($super->id)];
                    session()->set($new_session);
                    $msg = [
                        'sukses'=> 200,
                        'link'=> base_url('super')
                ];
                }else{
                    $msg = ['errors'=>401];
                }
            }else{
                // pesan jika Akun tidak aktif 
                $msg = ['errors'=>401];
            }
        }else{
            // jika email tidak ada 
        $msg = ['errors'=> ['xcode'=>401]];
        }
        

    }

    echo json_encode($msg);
   
   

}
}


function HapusStudent($id){
    
     $student = $this->MStudent->delete($id);
      
        return redirect()->to(base_url('super/santri/all'));
       
}

function Logout()
{
session()->remove('super_ses');
return redirect()->to(base_url('/login/super'));
    
}



}


