<div class="modal fade" id="modal-student" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_label"><i class="fa fa-edit"></i> Student Register</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form-reg-student">
                    <div class="alert alert-warning">
                    <small>Pendaftaran akan di tolak jika memberikan data yang tidak benar ! </small>
                    </div>

                    <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="number" name="nisn" id="nisn" class="form-control form-control-sm" placeholder="Nomor Induk Siswa Nasional">
                    <div class="err-nisn invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                    <label for="nm_lengkap">Nama Lengkap Santri</label>
                    <input type="text" name="nm_lengkap" id="nm_lengkap" class="form-control form-control-sm" placeholder="Contoh : Muhammad Abduh">
                    <div class="err-nm_lengkap invalid-feedback"></div>
                    </div>

                    <div class="form-group">

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk-lk" value="L">
                    <label class="form-check-label" for="jk-lk">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk-pr" value="P">
                    <label class="form-check-label" for="jk-pr">Perempuan</label>
                    </div>
                    </div>

                    <div class="bg-info text-white shadow-sm p-3" style="border-radius:7px">
                    <div class="mb-3" style="border-bottom:2px dotted">
                        <strong>Identitas Kelas Santri</strong>
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
                        <option value="">Pilih Kelas</option>
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
                    $('#tingkat_kelas').html('<option value="">Pilih Tingkat Kelas</option>'+response.level)
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
                    $('#rombel').html(' <option value="">Pilih Kelas</option>'+response.rombel)
                }
            });
            }else{
                $('#area_rombel').addClass('d-none')
            }           
        });

        $('#form-reg-student').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?=base_url('register/student')?>",
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

                        if (response.error.nisn) {
                            $('#nisn').addClass('is-invalid')
                            $('.err-nisn').html(response.error.nisn)
                        }else{
                            $('#nisn').removeClass('is-invalid') 
                        }

                        if (response.error.nm_lengkap) {
                            $('#nm_lengkap').addClass('is-invalid')
                            $('.err-nm_lengkap').html(response.error.nm_lengkap)
                        }else{
                            $('#nm_lengkap').removeClass('is-invalid') 
                        }

                        if (response.error.jk) {
                            $('.form-check-input').addClass('is-invalid')
                        }else{
                            $('.form-check-input').removeClass('is-invalid') 
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
                        text : 'Pendaftaran Selesai, Selanjutnya Menunggu Akun di aktivasi Oleh Wali Kelas. Harap Hubung wali Kelas masing-masing jika Akun belum di aktivasi',
                        showConfirmButton: true,
                        }).then((result) => {
                            window.location='<?=base_url('/')?>';
                        })
                        
                    }
                }
            });
            
        });
    </script>