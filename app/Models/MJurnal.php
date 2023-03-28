<?php

namespace App\Models;

use CodeIgniter\Model;

class MJurnal extends Model
{
    protected $table            = 'jurnal_ramadhan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    // protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
public function CekTanggal($rombel_id,$siswa_id,$tgl)
{
  return $this->db->table('jurnal_ramadhan')
  ->where('rombel_id',$rombel_id)
  ->where('siswa_id',$siswa_id)
  ->where('tgl_jurnal',$tgl)
  ->get()
  ->getRow();
}

public function ByStudent($id)
{
  return $this->db->table('jurnal_ramadhan')
  ->where('siswa_id',$id)
  ->get()
  ->getResultArray();
}

public function ByDate($rombel_id,$date)
{
  return $this->db->table('jurnal_ramadhan')
  ->select('jurnal_ramadhan.*,m_student.nama')
  ->join('m_student','jurnal_ramadhan.siswa_id=m_student.id')
  ->where('jurnal_ramadhan.rombel_id',$rombel_id)
  ->where('DATE(jurnal_ramadhan.tgl_jurnal)', $date)
  ->get()
  ->getResultArray();
}


public function JurnalByDate($date)
{
  return $this->db->table('jurnal_ramadhan')
  ->select('jurnal_ramadhan.*,m_student.nama')
  ->join('m_student','jurnal_ramadhan.siswa_id=m_student.id')
  ->where('DATE(jurnal_ramadhan.tgl_jurnal)', $date)
  ->get()
  ->getResultArray();
}



public function TampilData($table,$where)
{
  return $this->db->table($table)
  ->where($where)
  ->get()
  ->getResultArray();
}

public function TampilBaris($table, $where)
{
    return $this->db->table($table)->where($where)->get()->getRowArray();
}

public function SimpanData($table,$data)
{
    return $this->db->table($table)->insert($data);
}
public function HapusData($table,$where)
{
    return $this->db->table($table)->where($where)->delete();
}

public function DetailSiswa($id = null)
{

return $this->db->table('m_student')
->select('m_student.*,
tm_kelas_level.class_level,
tm_kelas_rombel.id as rombel_id,
tm_kelas_rombel.classroom,
tm_educate.school_name,
tm_educate.headmaster,
m_teacher.nuptk,
m_teacher.teacher_name
')
->join('tm_kelas_rombel','m_student.rombel_id=tm_kelas_rombel.id')
->join('m_teacher','tm_kelas_rombel.walas_id=m_teacher.id')
->join('tm_kelas_level','tm_kelas_rombel.class_level_id=tm_kelas_level.id')
->join('tm_educate','tm_kelas_level.educate_id=tm_educate.id')

->where('m_student.id',$id)
->get()
->getRow();

}

// public function Lembaga($id = null)
// {

// return $this->db->table('tm_kelas_rombel')
// ->select('tm_educate.school_name,tm_educate.headmaster')
// ->join('tm_kelas_level','tm_kelas_rombel.class_level_id=tm_kelas_level.id')
// ->join('tm_educate','tm_kelas_level.educate_id=tm_educate.id')
// ->where('tm_kelas_rombel.walas_id',$id)
// ->get()
// ->getRow();

// }





}
