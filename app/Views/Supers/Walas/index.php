<?= $this->extend('Supers/Layouts') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800">Wali Kelas</b></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-friends"></i> List Of Wali Kelas</h6>

</div>
<div class="card-body">
<div class="table-responsive">
<table  id="dataTable" width="100%" class="table table-sm table-striped" cellspacing="0">
<thead>
<tr class="th">
<th>NO.</th>
<th>NUPTK</th>
<th>NAMA</th>
<th>KELAS</th>
<th>AKUN</th>
<th><i class="fa fa-cogs"></i></th>
<th><i class="fa fa-key"></i></th>

</tr>
</thead>
<tbody>
    <?php
    $i=1;
    foreach ($walas as $s) {?>
    <tr class="td">
    <td><?=$i++?>.</td>
    <td><?=$s['nuptk']?></td>
    <td><?=$s['teacher_name']?></td>
    <td><?=$s['classroom']?></td>
    <td><?php 
    if ($s['is_active']==1) { echo "<span class='badge badge-success'>Aktif</span>";
    }else{echo "<span class='badge badge-danger'>Non Aktif</span>";} ?></td>
    <td>
        <div class="custom-control custom-switch">
        <input type="checkbox" onclick="Aktivasi(<?=$s['id']?>,<?=$s['is_active']?>)" class="custom-control-input" id="switch-<?=$s['id']?>" <?=$s['is_active']==1? 'checked':null ?>>
        <label class="custom-control-label" for="switch-<?=$s['id']?>"></label>
        </div>
    </td>
    <td>
        <button onclick="ResetPassword(<?=$s['id']?>,<?=$s['is_active']?>)" class="btn btn-danger btn-sm">Reset Password</button>
         <a href="" class="btn btn-primary btn-sm">Lihat Siswa</button>
    </td>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
</div>


<script>
    function Aktivasi(id,status) { 
        $.ajax({
            type: "post",
            url: "<?=base_url('super/walas/aktivasi')?>",
            data: {id:id,status:status},
            dataType: "json",
            success: function (response) {
                if (response.sukses) {
                    window.location='<?=base_url('super/walas')?>';
                }
            }
        });
     }

function ResetPassword(id) {
$.ajax({
type: "post",
url: "<?=base_url('super/walas/reset')?>",
data: {id:id},
dataType: "json",
success: function (response) {

if (response.sukses) {
window.location='<?=base_url('super/walas')?>';
}
}
});

}
</script>

<?= $this->endSection() ?>