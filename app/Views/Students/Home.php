<?= $this->extend('Students/Layouts') ?>
<?= $this->section('content') ?>

<div class="row">
      <div class="col-lg-12">
        <div class="alert shadow-sm">
        Assalamu'alaikum  ( <b><?=strtoupper(Student()->nama)?></b> )
        <div> Saat ini Ananda tergabung di  Kelas <b>(<?=Student()->classroom?>)</b></div>
        </div>

        <div class="alert bg-info text-white shadow-sm" role="alert">
            Apakah Sudah Membuat Jurnal Ramadhan untuk hari ini ?
            </div>
      </div>
      </div>
      <div class="row">

  <div class="col-lg-3 mb-2">
          <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                      <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Yuk, Buat Jurnal Sekarang</div>
                                          <div>
                                              <a href="<?=base_url('student/buat-jurnal')?>" class="btn btn-primary btn-block btn-sm">
                                              <span class="icon text-white-50">
                                              <i class="fas fa-edit"></i>
                                              </span>
                                              <span class="text">Buat Jurnal</span>
                                              </a>
                                          </div>
                                  </div>
                                <div class="col-auto">
                                <i class="far fa-copy fa-2x text-gray-300"></i>
                                </div>
                      </div>

                </div>
          </div>
  </div>
<?php
  $i=1;
  if (!empty(MyJurnal(Student()->rombel_id,Student()->id))) {
    foreach (MyJurnal(Student()->rombel_id,Student()->id) as $key) {
      ?>
      <div class="col-lg-3 mb-2">
          <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                        <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Tanggal Jurnal (<?=$i++?>)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      <a href="<?=base_url('student/jurnalku/'.$key['id'])?>"><?=date('d/m/Y', strtotime($key['tgl_jurnal']))?></a>
                                    </div>
                                </div>
                              <div class="col-auto">
                              <i class="fab fa-creative-commons-share fa-2x text-primary"></i>
                              </div>
                        </div>

                  </div>
          </div>
        </div>
<?php
  }
}
// else{
//   echo "<div class='col-lg-12'>
//   <div class='alert bg-white text-center'>Daftar Jurnal Ramadhan Akan Tampil Disini Jika Ananda Telah Mengisi Lembar Kegiatan</div>
//   </div>";
  
//   }
  
  ?>
      

</div>

        <?= $this->endSection() ?>