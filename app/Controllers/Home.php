<?php

namespace App\Controllers;
use App\Libraries\Hash;
use App\Models\MAuth;
use App\Models\MStudent;
use App\Models\MTeacher;

class Home extends BaseController
{
    protected $helpers = ['custom'];
    function __construct()
{
$this->MAuth = new MAuth;
$this->MStudent = new MStudent;
$this->MTeacher = new MTeacher;
}
    public function index()
    {
        // echo Hash::make('12345');
        return view('Auth/Login');
    }

    public function LoginCek()
    {
       if ($this->request->isAJAX()) {
        $is_santri = $this->request->getPost('is_santri');
        $this->validate= \Config\Services::validation();
        $validate = $this->validate(
        [
        'xcode' => [
        'label'  => 'NISN/NUPTK',
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
            if ($is_santri==1) {
				$student = $this->MAuth->CekNisn($xcode);
                if ($student) {
            		// Cek Apakah is_ctive=1 akun aktif
            		if ($student->is_active==1) {
            			$is_valid = Hash::check($xpass, $student->password);
            			// cek password jika valid
            			if ($is_valid) {
            				// buat session user login 
							$new_session = ['student_ses' => intval($student->id)];
							session()->set($new_session);
							$msg = [
                                'sukses'=> 200,
                                'link'=> base_url('student')
                        ];
            			}else{
            				$msg = ['error'=> ['xpass'=> 'Password Tidak Benar']];
            			}
            		}else{
            			// pesan jika Akun tidak aktif 
            			$msg = ['error'=> ['xcode'=> 'Akun belum di Aktivasi Oleh Wali Kelas atau Permintaan bergabung ditolak karena salah memilih kelas.']];
            		}
            	}else{
            		// jika email tidak ada 
            	$msg = ['error'=> ['xcode'=> 'NISN Belum Terdaftar.']];
            	}

            }else{
                // login Walas 
                $walas = $this->MAuth->CekNUPTK($xcode);
                if ($walas) {
            		// Cek Apakah is_ctive=1 akun aktif
            		if ($walas->is_active==1) {
            			$is_valid = Hash::check($xpass, $walas->password);
            			// cek password jika valid
            			if ($is_valid) {
            				// buat session user login 
							$new_session = ['walas_ses' => intval($walas->id)];
							session()->set($new_session);
							$msg = [
                                'sukses'=> 200,
                                'link'=> base_url('walas')
                        ];
            			}else{
            				$msg = ['error'=> ['xpass'=> 'Password Tidak Benar']];
            			}
            		}else{
            			// pesan jika Akun tidak aktif 
            			$msg = ['error'=> ['xcode'=> 'Akun belum di Aktivasi']];
            		}
            	}else{
            		// jika email tidak ada 
            	$msg = ['error'=> ['xcode'=> 'NUPTK Belum Terdaftar.']];
            	}

            }

        }
        // dd($is_santri);
        // Login Sebagi Santri 

        echo json_encode($msg);
       
       
    
    }
    }

    public function Register()
    {
        return view('Auth/Register');
    }


    // RegisterStudent
    public function RegisterStudent()
    {
       if ($this->request->isAJAX()) {
        $msg = ['view'=> view('Auth/RegisterStudent')];
        echo json_encode($msg);
       }
    }


    public function LevelClassId()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('edu');
            $level = $this->MStudent->KelasEdu($id);
            $option = "";
            foreach ($level as $row) {
               $option .= '<option value="'.$row['id'].'">'.$row['class_level'].'</option>';

            }
            $msg = ['level'=> $option];
            echo json_encode($msg);
        }
       
    }

