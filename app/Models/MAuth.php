<?php

namespace App\Models;

use CodeIgniter\Model;

class MAuth extends Model
{
    protected $table            = 'm_student';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function CekNisn($x)
    {
        return $this->db->table('m_student')
        ->where('nisn',$x)
        ->get()
        ->getRow();
    }

    public function CekNUPTK($x)
    {
        return $this->db->table('m_teacher')
        ->where('nuptk',$x)
        ->get()
        ->getRow();
    }

    public function CekEmail($x)
    {
        return $this->db->table('users')
        ->where('email',$x)
        ->get()
        ->getRow();
    }


    public function AllSantri($x)
    {
        
        if ($x=='all') {
            return $this->db->table('m_student')
            ->select('m_student.*,tm_kelas_rombel.classroom')
        ->join('tm_kelas_rombel','m_student.rombel_id=tm_kelas_rombel.id')
        ->get()
        ->getResultArray();
        }else{
            return $this->db->table('m_student')
            ->select('m_student.*,tm_kelas_rombel.classroom')
        ->join('tm_kelas_rombel','m_student.rombel_id=tm_kelas_rombel.id')
        ->where('m_student.rombel_id',$x)
        ->get()
        ->getResultArray();
        }
    }

    

  
}
