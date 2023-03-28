<?php

namespace App\Models;

use CodeIgniter\Model;

class MTeacher extends Model
{

    protected $table            = 'm_teacher';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

public function Walas()
{
    return $this->db->table('tm_kelas_rombel')
    ->select('m_teacher.*,tm_kelas_rombel.classroom')
    ->join('tm_kelas_level','tm_kelas_rombel.class_level_id=tm_kelas_level.id')
    ->join('m_teacher','tm_kelas_rombel.walas_id=m_teacher.id')
    ->orderBy('tm_kelas_rombel.id','ASC')
    ->get()
    ->getResultArray();

}


}
