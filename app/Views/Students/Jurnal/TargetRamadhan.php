<?= $this->extend('Students/Layouts') ?>
<?= $this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Target Ramadhan</h1>
</div>
<div class="row">
<div class="col-lg-12">
    <div class="card shadow-sm mb-2">
        <div class="card-body">
            <div class="alert alert-info mb-3">
                Silahkan Buat Apa Target yang ingin kamu capai pada Ramadhan kali ini !
            </div>
            <form id="form-target" method="post">
            <?=csrf_field()?>
            <input type="hidden" name="id" value="<?=Student()->id?>">
            <div class="form-group">
                <textarea name="target" rows="3" class="form-control" required placeholder="Tuliskan Target Ramadhan disini"></textarea>
            </div>
            <div class="form-group">
                <button id="btn-target" type="submit" class="btn btn-primary">Buat Target</button>
            </div>
            </form>
        </div>
    </div>

    

            <?php
            if (!empty($target)) {
                ?>
                <h5 class="text-title mb-3 mt-3">
                Daftar Target Ramadhan
            </h5>
                    <?php
                    foreach ($target as $t) {?>
                    <div class="alert m-1 shadow-sm">
                    <div>
                    <a href="#" onclick="HapusTarget(<?=$t['id']?>)" class="btn btn-danger btn-circle btn-sm">
                    <i class="fas fa-trash"></i>
                    </a> <small><code><?=date('d/m/Y H:i:s', strtotime($t['created_at']))?></code></small>

                    </div>
                    <p>
                    <?=$t['target']?>
                    </p>
                    </div>
                    <?php } ?>
                <?php
            }else{
                echo ' <div class="alert alert-warning m-1 shadow-sm">Belum ada target</div>';
            }
            ?>
 

    </div>
    </div>

  

          

<script>
  $('#form-target').submit(function (e) { 
    e.preventDefault();


    $.ajax({
      type: "post",
      url: "<?=base_url('student/save-target')?>",
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function() {
              $('#btn-target').prop('disabled', true);
              $('#btn-target').html(
              `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...`
              );
              },
              complete: function() {
              $('#btn-target').prop('disabled', false);
              $('#btn-target').html(`Buat Target`);
              },
      success: function (response) {
        if (response.sukses) {
          Swal.fire({
                  icon: 'success',
                  title: 'Yes',
                  text : 'Target Ramadhan Ditambahkan',
                  showConfirmButton: true,
                  timer: 1500
                  }).then((result) => {
                            window.location.reload();
                        })
        }



        
        
      }
    });
    
  });

  function HapusTarget(id) {
    Swal.fire({
  title: 'Apakah Yakin?',
  text: "Kamu Akan menghapus data ini",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
        $.ajax({
          type :"post",
          url: "<?=base_url('student/hapus')?>",
          data: {id:id,table: "target_ramadhan"},
          dataType: "json",
          success: function (response) {
              if (response.res) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                
                window.location.reload();
              }
          }
      });

  
  }
})
    

     
    }
</script>
<?= $this->endSection() ?>