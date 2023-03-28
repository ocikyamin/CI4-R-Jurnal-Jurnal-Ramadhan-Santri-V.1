<?= $this->extend('Supers/Layouts') ?>
<?= $this->section('content') ?>
<div class="row">
<div class="col-lg-12">
<h1 class="h4 mb-3 text-gray-800"> <i class="fas fa-graduation-cap"></i>  <?=$edu['school_name']?>
</h1>
<div class="alert alert-info">
Headmaster : <b><?=$edu['headmaster']?></b>
</div>
</div>
<?php
foreach ($kelas as $k) {?>
<div class="col-lg-3 mb-2">
<div class="card border-left-primary shadow h-100">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nama Kelas</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$k['class_level']?></div>
                <div>
                    <div class="dropdown mb-0 mt-2">
                    <button class="btn btn-primary shadow-sm btn-block btn-sm" type="button" data-toggle="dropdown" aria-expanded="false">
                    Lihat Kelas
                    </button>
                    <div class="dropdown-menu">
                        <?php
                        if (!empty(KelasLevelId($k['id']))) {
                            foreach (KelasLevelId($k['id']) as $room) {
                               ?>
                            <a class="dropdown-item" onclick="ViewStudent(<?=$room['id']?>)" href="#">Kelas ( <?=$room['classroom']?> )</a>
                               <?php
                            }
                        }
                        
                        ?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>
<div class="col-lg-12">
<div id="student_area" class="mt-3">
<div class="alert alert-warning text-center">
Data Santri akan tampil disini. Pilih salah satu kelas untuk menampilkan data.
</div>
</div>
</div>
</div>
<script>
    function ViewStudent(rombel) {
        $.ajax({
            url: "<?=base_url('super/student/room')?>",
            data: {rombel_id:rombel},
            dataType: "json",
            success: function (response) {
                $('#student_area').html(response.view);
            }
        });
      }
</script>
<?= $this->endSection() ?>