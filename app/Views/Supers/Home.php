<?= $this->extend('Supers/Layouts') ?>
<?= $this->section('content') ?>

<div class="row">
<div class="col-lg-12">
<h6 class="header-pretitle">Assalamu'alaikum ?</h6>
<h1 class="h5 mb-3 text-gray-800">Hai, Anda Login sebagai Super User</h1>
</div>
      <!-- JmlSantriAktif
JmlSantriNoAktif -->
<div class="col-lg-3 mb-2">
<div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Jumlah Akun Santri</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php if (!empty(JmlSantriAktif())) { echo "(".JmlSantriAktif().") Santri";}else{echo "Belum ada";}?></div>
            </div>
      
            <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-lg-3 mb-2">
<div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Jumlah Akun Non Aktif</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php if (!empty(JmlSantriNoAktif())) { echo JmlSantriNoAktif();}else{echo "Tidak ada";}?></div>
            </div>
      
            <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-lg-3 mb-2">
<div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Jumlah Wali Kelas</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php if (!empty(JmlWalas())) { echo "(".JmlWalas().") Walas";}else{echo "Belum ada";}?></div>
            </div>
      
            <div class="col-auto">
                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
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
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Jurnal Today</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php if (!empty(JmlJurnalToday())) { echo "(".JmlJurnalToday().") Santri";}else{echo "Belum ada";}?></div>
            </div>
      
            <div class="col-auto">
                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
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
<h6 class="m-0 font-weight-bold text-primary">Permintaan Bergabung Ke Kelas</h6>
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
<th>KELAS</th>
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
    <td><?=$s['classroom']?></td>
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