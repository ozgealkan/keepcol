<?php

?>
<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KeepCollection</title>
    <link rel="Shortcut Icon" href="img/logo.png" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&subset=latin,latin-ext" rel="stylesheet">

    

    <!-- Theme CSS -->
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
                <a class="navbar-brand page-scroll" href="#page-top"><img src="img/logo.png" class="img-responsive" alt="" width="50"></a>
                <h3 style="width:500px"><b>KeepCollection</b></h3>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="mycollection.php" class="page-scroll" href="#features">MY COLLECTION</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="getpeople.php">PEOPLE</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="getfollowing.php">FOLLOWING</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Create Your Collection</h1>
                            <a href="searchdatafront.php" class="btn btn-outline btn-xl page-scroll"> &nbsp&nbsp&nbsp***SEARCH***&nbsp &nbsp&nbsp</a>
                        </div>
                    </div>
                </div>
                 <div class="col-sm-5">
                    <div class="device-container">
                        <div class="device-mockup iphone6 portrait white">
                            <div class="device">
                                <div class="screen">
                                   <a href="getbook.php" class="btn btn-outline btn-xl page-scroll">  &nbsp&nbsp &nbsp&nbsp &nbspBOOKS &nbsp &nbsp&nbsp &nbsp&nbsp </a>
                                    <?php "<br>";?>
                                </div>

                                  
                                <?php "<br>";?>
                                 <div class="screen">
                                    <a href="getmovie.php" class="btn btn-outline btn-xl page-scroll">  &nbsp&nbsp &nbsp &nbspMOVIES &nbsp &nbsp&nbsp &nbsp&nbsp</a>
                                </div>
                                 <div class="screen">
                                   
                                     <a href="gettv.php" class="btn btn-outline btn-xl page-scroll"> &nbsp&nbsp&nbsp TV SERIES &nbsp &nbsp&nbsp &nbsp </a>

                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </header>

    

</body>

</html>