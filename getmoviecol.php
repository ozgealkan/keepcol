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

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="mycollection.php" class="page-scroll" href="#features">MY COLLECTION</a>
                    </li>
                    <li>
                        <a class="getpeople.php" href="#features">PEOPLE</a>
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
 <?php
          session_start();  
          $con=mysqli_connect("localhost","root","","accounts");
// Check connection
$ca = curl_init();
curl_setopt($ca, CURLOPT_URL, "http://api.themoviedb.org/3/configuration?api_key=f801b965af203c780135ad964ffd19ce");
curl_setopt($ca, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ca, CURLOPT_HEADER, FALSE);
curl_setopt($ca, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ca);
curl_close($ca);
//var_dump($response);
?>
<header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    
                </div>
                <div class="form">
                    <?php
$config = json_decode($response, true);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 $email=$_SESSION['email'] ;
 $userId = mysqli_fetch_array(mysqli_query($con, "SELECT id FROM users WHERE email ='$email'"))['id'];

   // $sonuc = mysqli_query($con, "SELECT * FROM users_tv, tvshow WHERE users_tv.tv_id = tvshow.id AND users_tv.users_id = '$userId'");
 // Perform queries 
$sonuc=mysqli_query($con,"SELECT * FROM users_movie,movie WHERE users_movie.movie_id=movie.id AND users_movie.user_id = '$userId'");
while($movie = mysqli_fetch_array($sonuc))
{
              
     ?>
<a href="likemovie.php?idl=<?=$movie['id']?>"> <img src="img/lık.png" height=40 width=60 backgroundcolor="pink" /> </a>

    <?php                          


echo("<img src='" . $config['images']['base_url'] . $config['images']['poster_sizes'][2] . $movie['posterpath'] ."'/>");
echo  $movie["moviename"]."<br>"."<br />"."<br />";


}
mysqli_close($con);
?>