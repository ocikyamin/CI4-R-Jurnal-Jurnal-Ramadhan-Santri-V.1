
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">List of Santri Kelas <b>( <?=$rombel['classroom']?> )</b></h6>
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
        <a href="<?=base_url('super/student/jurnal/'.$s['id'])?>" class="btn btn-primary shadow-sm btn-sm"> <i class="far fa-folder-open"></i> Lihat Jurnal</a>
        <button onclick="confirm(<?=$s['id']?>)" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i></button>
    </td>
    
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<script>
$(document).ready(function() {
$('#dataTable').DataTable();
});
</script>