<?php

namespace App\Models;

use CodeIgniter\Model;

class MStudent extends Model
{
    protected $table            = 'm_student';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

public function ByClass($rombel_id)
{
  return $this->db->table('m_student')
  ->where('rombel_id',$rombel_id)
  ->where('is_active',1)
  ->get()
  ->getResultArray();
}

public function AkunClass($rombel_id)
{
  return $this->db->table('m_student')
  ->where('rombel_id',$rombel_id)
  ->where('is_active !=',1)
  ->get()
  ->getResultArray();
}

public function PermintaanGabung()
{
  return $this->db->table('m_student')
  ->select('m_student.*,tm_kelas_rombel.classroom')
  ->join('tm_kelas_rombel','m_student.rombel_id=tm_kelas_rombel.id')
  ->where('m_student.is_active !=',1)
  ->get()
  ->getResultArray();
}

public function EduLevel($id)
{
  return $this->db->table('tm_educate')
  ->where('id ',$id)
  ->get()
  ->getRowArray();
}

public function KelasEdu($id)
{
  return $this->db->table('tm_kelas_level')
  ->where('educate_id ',$id)
  ->get()
  ->getResultArray();
}

// Rombel 

public function Rombel($id)
{
  return $this->db->table('tm_kelas_rombel')
  // ->join('m_teacher','tm_kelas_rombel.walas_id=m_teacher.id')
  ->where('tm_kelas_rombel.id ',$id)
  ->get()
  ->getRowArray();
}

public function RombelById($id)
{
  return $this->db->table('tm_kelas_rombel')
  ->where('class_level_id',$id)
  ->get()
  ->getResultArray();
}



public function ClaimClass($id,$data)
{
  return $this->db->table('tm_kelas_rombel')->where('id', $id)->update($data);
}

}
