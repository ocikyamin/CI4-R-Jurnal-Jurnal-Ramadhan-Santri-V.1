<div class="modal fade" id="modal-walas" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_label"><i class="fa fa-edit"></i> Walas Register</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form-reg-walas">
                    <!--<div class="alert alert-warning">-->
                    <!--<small>Pendaftaran akan di tolak jika memberikan data yang tidak benar ! </small>-->
                    <!--</div>-->
                    <div class="form-group">
                    <label for="nuptk">NUPTK/NIP</label>
                    <input type="number" name="nuptk" id="nuptk" class="form-control form-control-sm" placeholder="Nomor Induk">
                    <div class="err-nuptk invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                    <label for="nm_walas">Nama Lengkap & Gelar</label>
                    <input type="text" name="nm_walas" id="nm_walas" class="form-control form-control-sm" placeholder="Contoh : Dr. Adam Elfathan, M.Kom ">
                    <div class="err-nm_walas invalid-feedback"></div>
                    </div>

                   
                    <div class="bg-primary text-white shadow-sm p-3" style="border-radius:7px">
                    <div class="mb-3" style="border-bottom:2px dotted">
                        <strong>Klaim Kelas Anda </strong>
                    </div>                   
                    <div class="form-group">
                    <label for="satuan_pddk">Satuan Pendidikan</label>
                    <select name="satuan_pddk" class="form-control form-control-sm" id="satuan_pddk">
                        <option value="">Pilih Satuan Pendidikan</option>
                        <?php
                        foreach (Master('tm_educate') as $e) {?>
                        <option value="<?=$e['id']?>"><?=$e['school_name']?></option>
                        <?php } ?>
                    </select>
                    <div class="err-satuan_pddk invalid-feedback"></div>
                    </div>

                    <div class="form-group d-none" id="area_level">
                    <label for="tingkat_kelas">Tingkat Kelas</label>
                    <select name="tingkat_kelas" class="form-control form-control-sm" id="tingkat_kelas">
                        <option value="">Pilih Tingkat Kelas</option>
                    </select>
                    <div class="err-tingkat_kelas invalid-feedback"></div>
                    </div>

                    <div class="form-group d-none" id="area_rombel">
                    <label for="rombel">Kelas</label>
                    <select name="rombel" class="form-control form-control-sm" id="rombel">
                    </select>
                    <div class="err-rombel invalid-feedback"></div>
                    </div>

                    </div>


                    <div class="form-group">
                    <label for="newpass">Password Baru</label>
                    <input type="password" name="newpass" class="form-control form-control-sm"
                    id="newpass" placeholder="******">
                    <div class="err-newpass invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                    <label for="confpass">Ulangi Password</label>
                    <input type="password" name="confpass" class="form-control form-control-sm"
                    id="confpass" placeholder="******">
                    <div class="err-confpass invalid-feedback"></div>
                    </div>

                    <div class="alert alert-info">
                    <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                    <input type="checkbox" name="is_confirm" value="1" class="custom-control-input" id="is_confirm">
                    <label class="custom-control-label" for="is_confirm">Saya Setuju Bahwa data yang diberikan adalah benar ?</label>
                    </div>
                    </div>
                    </div>
                    <div class="text-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-primary" id="btn-reg"> <i class="fa fa-edit"></i> Daftar Sekarang </button>
                    </div>

                </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default">
                        Panduan Pendaftaran
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#satuan_pddk').change(function (e) { 
            e.preventDefault();
            if (!$(this).val()=="") {
                $.ajax({
                url: "<?=base_url('classlevel')?>",
                data: {edu: $(this).val()},
                dataType: "json",
                success: function (response) {
                    $('#area_level').removeClass('d-none')
                    $('#tingkat_kelas').html(response.level)
                }
            });
            }else{
                $('#area_level').addClass('d-none')
            }           
        });

        $('#tingkat_kelas').change(function (e) { 
            e.preventDefault();
            if (!$(this).val()=="") {
                $.ajax({
                url: "<?=base_url('getrombel')?>",
                data: {rombel: $(this).val()},
                dataType: "json",
                success: function (response) {
                    $('#area_rombel').removeClass('d-none')
                    $('#rombel').html(response.rombel)
                }
            });
            }else{
                $('#area_rombel').addClass('d-none')
            }           
        });

        $('#form-reg-walas').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?=base_url('register/walas')?>",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                $('#btn-reg').prop('disabled', true);
                $('#btn-reg').html(
                `<i class="fa fa-spin fa-spinner"></i> Loading ...`
                );
                },
                complete: function() {
                $('#btn-reg').prop('disabled', false);
                $('#btn-reg').html(`<i class="fa fa-edit"></i> Daftar Sekarang`);
                },
                success: function (response) {
                    if (response.error) {

                        if (response.error.nuptk) {
                            $('#nuptk').addClass('is-invalid')
                            $('.err-nuptk').html(response.error.nuptk)
                        }else{
                            $('#nuptk').removeClass('is-invalid') 
                        }

                        if (response.error.nm_walas) {
                            $('#nm_walas').addClass('is-invalid')
                            $('.err-nm_walas').html(response.error.nm_walas)
                        }else{
                            $('#nm_walas').removeClass('is-invalid') 
                        }


                        if (response.error.satuan_pddk) {
                            $('#satuan_pddk').addClass('is-invalid')
                            $('.err-satuan_pddk').html(response.error.satuan_pddk)
                        }else{
                            $('#satuan_pddk').removeClass('is-invalid') 
                        }

                        if (response.error.tingkat_kelas) {
                            $('#tingkat_kelas').addClass('is-invalid')
                            $('.err-tingkat_kelas').html(response.error.tingkat_kelas)
                        }else{
                            $('#tingkat_kelas').removeClass('is-invalid') 
                        }

                        if (response.error.rombel) {
                            $('#rombel').addClass('is-invalid')
                            $('.err-rombel').html(response.error.rombel)
                        }else{
                            $('#rombel').removeClass('is-invalid') 
                        }
                        if (response.error.newpass) {
                            $('#newpass').addClass('is-invalid')
                            $('.err-newpass').html(response.error.newpass)
                        }else{
                            $('#newpass').removeClass('is-invalid') 
                        }
                        if (response.error.confpass) {
                            $('#confpass').addClass('is-invalid')
                            $('.err-confpass').html(response.error.confpass)
                        }else{
                            $('#confpass').removeClass('is-invalid') 
                        }
                        if (response.error.is_confirm) {
                            $('#is_confirm').addClass('is-invalid')
                            $('.err-is_confirm').html(response.error.is_confirm)
                        }else{
                            $('#is_confirm').removeClass('is-invalid') 
                        }



                    }
                    // end error 
                    if (response.sukses) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Terimakasih',
                        text : 'Pendaftaran Selesai, Silahkan Login',
                        showConfirmButton: true,
                        }).then((result) => {
                            window.location='<?=base_url('/')?>';
                        })
                        
                    }
                }
            });
            
        });
    </script>