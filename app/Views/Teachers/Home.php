<?= $this->extend('Teachers/Layouts') ?>
<?= $this->section('content') ?>

<div class="row">
<div class="col-lg-12">
      <div class="border-bottom-primary alert shadow-sm">
      Assalamu'alaikum  ( <b><?=Teacher()->teacher_name?></b> )
      <div>Anda Terdaftar Sebagai Wali Kelas <b>(<?=MyClass()->classroom?>)</b></div>
      </div>


</div>

<div class="col-lg-3 mb-2">
<div class="card border-left-primary shadow">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Jumlah Santri Kelas <b>(<?=MyClass()->classroom?>)</b></div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                if (!empty(JmlSantriKu(MyClass()->id))) {
                  echo "(".JmlSantriKu(MyClass()->id).") Santri";
                }else{echo "Belum ada Santri";}
                ?></div>
            </div>
            <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
            <a href="<?=base_url('walas/student')?>" class="btn btn-primary btn-circle btn-sm mt-2">
            <i class="fas fa-arrow-right"></i>
            </a> 
    </div>
</div>
</div>

<div class="col-lg-3 mb-2">
<div class="card border-left-primary shadow">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Journal Entry</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                if (!empty(JmlEntryJurnalToday(MyClass()->id))) {
                 echo "(".JmlEntryJurnalToday(MyClass()->id).") Santri";
                }else{
                  echo "Belum ada";
                }?>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
            <a href="<?=base_url('walas/jurnal/kelas/'.MyClass()->id.'/date/'.date('Y-m-d'))?>" class="btn btn-primary btn-circle btn-sm mt-2">
            <i class="fas fa-arrow-right"></i>
            </a> 
    </div>
</div>
</div>


<div class="col-lg-3 mb-2">
<div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Satuan Pendidikan</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?=MyClass()->school_name?>
                  </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-lg-3 mb-2">
<div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Kepala Madrasah</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?=MyClass()->headmaster?>
                  </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
</div>
</div>

</div>
<?php
if (!empty($student)) {
  ?>
  <div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">Permintaan Bergabung Ke Kelas <b>(<?=MyClass()->classroom?>)</b></h6>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>NO.</th>
<th>NISN</th>
<th>NAMA</th>
<th>JK</th>
<th>PERSETUJUAN</th>
<th>STATUS</th>
</tr>
</thead>
<tbody>
    <?php
    $i=1;
    foreach ($student as $s) {?>
    <tr>
    <td><?=$i++?>.</td>
    <td><?=$s['nisn']?></td>
    <td><?=$s['nama']?></td>
    <td><?=$s['jk']?></td>
    <td>
<button onclick="confirm(<?=$s['id']?>)" class="btn btn-primary btn-sm"><i class="far fa-check-circle"></i> Konfirmasi</button>
    </td>
    <td>
      
    <?=$s['is_active']==0? '<span class="badge badge-warning">Menunggu Konfirmasi</span>': '<span class="badge badge-danger">Permintaan Ditolak</span>'?></td>
    </tr>
    <?php } ?>
</tbody>
</table>

</div>

</div>
</div>

  <?php
}
?>


<div class="modalconfirm">

</div>
<script>
  function confirm(id) {
    $.ajax({
      url: "<?=base_url('walas/student/confirm')?>",
      data: {id:id},
      dataType: "json",
      success: function (response) {
        $('.modalconfirm').html(response.view)
        $('#confirm').modal('show')
      }
    });
    }
</script>
<?= $this->endSection() ?>