<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url('assets/'); ?>img/ico/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/'); ?>img/ico/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/'); ?>img/ico/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/'); ?>img/ico/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url('assets/'); ?>img/ico/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url('assets/'); ?>img/ico/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url('assets/'); ?>img/ico/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url('assets/'); ?>img/ico/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/ico/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/ico/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/ico/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/ico/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/ico/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="&nbsp;"/>
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />


  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Login css -->
  <link rel="stylesheet"  href="<?= base_url('assets/');?>css/login.css">

</head>

<img class="wave" src="<?= base_url('assets/'); ?>img/home/wave.png">
  <div class="container">
    <div class="img">
      <img src="<?= base_url('assets/'); ?>img/home/undraw_medicine_b1ol.svg">
    </div>
    <div class="login-content">
      <form method="post" action="<?= base_url('auth/index'); ?>">
        <img src="<?= base_url('assets/'); ?>img/home/puskesmas_pangkal_balam_logo.jpg">
        <h2 class="title">Selamat Datang</h2>

        <?= $this->session->flashdata('message'); ?>

        <?= validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>

              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Email</h5>
                    <input type="text" class="input" name="email">
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" class="input" name="password">
                 </div>
              </div>
              <button type="submit" class="btn">
                Login
              </button>
              <a href="<?= base_url('home'); ?>" class="text-center home">Halaman Utama</a>
            </form>

        </div>
    </div>

  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <!-- Login js-->
  <script src="<?= base_url('assets/');?>js/login.js"></script>

</body>

</html>
