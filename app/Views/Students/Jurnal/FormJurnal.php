<?= $this->extend('Students/Layouts') ?>
<?= $this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Buat Jurnal</h1>
</div>



<div class="row">
<div class="col-lg-1"></div>
    <div class="col-lg-10">

<div class="card mb-4">
<div class="card-header">Buat Jurnal Ramadhan</div>
<div class="card-body">
   <!-- Form -->
 <!-- Form -->
 <form method="post" id="form-jurnal">
            <?=csrf_field()?>
            <input type="hidden" name="periode_id" value="1">
            <input type="hidden" name="rombel_id" value="<?=Student()->rombel_id?>">
            <input type="hidden" name="siswa_id" value="<?=Student()->id?>">

  
            <div class="form-group">
            <label class="form-label">Tanggal Jurnal</label>
            <input type="date" name="tgl_jurnal" id="tgl_jurnal" class="form-control" value="<?=date('Y-m-d')?>">
            <div class="err_tgl_jurnal invalid-feedback"></div>
            </div>
                      <div class="form-group">
                        <label class="form-label"><b>Apakah Hari ini Kamu Puasa ?</b> <br>
                        <div class="err_puasa badge badge-danger d-none"></div>
                      </label>
                         <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_puasa" id="puasa-ya" value="Ya">
                          <label class="form-check-label" for="puasa-ya">Ya</label>
                          </div>
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_puasa" id="puasa-no" value="Tidak">
                          <label class="form-check-label" for="puasa-no">Tidak</label>
                        </div>
                        
                      </div>
                    
                      <div class="form-group">
                        <label class="form-label"><b>Centang daftar Sholat yang kamu kerjakan hari ini !</b> <br>
                        <div class="err_sholat badge badge-danger d-none"></div>
                      </label> <br>
                        <?php
                        foreach (Master('tm_sholat') as $s) {?>
                          <div class="form-check">
                            <input class="form-check-input" name="sholat[]" type="checkbox" value="<?=$s['sholat']?>" id="<?=$s['id']?>">
                            <label class="form-check-label" for="<?=$s['id']?>">
                              <?=$s['sholat']?>
                            </label>
                          </div>
                          <?php } ?>
                      </div>
               
                    
                      <div class="form-group">
                        <label class="form-label"><b>Apakah Hari ini Kamu Tadarus ?</b> <br>
                        <div class="err_tadarus badge badge-danger d-none"></div>
                      </label> <br>
                        
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_tadarus" id="tadarus-ya" value="Ya">
                          <label class="form-check-label" for="tadarus-ya">Ya</label>
                        </div>
                        
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_tadarus" id="tadarus-no" value="Tidak">
                          <label class="form-check-label" for="tadarus-no">Tidak</label>
                        </div>
                        
                        <div id="tadarus-area" class="d-none mt-2 p-3 bg-primary text-white" style="border:2px dotted;border-radius:15px">
                          <div class="row mb-2">                                                       
                            <label class="col-lg-2">Mulai</label>
                            <div class="col-lg-6">
                              <input type="text" name="tadarus_mulai" id="tadarus_mulai" class="form-control" placeholder="Contoh : Al-Baqarah Ayat 1">
                              <div class="err_tadarus_mulai invalid-feedback"></div>
                            </div>
                          </div>
                          <div class="row">                                                       
                            <label class="col-lg-2">Sampai</label>
                            <div class="col-lg-6">
                              <input type="text" name="tadarus_sampai" id="tadarus_sampai" class="form-control" placeholder="Contoh : Al-Baqarah Ayat 30">
                            <div class="err_tadarus_sampai invalid-feedback"></div>
                          </div>
                            </div>
                          </div>
                        </div>

                      <div class="form-group">
                        <label class="form-label"><b>Apakah Hari ini Kamu Baca Al-Qur'an Secara Mandiri ?</b> <br>
                        <div class="err_bacaqr badge badge-danger d-none"></div>
                      </label> <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_bacaqr" id="bacaqr-ya" value="Ya">
                          <label class="form-check-label" for="bacaqr-ya">Ya</label>
                          </div>
                          
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_bacaqr" id="bacaqr-no" value="Tidak">
                          <label class="form-check-label" for="bacaqr-no">Tidak</label>
                        </div>
                        
                          <div id="bacaqr-area" class="d-none mt-2 p-3 bg-primary text-white" style="border:2px dotted;border-radius:15px">
                          <div class="row mb-2">                                                       
                            <label class="col-lg-2">Mulai</label>
                            <div class="col-lg-6">
                              <input type="text" name="bacaqr_mulai" id="bacaqr_mulai" class="form-control" placeholder="Contoh : Al-Baqarah Ayat 1">
                              <div class="err_bacaqr_mulai invalid-feedback"></div>
                            </div>
                          </div>
                          <div class="row">                                                       
                            <label class="col-lg-2">Sampai</label>
                            <div class="col-lg-6">
                              <input type="text" name="bacaqr_sampai" id="bacaqr_sampai" class="form-control" placeholder="Contoh : Al-Baqarah Ayat 30">
                              <div class="err_bacaqr_sampai invalid-feedback"></div>
                            </div>
                            </div>
                          </div>
                        </div>

                      <div class="form-group">
                        <label class="form-label"><b>Apakah Hari ini kamu Menambah Hafalan Al-Qur'an  ?</b> <br>
                        <div class="err_tambahtahfidz badge badge-danger d-none"></div>
                       </label> <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_tambahtahfidz" id="tambahhafidz-ya" value="Ya">
                          <label class="form-check-label" for="tambahhafidz-ya">Ya</label>
                        </div>
                        
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_tambahtahfidz" id="tambahhafidz-no" value="Tidak">
                          <label class="form-check-label" for="tambahhafidz-no">Tidak</label>
                          </div>

                          <div id="tambahhafidz-area" class="d-none mt-2 p-3 bg-primary text-white" style="border:2px dotted;border-radius:15px">
                            <div class="row mb-2">
                              <div class="col-lg-12">
                            <label>Nama Surat Hafalan</label>
                            <input type="text" name="tambahhafidz" id="tambahhafidz" class="form-control" placeholder="Contoh : Al-Baqarah Ayat 1">
                            <div class="err_tambahhafidz invalid-feedback"></div>
                          </div>
                            </div>
                            
                          </div>
                      </div>
                   
                      <div class="form-group">
                        <label class="form-label"><b>Apakah Hari ini kamu Mengulang (Muraja'ah) Hafalan Al-Qur'an  ?</b> <br>
                        <div class="err_murajaah badge badge-danger d-none"></div>
                      </label> <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_murajaah" id="murajaah-ya" value="Ya">
                          <label class="form-check-label" for="murajaah-ya">Ya</label>
                        </div>
                        
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_murajaah" id="murajaah-no" value="Tidak">
                          <label class="form-check-label" for="murajaah-no">Tidak</label>
                        </div>
                        
                        <div id="murajaah-area" class="d-none mt-2 p-3 bg-primary text-white" style="border:2px dotted;border-radius:15px">
                          <div class="row mb-2">
                            <div class="col-lg-12">
                            <label>Nama Surat yang diulang</label>
                            <input type="text" name="murajaah" id="murajaah" class="form-control" placeholder="Contoh : Al-Baqarah Ayat 1">
                            <div class="err_murajaah2 invalid-feedback"></div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                   
                      <div class="form-group">
                        <label class="form-label"><b>Apakah Hari ini kamu Memberikan Ceramah Ramadhan  ?</b> <br>
                        <div class="err_ceramah badge badge-danger d-none"></div>
                      </label> <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_ceramah" id="ceramah-ya" value="Ya">
                          <label class="form-check-label" for="ceramah-ya">Ya</label>
                        </div>
                        
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="p_ceramah" id="ceramah-no" value="Tidak">
                          <label class="form-check-label" for="ceramah-no">Tidak</label>
                        </div>
                        
                        <div id="ceramah-area" class="d-none mt-2 p-3 bg-primary text-white" style="border:2px dotted;border-radius:15px">
                          
                        <div class="row mb-2">
                          <div class="col-lg-12">
                            <label>Nama Masjid / Mushola</label>
                            <input type="text" name="ceramah_nm_masjid" id="ceramah_nm_masjid" class="form-control" placeholder="Contoh : Nurul Iman">
                            <div class="err_ceramah_nm_masjid invalid-feedback"></div>
                          </div>
                            </div>

                          <div class="row mb-2">
                            <div class="col-lg-12">
                              <label>Judul Ceramah</label>
                              <input type="text" name="ceramah_judul" id="ceramah_judul" class="form-control" placeholder="Contoh : Tips Menjaga Puasa">
                            <div class="err_ceramah_judul invalid-feedback"></div>
                          </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-lg-12">
                            <label>Link Dokumentasi Cearamh</label>
                            <input type="text" name="ceramah_link" id="ceramah_link" class="form-control" placeholder="Salin Link Dokumentasi disini">
                            <div class="err_ceramah_link invalid-feedback"></div>
                          </div>

                        
                        
                      </div>

                      </div>
                    </div>

                    
                    <div class="alert alert-success shadow-sm">                        
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" name="is_valid" type="checkbox" value="1" id="is_valid">
                        <label class="form-check-label" for="is_valid">
                          Saya mengisi semua data dengan jujur
                        </label>
                        <div class="invalid-feedback"></div>
                      </div>
                      <button class="btn btn-warning mt-3" id="btn-jurnal" type="submit">Krim Jurnal Ramadhan</button>
                    </div>
            
                    <!-- Button -->
                  </div>
                  
                </form>

<!-- End Form  -->

</div>
</div>

  

          

<script>

  $('#tadarus-ya').click(function (e) { 
    $('#tadarus-area').removeClass('d-none')
  });

  $('#tadarus-no').click(function (e) { 
    $('#tadarus-area').addClass('d-none')
  });

  $('#bacaqr-ya').click(function (e) { 
    $('#bacaqr-area').removeClass('d-none')
  });

  $('#bacaqr-no').click(function (e) { 
    $('#bacaqr-area').addClass('d-none')
  });

  $('#tambahhafidz-ya').click(function (e) { 
    $('#tambahhafidz-area').removeClass('d-none')
  });

  $('#tambahhafidz-no').click(function (e) { 
    $('#tambahhafidz-area').addClass('d-none')
  });


  $('#murajaah-ya').click(function (e) { 
    $('#murajaah-area').removeClass('d-none')
  });

  $('#murajaah-no').click(function (e) { 
    $('#murajaah-area').addClass('d-none')
  });

  
  $('#ceramah-ya').click(function (e) { 
    $('#ceramah-area').removeClass('d-none')
  });

  $('#ceramah-no').click(function (e) { 
    $('#ceramah-area').addClass('d-none')
  });

  $('#form-jurnal').submit(function (e) { 
    e.preventDefault();


    $.ajax({
      type: "post",
      url: "<?=base_url('student/save-jurnal')?>",
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function() {
              $('#btn-jurnal').prop('disabled', true);
              $('#btn-jurnal').html(
              `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...`
              );
              },
              complete: function() {
              $('#btn-jurnal').prop('disabled', false);
              $('#btn-jurnal').html(`Krim Jurnal Ramadhan`);
              },
      success: function (response) {
        console.log(response)
    
        if (response.error) {
          if (response.error.tgl_jurnal) {
            $('#tgl_jurnal').addClass('is-invalid')
            $('.err_tgl_jurnal').html(response.error.tgl_jurnal)
          }else{
            $('#tgl_jurnal').removeClass('is-invalid')
          }

          if (response.error.p_puasa) {
            $('.err_puasa').removeClass('d-none')
            $('.err_puasa').html(response.error.p_puasa)
          }else{
            $('.err_puasa').addClass('d-none')
          }
          if (response.error.sholat) {
            $('.err_sholat').removeClass('d-none')
            $('.err_sholat').html(response.error.sholat)
          }else{
            $('.err_sholat').addClass('d-none')
          }
          if (response.error.p_tadarus) {
            $('.err_tadarus').removeClass('d-none')
            $('.err_tadarus').html(response.error.p_tadarus)
          }else{
            $('.err_tadarus').addClass('d-none')
          }
          if (response.error.p_bacaqr) {
            $('.err_bacaqr').removeClass('d-none')
            $('.err_bacaqr').html(response.error.p_bacaqr)
          }else{
            $('.err_bacaqr').addClass('d-none')
          }
          if (response.error.p_tambahtahfidz) {
            $('.err_tambahtahfidz').removeClass('d-none')
            $('.err_tambahtahfidz').html(response.error.p_tambahtahfidz)
          }else{
            $('.err_tambahtahfidz').addClass('d-none')
          }
          if (response.error.p_murajaah) {
            $('.err_murajaah').removeClass('d-none')
            $('.err_murajaah').html(response.error.p_murajaah)
          }else{
            $('.err_murajaah').addClass('d-none')
          }

          if (response.error.p_ceramah) {
            $('.err_ceramah').removeClass('d-none')
            $('.err_ceramah').html(response.error.p_ceramah)
          }else{
            $('.err_ceramah').addClass('d-none')
          }

          if (response.error.tadarus_mulai) {
            $('#tadarus_mulai').addClass('is-invalid')
            $('.err_tadarus_mulai').html(response.error.tadarus_mulai)
          }else{
            $('#tadarus_mulai').removeClass('is-invalid')
          }

          if (response.error.tadarus_sampai) {
            $('#tadarus_sampai').addClass('is-invalid')
            $('.err_tadarus_sampai').html(response.error.tadarus_sampai)
          }else{
            $('#tadarus_sampai').removeClass('is-invalid')
          }

          if (response.error.bacaqr_mulai) {
            $('#bacaqr_mulai').addClass('is-invalid')
            $('.err_bacaqr_mulai').html(response.error.bacaqr_mulai)
          }else{
            $('#bacaqr_mulai').removeClass('is-invalid')
          }

          if (response.error.bacaqr_sampai) {
            $('#bacaqr_sampai').addClass('is-invalid')
            $('.err_bacaqr_sampai').html(response.error.bacaqr_sampai)
          }else{
            $('#bacaqr_sampai').removeClass('is-invalid')
          }

          if (response.error.tambahhafidz) {
            $('#tambahhafidz').addClass('is-invalid')
            $('.err_tambahhafidz').html(response.error.tambahhafidz)
          }else{
            $('#tambahhafidz').removeClass('is-invalid')
          }

          if (response.error.murajaah) {
            $('#murajaah').addClass('is-invalid')
            $('.err_murajaah2').html(response.error.murajaah)
          }else{
            $('#murajaah').removeClass('is-invalid')
          }

          if (response.error.ceramah_nm_masjid) {
            $('#ceramah_nm_masjid').addClass('is-invalid')
            $('.err_ceramah_nm_masjid').html(response.error.ceramah_nm_masjid)
          }else{
            $('#ceramah_nm_masjid').removeClass('is-invalid')
          }

          if (response.error.ceramah_judul) {
            $('#ceramah_judul').addClass('is-invalid')
            $('.err_ceramah_judul').html(response.error.ceramah_judul)
          }else{
            $('#ceramah_judul').removeClass('is-invalid')
          }
          if (response.error.ceramah_link) {
            $('#ceramah_link').addClass('is-invalid')
            $('.err_ceramah_link').html(response.error.ceramah_link)
          }else{
            $('#ceramah_link').removeClass('is-invalid')
          }


          if (response.error.is_valid) {
                  Swal.fire({
                  icon: 'warning',
                  title: 'Warning',
                  text : 'Harap Konfirmasi dahulu, bahwa data yang ananda kirim telah di isi dengan benar dan jujur',
                  showConfirmButton: false,
                  timer: 1500
                  })
          }


        }

        if (response.sukses) {
          Swal.fire({
                  icon: 'success',
                  title: 'Terimakasih',
                  text : 'Jawaban Ananda Telah Direkam',
                  showConfirmButton: true,
                  timer: 1500
                  }).then((result) => {
                            window.location='<?=base_url('student/buat-jurnal')?>';
                        })
        }



        
        
      }
    });
    
  });
</script>
<?= $this->endSection() ?>