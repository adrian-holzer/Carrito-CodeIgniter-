
<!DOCTYPE html>
<html  lang="en" style="margin:0 ; padding:0% background-image: url('<?php  base_url('uploads/product_images/1.jpg') ?>');">
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="https://kit.fontawesome.com/3d4ea9e7a7.js"></script>

</head>
<header>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top " style="margin-bottom:2rem;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse animated fadeInDown" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ;?>">Inicio </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('categoria/index/1');?>">Notebooks </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('categoria/index/3');?>">Tablets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url('categoria/index/2');?>">Celulares</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('productos/buscar')?>" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>

</header>

<body>

<?php     
        $this->load->view('layout/slide');
?>




