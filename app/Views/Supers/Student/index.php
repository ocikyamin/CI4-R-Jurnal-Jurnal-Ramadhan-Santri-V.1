<?= $this->extend('Supers/Layouts') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800">Data Santri</b></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">List of Santri</h6>
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
<th>STATUS</th>
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
    <td><?=$s['classroom']?></td>
     <td>
         <?php
         if($s['is_active']==0){
             echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
         }else if($s['is_active']==1){
             echo '<span class="badge badge-success">Diterima</span>';
         }else {
             echo '<span class="badge badge-danger">Permintaan Ditolak</span>';
         }
         
         ?></td>
    <td>
        <a href="<?=base_url('super/student/jurnal/'.$s['id'])?>" class="btn btn-primary shadow-sm btn-sm"> <i class="far fa-folder-open"></i> Lihat Jurnal</a>
        <button onclick="confirm(<?=$s['id']?>)" class="btn btn-secondary btn-sm"><i class="fa fa-cog"></i></button>
        <button onclick="ResetPassword(<?=$s['id']?>)" class="btn btn-warning btn-sm"><i class="fa fa-key"></i></button>
        <a href="<?=base_url('super/student/hapus/'.$s['id'])?>" class="btn btn-danger shadow-sm btn-sm"> <i class="fa fa-trash"></i></a>
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
function ResetPassword(id) {
$.ajax({
type: "post",
url: "<?=base_url('super/student/reset')?>",
data: {id:id},
dataType: "json",
success: function (response) {

if (response.sukses) {
window.location='<?=base_url('super/santri/all')?>';
}
}
});

}
</script>

<?= $this->endSection() ?>