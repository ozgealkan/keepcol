<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KeepCollection</title>
    <?php include 'css_back/css.html'; ?>
    <link rel="Shortcut Icon" href="img/logo.png" type="image/x-icon">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&subset=latin,latin-ext" rel="stylesheet">

    <link href="css/new-age.min.css" rel="stylesheet">

</head>
<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menü <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="deneme.php"><img src="img/logo.png" class="img-responsive" alt="" width="50"></a>
                <h3 style="width:500px"><b>KeepCollection</b></h3>
            </div> 
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="mycollection.php" class="page-scroll" href="#features">MY COLLECTION</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#features">PEOPLE</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">SETTINGS</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
 <?php
            
          $con=mysqli_connect("localhost","root","","accounts");
          mysqli_query($con,"SET NAMES UTF8");
   

?>
<header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    
                </div>
                
                   
                <div class="form">
                    <?php

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  for ($i=100;$i<300;$i++){

// Perform queries 
$sonuc=mysqli_query($con,"SELECT * FROM books WHERE id='$i' ");
while($tv = mysqli_fetch_array($sonuc))
{
                   
 ?>
<a href="bookcol.php?idk=<?=$tv['id']?>">ADD </a>


    <?php 
    
echo  $tv["name"]."<br>"."<br />"."<br />";

?>

<?php
}
}
mysqli_close($con);
?>