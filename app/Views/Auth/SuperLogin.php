<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>R-Jurnal | Login</title>
<link href="<?=base_url()?>public/SB/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!-- Custom styles for this template-->
<link href="<?=base_url()?>public/SB/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
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
<img src="<?=base_url('logo.webp')?>" width="50%">
<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
</div>
<form class="user" id="login-form">
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
<button id="btn-login" class="btn btn-primary btn-user btn-block">
Login
</button>
</form>
<hr>
<div class="text-center">
<a class="small" href="#">R-Jurnal</a>
</div>
<div class="text-center">
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
url: "<?=base_url('login/super')?>",
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