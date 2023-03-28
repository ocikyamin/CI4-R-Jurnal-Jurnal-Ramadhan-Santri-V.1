<?php

// var_dump($std);
// echo "<hr>";
// var_dump($target);
// echo "<hr>";
// var_dump($jurnal);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cetak HTML dengan format potret dan lanskap</title>
  <style type="text/css">
    body {
        font-family:Tahoma;
    }
    @media print {
      @page {
        size: portrait;
      }

      @page :first {
        size: portrait;
      }

      /* @page land {
        size: landscape;
      
      } */

  

      body {
        page-break-after: always;
      }

      /* .landscape {
        page: land;
        width: 100vw;
      } */
    }
    .cover{
text-align:center;
    }
    .kop{
      border-bottom:3px double;
    }
    .nama{
      /* border:3px double; */
      /* text-align:left; */
      /* width:50%; */
    }
    .line{
      border-bottom:2px solid;
    }
    .tegak{
      border:2px solid;
      width:2px;
      height:200px;
      text-align:center;
      /* margin:10px; */
      display:inline-block;
      border-radius:50px;
      background:orange;

    }
    li {
      list-style-type: none;
    }
  </style>
</head>
<body>
<div class="cover">
<div class="kop">
<h2>PONDOK PESANTREN <br> MADRASAH TARBIYAH ISLAMIYAH CANDUANG</h2>
</div>
  <h1>BUKU LAPORAN <br> JURNAL RAMADHAN SANTRI <br>
  (<?=strtoupper($std->school_name)?>)
</h1>
  <img src="<?=base_url('mtic.png')?>" width="150">
  <div>
  <br>
    <div class="nama">
    <center>
    <table width="80%" style="border-collapse:collapse">
      <tr class="line">
        <td>NAMA</td>
        <td>:</td>
        <td><?=strtoupper($std->nama)?></td>
      </tr>
      <tr class="line">
        <td>NISN</td>
        <td>:</td>
        <td><?=strtoupper($std->nisn)?></td>
      </tr>
      <tr class="line">
        <td>KELAS</td>
        <td>:</td>
        <td><?=strtoupper($std->classroom)?></td>
      </tr>

      <tr class="line">
        <td>WALI KELAS</td>
        <td>:</td>
        <td><?=strtoupper($std->teacher_name)?></td>
      </tr>
      <tr class="line">
        <td>KEPALA MADRASAH </td>
        <td>:</td>
        <td><?=strtoupper($std->headmaster)?></td>
      </tr>      
    </table>
    </center>
    </div>
  </div>
<center>
  <br>
  <br>
<div class="tegak"></div>
<div class="tegak"></div>
<div class="tegak"></div>
</center>
<h1>RAMADHAN 144H <br>
<?=date('Y')?>
</h1>
<br>

</div>
  <div class="landscape">
  <h1>TARGET RAMADHAN</h1>
<table border="1" width="100%" style='font-size:12px;border-collapse;collapse' cellspacing="0" cellpadding="3" >
<thead>
<tr>
<th>NO.</th>
<th>WAKTU</th>
<th>TARGET</th>

</tr>
</thead>
<tbody>
    <?php
    $i=1;
    foreach ($target as $s) {?>
    <tr>
    <td><?=$i++?>.</td>
    <td><?=$s['created_at']?></td>
    <td><?=$s['target']?></td>
    </tr>
    <?php } ?>
</tbody>
</table>

    <h1>KEGIATAN RAMADHAN</h1>
<table border="1" width="100%" style='font-size:12px;border-collapse;collapse' cellspacing="0" cellpadding="3" >
<thead>
<tr>
<th>NO.</th>
<th>WAKTU</th>
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
      $sholat = $s['sholat'] == 'N;'? NULL : unserialize($s['sholat']);
        ?>
    <tr>
    <td><?=$i++?>.</td>
    <td><?=$s['created_at']?></td>
    <td><?=$s['puasa']?></td>
    <td><?php
    if ($sholat !==NULL) {
      foreach ($sholat as $key => $value) {
        echo "<li>".$value."</li>";
     }
      
    }else{echo "Tidak";}

   ?></td>
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
    <td><?=$s['masjid']?></td>
    </tr>
    <?php } ?>
</tbody>
</table>
  </div>
<!-- 
  <div class="landscape">
    <h1>Halaman Ketiga</h1>
    <p>Ini adalah halaman ketiga dan juga akan dicetak dalam format lanskap.</p>
  </div> -->

  <script type="text/javascript">
  window.print()
  </script>
</body>
</html>
