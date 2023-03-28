<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Settings?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert bg-secondary shadow-sm p-3">
                    <p>
                           <b class="text-white"> Konfirmasi Akun</b>
                        </p>
                        <form action="" method="post">
                            <input type="hidden" id="student_id" name="id" value="<?=$siswa['id']?>">
                        <select name="acc" id="acc" class="form-control">
                        <option value="">Pilih Persetujuan</option>
                        <option value="1">Terima</option>
                        <option value="2">Tolak</option>
                        </select> 
                        </form>
                    </div>

                    <div class="alert bg-primary shadow-sm p-3">
                        <p>
                           <b class="text-white"> Peimindahan Kelas</b>
                        </p>
                        <select name="move" id="move" class="form-control">
                        <option value="">Pilih Kelas Tujuan</option>
                        <?php
                        foreach (Master('tm_kelas_rombel') as $k) {?>
                        <option value="<?=$k['id']?>"><?=$k['classroom']?></option>
                        <?php } ?>
                        </select> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#acc').change(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?=base_url('super/student/store-confirm')?>",
                data: {id: $('#student_id').val(),acc: $(this).val()},
                dataType: "json",
                success: function (response) {
                    if (response.sukses) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Terimakasih',
                        text : 'Konfrimasi Selesai',
                        showConfirmButton: true,
                        timer: 1500
                        }).then((result) => {
                            window.location.reload();
                        })
                    }
                }
            });
            
        });

        $('#move').change(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?=base_url('super/student/move-kelas')?>",
                data: {id: $('#student_id').val(),kelas: $(this).val()},
                dataType: "json",
                success: function (response) {
                    if (response.sukses) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Selesai',
                        text : 'Kelas Telah diganti',
                        showConfirmButton: true,
                        timer: 1500
                        }).then((result) => {
                            window.location.reload();
                        })
                    }
                }
            });
            
        });
    </script>