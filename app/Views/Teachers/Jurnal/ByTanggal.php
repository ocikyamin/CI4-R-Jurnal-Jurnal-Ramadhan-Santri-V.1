<?= $this->extend('Teachers/Layouts') ?>
<?= $this->section('content') ?>
<h1 class="h4 mb-2 text-gray-800">Riwayat Jurnal</h1>
<style>
    li {
      list-style-type: none;
    }
</style>
<!-- DataTales Example -->
<div class="card mb-4">
<div class="card-header bg-gradient-primary">
<h6 class="m-0 font-weight-bold text-white"><i class="far fa-calendar-alt"></i> Jurnal Tanggal <strong><?=date('d/m/Y', strtotime($tgl))?></strong> Kelas <b>(<?=MyClass()->classroom?>)</b></h6>
</div>
<div class="card-body">
  <p>
  <input type="hidden" name="rombel_id" id="rombel_id" value="<?=MyClass()->id?>">
<div class="input-group row" style="border-bottom:2px dotted">
 <label class="col-lg-2">Tanggal Jurnal</label>
 <div class="col-lg-4">
 <input type="date" id="dates" class="form-control mb-2" name="tanggal">
 </div>
</div>
  </p>
<div class="table-responsive">
<table  id="dataTable" style='font-size:12px' class="table table-bordered table-hover table-sm table-striped" >
<thead>
<tr class="th">
<th>NO.</th>
<th>NAMA</th>
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
    <td><?=$s['nama']?></td>
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

<script>

$('#dates').change(function (e) { 
e.preventDefault();
var rombel = $('#rombel_id').val();
var dates = $('#dates').val();
var queryString = 'kelas/' + encodeURIComponent(rombel) + '/date/' + encodeURIComponent(dates);
window.location.href = '<?=base_url('walas/jurnal/')?>' + queryString;
});
</script>

<?= $this->endSection() ?>