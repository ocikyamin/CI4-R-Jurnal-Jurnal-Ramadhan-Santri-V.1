<!DOCTYPE html>
<html lang="en">
<head>
<title>R-Jurnal | Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?=base_url('logo.png')?>" type="image/x-icon">
<link rel="shortcut icon" href="<?=base_url('logo.png')?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#4e73df">
<meta name="msapplication-TileColor" content="#4e73df">
<meta name="description" content="Halaman Login Aplikasi Manajemen Catatan Kegiatan Ramadhan Santri Pondok Pesantren Madrasah Tarbiyah Islamiyah Canduang ">
<meta name="keywords" content="Aplikasi Jurnal Ramadhan, Jurnal Ramadhan Online, Aplikasi Catatan Kegiatan Ramadhan, Jurnal Ramadhan MTI Canduang,pondok pesantren madrasah tarbiyah islamiyah canduang,pesantren candung bukittinggi,tarbiyah canduang ">
<meta name="author" content="Abdul Yamin, S.Pd">
<meta property="og:title" content="Login Aplikasi Jurnal Ramadhan">
<meta property="og:description" content="Halaman Login Aplikasi Manajemen Catatan Kegiatan Ramadhan Santri Pondok Pesantren Madrasah Tarbiyah Islamiyah Canduang">
<meta property="og:image" content="<?=base_url('logo.png')?>">
<meta property="og:url" content="<?=base_url()?>">
<link href="<?=base_url()?>public/SB/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>public/SB/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-5 col-lg-4 col-md-9">
<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
<div class="row">
<div class="col-lg-12">
<div class="p-5">
<div class="text-center">
<img src="<?=base_url('public/4r.webp')?>" width="200" height="100" alt="Logo Ramadhan">
<h1 class="h4 text-gray-900 mb-4"><b>Jurnal Ramadhan </b><br> <small>Madrasah Tarbiyah Islamiyah Canduang</small> </h1>
</div>
<form method="post" class="user" id="login-form">
<div class="form-group">
<input type="number" name="xcode" class="form-control form-control-user"
id="xcode" placeholder="User ID">
<div class="err-xcode invalid-feedback"></div>
</div>
<div class="form-group">
<input type="password" name="xpass" class="form-control form-control-user"
id="xpass" placeholder="Password">
<div class="err-xpass invalid-feedback"></div>
</div>
<div class="form-group">
<div class="custom-control custom-checkbox small">
<input type="checkbox" name="is_santri" value="1" class="custom-control-input" id="is_santri">
<label class="custom-control-label" for="is_santri">Saya Santri ?</label>
</div>
</div>
<button id="btn-login" class="btn btn-primary btn-user btn-block">
Login
</button>
</form>
<div class="text-center mt-2">
<small class="text-muted">
Belum Punya Akun ?
</small> 
<div>
<a href="<?=base_url('register')?>" class="mt-2 btn btn-light shadow-sm"><i class="far fa-edit"></i> Register Now</a>              
</div>
<div class="mt-3">
<a href="#" data-toggle="modal" data-target="#help" class="btn btn-success btn-sm">
<i class="fab fa-whatsapp"></i> Bantuan
</a>
<a href="https://drive.google.com/file/d/1xwzddUgG6l8gpVZDDrEv3YGRZl_9OxCl/view?usp=share_link" target="_blank" class="btn btn-secondary btn-sm">
<i class="far fa-file-pdf"></i> Baca Panduan
</a>
</div>
</div>
<hr>
<div class="text-center mt-3">
<div class="copyright text-center my-auto">
<span>Copyright © MTIC | R-Jurnal</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

    <div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Butuh Bantuan ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    
<div class="alert shadow-sm">
<a href="https://wa.me/6282172769443?text=Jangan hapus template ini, cukup ganti isi nya saja. jika tidak sesuai dengan format permintaan ditolak.
*Permintaan Aktivasi Akun Santri*

Ganti huruf x berikut dangan identitas ananda :
NISN : x
Nama : x
Kelas : x
Nama Wali Kelas : x" target="_blank" class="btn btn-success btn-block">
<i class="fab fa-whatsapp"></i> Akun Belum Aktivasi
</a>
</div>

<div class="alert shadow-sm">
<a href="https://wa.me/6282172769443?text=Jangan hapus template ini, cukup ganti isi nya saja. jika tidak sesuai dengan format permintaan ditolak.
*Pengaduan Pindah Kelas*

Ganti huruf x berikut dangan identitas ananda :
NISN : x
Nama : x
Kelas dipilih sebelumnya : x
Kelas Seharusnya : x
Nama Wali Kelas : x" target="_blank" class="btn btn-success btn-block">
<i class="fab fa-whatsapp"></i> Salah Pilih Kelas
</a>
</div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<!-- Bootstrap core JavaScript-->
<script src="<?=base_url()?>public/SB/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>public/SB/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?=base_url()?>public/SB/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?=base_url()?>public/SB/js/sb-admin-2.min.js"></script>
<script>
$('#login-form').submit(function (e) { 
e.preventDefault();
$.ajax({
type: "post",
url: "<?=base_url('login')?>",
data: $(this).serialize(),
dataType: "json",
beforeSend: function() {
$('#btn-login').prop('disabled', true);
$('#btn-login').html(
`<i class="fa fa-spin fa-spinner"></i>`
);
},
complete: function() {
$('#btn-login').prop('disabled', false);
$('#btn-login').html(`Masuk`);
},
success: function (response) {
if (response.error) {
if (response.error.xcode) {
$('#xcode').addClass('is-invalid');
$('.err-xcode').html(response.error.xcode);
}else{
$('#xcode').removeClass('is-invalid');
$('#xcode').addClass('is-valid');
}

if (response.error.xpass) {
$('#xpass').addClass('is-invalid');
$('.err-xpass').html(response.error.xpass);
}else{
$('#xpass').removeClass('is-invalid');
$('#xpass').addClass('is-valid');
}
}

if (response.sukses) {
window.location=response.link
}

}
});

});
</script>
</body>

</html>