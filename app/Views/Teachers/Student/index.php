<?= $this->extend('Teachers/Layouts') ?>
<?= $this->section('content') ?>
<h1 class="h4 mb-2 text-gray-800">Santri Kelas <b>(<?=MyClass()->classroom?>)</b></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header bg-gradient-primary">
<h6 class="m-0 font-weight-bold text-white">List of Santri Kelas <b>(<?=MyClass()->classroom?>)</b></h6>
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
<th>JURNAL</th>
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
        <a href="<?=base_url('walas/student/jurnal/'.$s['id'])?>" class="btn btn-primary shadow-sm btn-sm"> <i class="far fa-folder-open"></i> Lihat Jurnal</a>
        <button onclick="confirm(<?=$s['id']?>)" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i></button>
    </td>
    
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
</div>

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