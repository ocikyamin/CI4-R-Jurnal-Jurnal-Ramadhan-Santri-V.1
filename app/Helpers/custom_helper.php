<?php
function con()
{
	return $db= \Config\Database::connect(); 
}

// Data Login Anggota 

function Student()
{
return $builder = con()
->table('m_student')
->select('m_student.*,
tm_kelas_level.class_level,
tm_kelas_rombel.id as rombel_id,
tm_kelas_rombel.classroom,
tm_educate.school_name,
tm_educate.headmaster,
')
->join('tm_kelas_rombel','m_student.rombel_id=tm_kelas_rombel.id')
->join('tm_kelas_level','tm_kelas_rombel.class_level_id=tm_kelas_level.id')
->join('tm_educate','tm_kelas_level.educate_id=tm_educate.id')

->where('m_student.id',session('student_ses'))
->get()
->getRow();
}


function Teacher()
{
return $builder = con()
->table('m_teacher')
->where('id',session('walas_ses'))
->get()
->getRow();
}

function User()
{
return $builder = con()
->table('users')
->where('id',session('super_ses'))
->get()
->getRow();
}

function MyClass()
{
return $builder = con()
->table('tm_kelas_rombel')
->select('
tm_kelas_rombel.*,
tm_kelas_level.class_level,
tm_educate.school_name,
tm_educate.headmaster,
m_teacher.teacher_name
')
->join('tm_kelas_level','tm_kelas_rombel.class_level_id=tm_kelas_level.id')
->join('tm_educate','tm_kelas_level.educate_id=tm_educate.id')
->join('m_teacher','tm_kelas_rombel.walas_id=m_teacher.id')

->where('tm_kelas_rombel.walas_id',session('walas_ses'))
->get()
->getRow();
}

function JmlSantriKu($rombel)
{
return $builder = con()
->table('m_student')
->where('rombel_id',$rombel)
->where('is_active',1)
->countAllResults();
}

function JmlEntryJurnalToday($rombel)
{
return $builder = con()
->table('jurnal_ramadhan')
->where('rombel_id',$rombel)
->where('DATE(tgl_jurnal)', date('Y-m-d'))
->countAllResults();
}


// Tabel Master 
function Master($table){
$builder = con()->table($table);
return $query = $builder->get()->getResultArray();
}

function MyJurnal($rombel_id,$siswa_id){
return $builder = con()->table('jurnal_ramadhan')
->select('id,tgl_jurnal')
->where('rombel_id',$rombel_id)
->where('siswa_id',$siswa_id)
->orderBy('tgl_jurnal', 'ASC')
->get()->getResultArray();

}

function KelasLevelId($id){
	return $builder = con()->table('tm_kelas_rombel')
	->where('class_level_id',$id)
	->get()->getResultArray();
	
	}

	// function KelasLevelId($id){
	// 	return $builder = con()->table('tm_kelas_rombel')
	// 	->select('tm_kelas_rombel.id,tm_kelas_rombel.classroom,m_teacher.teacher_name')
	// 	->where('tm_kelas_rombel.class_level_id',$id)
	// 	->join('m_teacher','tm_kelas_rombel.walas_id=m_teacher.id')
	// 	->get()->getResultArray();
		
	// 	}


function JmlSantriAktif()
{
return $builder = con()
->table('m_student')
->where('is_active',1)
->countAllResults();
}

function JmlSantriNoAktif()
{
return $builder = con()
->table('m_student')
->where('is_active !=',1)
->countAllResults();
}

function JmlWalas()
{
return $builder = con()
->table('tm_kelas_rombel')
->where('walas_id !=',NULL)
->countAllResults();
}

function JmlJurnalToday()
{
	return $builder = con()
	->table('jurnal_ramadhan')
	->where('DATE(tgl_jurnal)', date('Y-m-d'))
	->countAllResults();
}


