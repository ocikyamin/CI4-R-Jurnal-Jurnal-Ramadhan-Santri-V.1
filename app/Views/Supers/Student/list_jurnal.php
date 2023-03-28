<?= $this->extend('Supers/Layouts') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800">Jurnal Santri</b></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<li>Nisn : <?=$student['nisn']?></li>
<li>Nama : <?=$student['nama']?></li>
<li>Kelas :  <?=$rombel['classroom']?></li>
</div>
<div class="card-body">
<div class="table-responsive">
<table  id="dataTable" width="100%" style='font-size:12px' class="table table-sm table-striped" cellspacing="0">
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
        // var_dump($sholat);
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
    <td><?=$s['created_at']?></td>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
</div>



<?= $this->endSection() ?>