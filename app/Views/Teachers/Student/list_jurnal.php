<?= $this->extend('Teachers/Layouts') ?>
<?= $this->section('content') ?>
<style>
     li {
      list-style-type: none;
    }
    .line{
        border-bottom:1px dotted;
        margin:5px;
    }
</style>
<h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-folder-open"></i> Jurnal Santri</b></h1>

<div class="row">
        <div class="col-lg-5">
        <div class="card border-bottom-primary shadow-sm mb-3">
            <div class="card-header">
            <h6 class="m-0 font-weight-bold"><i class="fa fa-user"></i> Identitas Santri</h6>
            </div>
            <div class="card-body">
                <li class="line">Nisn : <?=$student->nisn?></li>
                <li class="line">Nama : <?=$student->nama?></li>
                <li class="line">Kelas : <?=$student->classroom?></li>
                <li class="line">Wali Kelas : <?=$student->teacher_name?></li>
            </div>
        </div>
        </div>
        <div class="col-lg-7">
                <div class="row">

                    <div class="col-lg-6">
                    <div class="card border-left-primary mb-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Satuan Pendidikan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$student->school_name?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="card border-left-primary mb-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Kepala Madrasah</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$student->headmaster?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

                    

                </div>


        <!-- <div class="card border-bottom-primary shadow-sm mb-3">
            <div class="card-header bg-gradient-primary">
            <h6 class="m-0 font-weight-bold text-white"><i class="fa fa-user"></i> Identitas Santri</h6>
            </div>
            <div class="card-body">
                
            </div>
        </div> -->
        </div>
        
</div>

        <div class="card mb-3">
            <div class="card-header bg-gradient-primary">
            <h6 class="m-0 font-weight-bold text-white"> <i class="far fa-fw fa-copy text-white shadow"></i> Target Ramadhan</h6>
            </div>
                <?php
                if (!empty($target)) {
                    $no=1;
                    foreach ($target as $t) {
                        ?>
                        <div class="shadow-sm alert m-0">
                        <strong>Target <?=$no++?> :</strong> <?=$t['target']?>
                        </div>
                        <?php
                    }
                }else{
                    echo '<div class="shadow-sm alert m-0 text-center text-danger">Belum ada target Ramadhan.</div>';
                }
                
                ?>
        </div>
<!-- DataTales Example -->
<div class="card mb-4">
<div class="card-header bg-gradient-primary">
<h6 class="m-0 font-weight-bold text-white">  <i class="far fa-fw fa-bookmark text-white shadow"></i> Kegitan Ramadhan Santri</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<table  id="dataTable" style='font-size:12px' class="table table-bordered table-hover table-sm table-striped">
<thead>
<tr class="th">
<th>NO.</th>
<th>TGL.JURNAL</th>
<th>PUASA</th>
<th>SHOLAT</th>
<th>TADARUS</th>
<th>BACA QURAN</th>
<th>HAFIDZ</th>
<th>MURAJAAH</th>
<th>CRAMAH</th>
</tr>
</thead>
<tbody>
    <?php
    $i=1;
    foreach ($jurnal as $s) {
        $sholat = unserialize($s['sholat']);
        ?>
    <tr class="td">
    <td><?=$i++?>.</td>
    <td><?=date('d/m/Y', strtotime($s['tgl_jurnal']))?></td>
    <td><?=$s['puasa']?></td>
    <td>
        <?php
    if ($sholat !==NULL) {
      foreach ($sholat as $key => $value) {
        echo "<li>".$value."</li>";
     }
      
    }else{echo "Tidak";}

   ?>
    </td>
    <td>
        <?= $s['tadarus_mulai']==''? '-':  "<li>".$s['tadarus_mulai']."</li>";?>
        <?= $s['tadarus_sampai']==''? '-':  "<li>".$s['tadarus_sampai']."</li>";?>
    </td>
    <td>
    <?= $s['bcquran_mulai']==''? '-':  "<li>".$s['bcquran_mulai']."</li>";?>
        <?= $s['bcquran_sampai']==''? '-':  "<li>".$s['bcquran_sampai']."</li>";?>
    </td>
    <td>  <?= $s['hafalan']==''? '-':  "<li>".$s['hafalan']."</li>";?></td>
    <td>  <?= $s['murajaah']==''? '-':  "<li>".$s['murajaah']."</li>";?></td>
    <td><?=$s['masjid']?> - <?=$s['judul_ceramah']?></td>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
</div>



<?= $this->endSection() ?>