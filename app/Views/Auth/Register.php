<!DOCTYPE html>
<html lang="en">
<head>
<title>R-Jurnal | Register</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#4e73df">
<meta name="msapplication-TileColor" content="#4e73df">
<link rel="icon" href="<?=base_url('favicon.png')?>" type="image/x-icon">
<link rel="shortcut icon" href="<?=base_url('favicon.png')?>" type="image/x-icon">
<meta name="description" content="Halaman Register Aplikasi Manajemen Catatan Kegiatan Ramadhan Santri Pondok Pesantren Madrasah Tarbiyah Islamiyah Canduang ">
<meta name="keywords" content="Jurnal Ramadhan Online, Aplikasi Catatan Kegiatan Ramadhan, Jurnal Ramadhan MTI Canduang ">
<meta name="author" content="Abdul Yamin, S.Pd">
<meta property="og:title" content="Register Aplikasi Jurnal Ramadhan">
<meta property="og:description" content="Halaman Login Aplikasi Manajemen Catatan Kegiatan Ramadhan Santri Pondok Pesantren Madrasah Tarbiyah Islamiyah Canduang">
<meta property="og:image" content="<?=base_url('logo.png')?>">
<meta property="og:url" content="<?=base_url()?>">
<link href="<?=base_url()?>public/SB/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<link href="<?=base_url()?>public/SB/css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>public/SB/sweetalert2/dist/sweetalert2.min.css" />
<script src="<?=base_url()?>public/SB/sweetalert2/dist/sweetalert2.min.js"></script>
</head>
<body class="bg-light">
<div class="container">
<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-5 col-lg-4 col-md-9">

<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
<!-- Nested Row within Card Body -->
<div class="row">
<!-- <div class="col-lg-6"></div> -->
<div class="col-lg-12">
<div class="p-5">
    <div class="text-center">
       <img src="<?=base_url('public/4r.webp')?>" width="200" height="100" alt="Logo Ramadhan">
        <h1 class="h4 text-gray-900 mb-4">Register <br><b>Jurnal Ramadhan </b><br> <small>Madrasah Tarbiyah Islamiyah Canduang</small> </h1>
        <hr>
    </div>
    <div class="user">
        <div class="text-center mb-3">
            Select Your Account Type
        </div>
        <div class="row">

        <div class="col-lg-6">
            <button id="reg-student" class="card shadow-sm mb-3">
                <div class="card-body text-center">
                    <img src="<?=base_url('public/2.png')?>" width="50%">
                    <div>
                    Daftar Santri
                    </div>
                </div>
            </button>
        </div>

        <div class="col-lg-6">
            <button id="reg-walas" class="card shadow-sm">
                <div class="card-body text-center">
                    <img src="<?=base_url('public/3.png')?>" width="50%">
                    <div>
                    Daftar Walas
                    </div>
                </div>
            </button>
        </div>
        </div>
    </div>
    <a href="<?=base_url('/')?>" class="mt-2 btn btn-primary btn-sm shadow-sm btn-block"><i class="fas fa-sign-in-alt"></i> Login</a>
    <div class="text-center mt-2">
        <hr>
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
<div class="modalview">

</div>
<!-- Bootstrap core JavaScript-->
<script src="<?=base_url()?>public/SB/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>public/SB/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url()?>public/SB/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url()?>public/SB/js/sb-admin-2.min.js"></script>
<script>

$('#reg-student').click(function (e) { 
e.preventDefault();
$.ajax({
url: "<?=base_url('register/student')?>",
data: "data",
dataType: "json",
success: function (response) {
$('.modalview').html(response.view)
$('#modal-student').modal('show')
}
});


});

$('#reg-walas').click(function (e) { 
e.preventDefault();
$.ajax({
url: "<?=base_url('register/walas')?>",
data: "data",
dataType: "json",
success: function (response) {
$('.modalview').html(response.view)
$('#modal-walas').modal('show')
}
});


});




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