    public function RombelId()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('rombel');
            $rombel = $this->MStudent->RombelById($id);
            $option = "";
            foreach ($rombel as $row) {
               $option .= '<option value="'.$row['id'].'">Kelas '.$row['classroom'].'</option>';

            }
            $msg = ['rombel'=> $option];
            echo json_encode($msg);
        }
       
    }


    // CekRegisterStudent
    public function CekRegisterStudent()
    {
   
        if ($this->request->isAJAX()) {
            $is_santri = $this->request->getPost('is_santri');
            $this->validate= \Config\Services::validation();
            $validate = $this->validate(
            [
            'nisn' => [
            'label'  => 'NISN',
            'rules'  => 'required|is_unique[m_student.nisn]|min_length[7]|max_length[11]',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong',
            'is_unique' => '{field} Telah Terdaftar',
            'min_length' => '{field} Minimal 7 Angka',
            'max_length' => '{field} Maksimal 11 Angka'
            ]
            ],
            'nm_lengkap' => [
            'label'  => 'Nama Lengkap',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong'
            ]
            ],
            'jk' => [
                'label'  => 'Jenis Kelamin',
                'rules'  => 'required',
                'errors' => [
                'required' => '{field} Tidak Boleh Kosong'
                ]
                ],

            'satuan_pddk' => [
            'label'  => 'Satuan Pendidikan',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong'
            ]
            ],
            'tingkat_kelas' => [
            'label'  => 'Tingkat Kelas',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong'
            ]
            ],
            'rombel' => [
            'label'  => 'Kelas',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong'
            ]
            ],
            'newpass' => [
            'label'  => 'Password',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong'
            ]
            ],
            'confpass' => [
            'label'  => 'Konfirmasi Password',
            'rules'  => 'required|matches[newpass]',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong',
            'matches' => '{field} Tidak Cocok'
            ]
            ],

            'is_confirm' => [
                'label'  => 'Konfirmasi Persetujuan',
                'rules'  => 'required',
                'errors' => [
                'required' => '{field} Harus dicentang'
                ]
                ],
                


            ]
            );
    
 // nisn
    // nm_lengkap
    // satuan_pddk
    // tingkat_kelas
    // rombel
    // newpass
    // confpass
    // is_confirm

            if (!$validate) {
                $msg = [
                'error' => [
                'nisn' => $this->validate->getError('nisn'),
                'nm_lengkap' => $this->validate->getError('nm_lengkap'),
                'jk' => $this->validate->getError('jk'),
                'satuan_pddk' => $this->validate->getError('satuan_pddk'),
                'tingkat_kelas' => $this->validate->getError('tingkat_kelas'),
                'rombel' => $this->validate->getError('rombel'),
                'newpass' => $this->validate->getError('newpass'),
                'confpass' => $this->validate->getError('confpass'),
                'is_confirm' => $this->validate->getError('is_confirm')
                ]
                ];
            }else{
                $data = [
                    'nisn'=> $this->request->getPost('nisn'),
                    'password'=> Hash::make($this->request->getPost('confpass')),
                    'nama'=> $this->request->getPost('nm_lengkap'),
                    'jk'=> $this->request->getPost('jk'),
                    'rombel_id'=> $this->request->getPost('rombel'),
                ];
                $this->MStudent->save($data);
                $msg = ['sukses'=> 200];
            }
            echo json_encode($msg);
        }
        
    }

// Register Walas 
public function RegisterWalas()
{
   if ($this->request->isAJAX()) {
    $msg = ['view'=> view('Auth/RegisterWalas')];
    echo json_encode($msg);
   }
}

// Cek Register Walas 
public function CekRegisterWalas()
{

    if ($this->request->isAJAX()) {
  
        $this->validate= \Config\Services::validation();
        $validate = $this->validate(
        [
        'nuptk' => [
        'label'  => 'NUPTK/NIP',
        'rules'  => 'required|is_unique[m_teacher.nuptk]|max_length[30]',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong',
        'is_unique' => '{field} Telah Terdaftar',
        'max_length' => '{field} Maksimal 30 Angka'
        ]
        ],
        'nm_walas' => [
        'label'  => 'Nama Lengkap',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong'
        ]
        ],

        'satuan_pddk' => [
        'label'  => 'Satuan Pendidikan',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong'
        ]
        ],
        'tingkat_kelas' => [
        'label'  => 'Tingkat Kelas',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong'
        ]
        ],
        'rombel' => [
        'label'  => 'Kelas',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong'
        ]
        ],
        'newpass' => [
        'label'  => 'Password',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong'
        ]
        ],
        'confpass' => [
        'label'  => 'Konfirmasi Password',
        'rules'  => 'required|matches[newpass]',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong',
        'matches' => '{field} Tidak Cocok'
        ]
        ],

        'is_confirm' => [
            'label'  => 'Konfirmasi Persetujuan',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Harus dicentang'
            ]
            ],
            


        ]
        );

        if (!$validate) {
            $msg = [
            'error' => [
            'nuptk' => $this->validate->getError('nuptk'),
            'nm_walas' => $this->validate->getError('nm_walas'),
            'satuan_pddk' => $this->validate->getError('satuan_pddk'),
            'tingkat_kelas' => $this->validate->getError('tingkat_kelas'),
            'rombel' => $this->validate->getError('rombel'),
            'newpass' => $this->validate->getError('newpass'),
            'confpass' => $this->validate->getError('confpass'),
            'is_confirm' => $this->validate->getError('is_confirm')
            ]
            ];
        }else{
            $rombel_id = $this->request->getPost('rombel');
            $cekWalas = $this->MStudent->Rombel($rombel_id);
            $is_walas = $cekWalas['walas_id'];
            if ($is_walas == null) {
                $data = [
                'nuptk'=> $this->request->getPost('nuptk'),
                'password'=> Hash::make($this->request->getPost('confpass')),
                'teacher_name'=> $this->request->getPost('nm_walas'),
                ];

               $regs=  $this->MTeacher->save($data);
               if ($regs) {
                $walas_id = intval($this->MTeacher->getInsertID());
                $dataw = ['walas_id' => $walas_id];
                $this->MStudent->ClaimClass($rombel_id,$dataw);
                $msg = ['sukses'=>200];
               }else{
                $msg = ['error'=> ['nuptk'=> 'Gagal Query']];
               }

            }else{
                $msg = [
                    'error'=> [
                        'rombel'=> 'Wali Kelas Untuk Kelas ini Sudah ada']];
            }
           
        }
        echo json_encode($msg);
    }
    
}

}
